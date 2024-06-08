import React, { useState } from 'react';
import axios from 'axios';

function ProductForm() {
    const [form, setForm] = useState({
        categoryID: '',
        nameProduct: '',
        description: '',
        price: ''
    });

    const handleChange = (e) => {
        setForm({
            ...form,
            [e.target.name]: e.target.value
        });
    };

    const handleSubmit = (e) => {
        e.preventDefault();
        axios.post('http://127.0.0.1:8000/api/products', form)
            .then(response => {
                console.log('Product created:', response.data);
            })
            .catch(error => {
                console.error('There was an error creating the product!', error);
            });
    };

    return (
        <form onSubmit={handleSubmit}>
            <label>Category ID:</label>
            <input type="text" name="categoryID" value={form.categoryID} onChange={handleChange} required />

            <label>Name:</label>
            <input type="text" name="nameProduct" value={form.nameProduct} onChange={handleChange} required />

            <label>Description:</label>
            <textarea name="description" value={form.description} onChange={handleChange}></textarea>

            <label>Price:</label>
            <input type="number" name="price" value={form.price} onChange={handleChange} required />

            <button type="submit">Create Product</button>
        </form>
    );
}

export default ProductForm;
