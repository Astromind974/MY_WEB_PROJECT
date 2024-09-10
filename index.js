import Joi from 'joi'
import express from 'express'
const app = express()

import {getUser, getUsers, createUser, replaceUser, deleteUser} from './database.js'

app.use(express.json())

app.get('/', (req, res) => {
    res.send('Hello World!')
})

function validateUser(user) {
    const schema = {
        email: Joi.string().email().required(),
        password: Joi.string().min(2).required(),
        firstname: Joi.string().min(2).required(),
        lastname: Joi.string().min(2).required(),
        bio: Joi.string().required(),
        country: Joi.string().max(2).required()
    }
    return Joi.validate(user, schema)
}

app.get('/api/users', async (req, res) => {
    const rows = await getUsers()
    res.send(rows)
})

app.get('/api/users/:id', async (req, res) => {
    const id = req.params.id
    const row = await getUser(id)
    if (!row) return res.status(404).send("Object not found.")
    res.send(row)
})

app.post('/api/users', async (req, res) => {
    const {error} = validateUser(req.body)
    if (error) return res.status(400).send(error.details[0].message)
    const {email, password, firstname, lastname, bio, country} = req.body
    const row = await createUser(email, password, firstname, lastname, bio, country)
    res.status(201).send(row)
})

app.put('/api/users/:id', async (req, res) => {
    const id = req.params.id
    let row = await getUser(id)
    if (!row) return res.status(404).send("Object not found.")
    const {error} = validateUser(req.body)
    if (error) return res.status(400).send(error.details[0].message)
    const {email, password, firstname, lastname, bio, country} = req.body
    row = await replaceUser(id, email, password, firstname, lastname, bio, country)
    res.send(row)
})

app.delete('/api/users/:id', async (req, res) => {
    const id = req.params.id
    const row = await getUser(id)
    if (!row) return res.status(404).send("Object not found.")
    deleteUser(id)
    res.send(row)
})

app.use((err, req, res, next) => {
    console.error(err.stack)
    res.status(500).send("Something broke!")
})

const port = process.env.PORT || 3000;
app.listen(3000, () => console.log(`Listening on port ${port}...`))
