const express = require('express')
const {ObjectId} = require('mongodb')
const { connectToDb, getDb} = require('./db')

// init & middleware
const app = express()

// db connection
let db

connectToDb((err) => {
    if (!err) {
        app.listen(3000, () => {
            console.log('app listening on port 3000')
        })
         db = getDb()
    }
})

app.get('/books', (req, res) => {
    let books = []
 
    db.collection('books')
        .find()
        .sort({ author: 1})
        .forEach(book => books.push(book))
        .then(() => {
            res.status(200).json(books)
        }) 
        .catch(() => {
            res.status(500).json({error: 'Could not fetch the document'})
        })
})

app.get('/books:id' (req, res) => {
    db.collection('books')
        .findOne({_id: ObjectId(req.params.id)})
        .then(doc => {
            res.status(200).json(doc)
        })
        .catch(err => {
            res.status(500).json({error: 'Could not fetch document'})
        })
})