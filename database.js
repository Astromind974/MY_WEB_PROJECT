import mysql from 'mysql2'
import dotenv from 'dotenv'
dotenv.config()

const pool = mysql.createPool({
    host: process.env.MYSQL_HOST,
    user: process.env.MYSQL_USER,
    password: process.env.MYSQL_PASSWORD,
    database: process.env.MYSQL_DATABASE
}).promise()

export async function getNotes() {
    const [rows] = await pool.query("SELECT * FROM Users")
    return rows
}

export async function getNote(id) {
    const [rows] = await pool.query(`
        SELECT *
        FROM Users
        WHERE id = ?
        `, [id])
    return rows[0]
}

export async function createNote(email, bio, country) {
    const [result] = await pool.query(`
        INSERT INTO Users (email, bio, country)
        VALUES (?, ?, ?)
        `, [email, bio, country])
    const id = result.insertId
    return getNote(id)
}

const note = await createNote("test@test.com", "test", "UK")
console.log(note)
