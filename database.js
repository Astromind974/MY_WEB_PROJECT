import mysql from 'mysql2'
import dotenv from 'dotenv'
dotenv.config()

const pool = mysql.createPool({
    host: process.env.MYSQL_HOST,
    user: process.env.MYSQL_USER,
    password: process.env.MYSQL_PASSWORD,
    database: process.env.MYSQL_DATABASE
}).promise()

export async function getUsers() {
    const [rows] = await pool.query("SELECT * FROM Users")
    return rows
}

export async function getUser(id) {
    const [rows] = await pool.query(`
        SELECT *
        FROM Users
        WHERE id = ?
        `, [id])
    return rows[0]
}

export async function createUser(email, password, firstname, lastname, bio, country) {
    const [result] = await pool.query(`
        INSERT INTO Users (email, password, firstname, lastname, bio, country)
        VALUES (?, ?, ?, ?, ?, ?)
        `, [email, password, firstname, lastname, bio, country])
    const id = result.insertId
    return getUser(id)
}

export async function replaceUser(id, email, password, firstname, lastname, bio, country) {
    const [result] = await pool.query(`
        REPLACE INTO Users
        VALUES (?, ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP)
    `, [id, email, password, firstname, lastname, bio, country])
    return getUser(id)
}

export async function deleteUser(id) {
    const [result] = await pool.query(`
        DELETE FROM Users
        WHERE Users.id=?
    `, [id])
}
