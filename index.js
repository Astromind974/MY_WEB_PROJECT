const Joi = require('joi');
const express = require('express');
const app = express();

app.use(express.json());

const characters = [
    {id: 1, name: "Borg", race: "orc", class: "hunter", hp: 8, attack: 5},
    {id: 2, name: "Jeanne", race: "human", class: "knight", hp: 12, attack: 3},
    {id: 3, name: "808", race: "android", class: "mage", hp: 6, attack: 10}
]

app.get('/', (req, res) => {
    res.send('Welcome to the dungeon aventurer!');
});

app.get('/api/characters', (req, res) => {
    res.send(characters);
});

function validateCharacter(character) {
    const schema = {
        name: Joi.string().min(3).required(),
        race: Joi.string().min(3).required(),
        class: Joi.string().min(3).required(),
        hp: Joi.number().integer().min(6).required(),
        attack: Joi.number().integer().min(2).required()
    };
    return Joi.validate(character, schema);
}

app.post('/api/characters', (req, res) => {
    const {error} = validateCharacter(req.body);
    if (error) return res.status(400).send(error.details[0].message);
    const character = {
        id: characters.length + 1,
        name: req.body.name,
        race: req.body.race,
        class: req.body.class,
        hp: req.body.hp,
        attack: req.body.attack
    };
    characters.push(character);
    res.send(character);
});

app.get('/api/characters/:id', (req, res) => {
    const character = characters.find(c => c.id === parseInt(req.params.id));
    if (!character) return res.status(404).send("Error 404 Object not found.");
    res.send(character);
});

app.put('/api/characters/:id', (req, res) => {
    const character = characters.find(c => c.id === parseInt(req.params.id));
    if (!character) return res.status(404).send("Error 404 Object not found.");
    const {error} = validateCharacter(req.body);
    if (error) return res.status(400).send(error.details[0].message);
    character.name = req.body.name;
    character.race = req.body.race;
    character.class = req.body.class;
    character.hp = req.body.hp;
    character.attack = req.body.attack;
    res.send(character);
});

app.delete('/api/characters/:id', (req, res) => {
    const character = characters.find(c => c.id === parseInt(req.params.id));
    if (!character) return res.status(404).send("Error 404 Object not found.");
    const index = characters.indexOf(character);
    characters.splice(index, 1);
    res.send(character);
});

const port = process.env.PORT || 3000;
app.listen(3000, () => console.log(`Listening on port ${port}...`));
