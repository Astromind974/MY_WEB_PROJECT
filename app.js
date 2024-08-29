const Logger = require('./logger');
const logger = new Logger();
const http = require('http');

logger.on('userLogged', function(arg) {
    console.log("User logged.", arg);
})

logger.log("Hello world!");

const server = http.createServer((req, res) => {
    if (req.url === '/') {
        res.write('Hello world!');
        res.end();
    }
    if (req.url === '/api/courses') {
        res.write(JSON.stringify([1, 2, 3]));
        res.end();
    }
});

server.on('connection', (socket) => {
    console.log('New connection...');
});

server.listen(3000);

console.log('Listening on port 3000...');
