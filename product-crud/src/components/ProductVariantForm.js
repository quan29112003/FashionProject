import React, { useState } from 'react';
import { useParams } from 'react-router-dom';
import axios from 'axios';

function ProductVariantForm() {
    const { productId } = useParams(); // Lấy product_id từ URL
    const [form, setForm] = useState({
        colorID: '',
        sizeID: '',
        quantity: '',
        price: '',
        type: ''
    });

    const handleChange = (e) => {
        setForm({
            ...form,
            [e.target.name]: e.target.value
        });
    };

    const handleSubmit = (e) => {
        e.preventDefault();
        const data = { ...form, productID: productId };
        axios.post('http://127.0.0.1:8000/api/product-variants', data)
            .then(response => {
                console.log('Product variant created:', response.data);
            })
            .catch(error => {
                console.error('There was an error creating the product variant!', error);
            });
    };

    return (
        <form onSubmit={handleSubmit}>
            <label>Color ID:</label>
            <input type="text" name="colorID" value={form.colorID} onChange={handleChange} required />

            <label>Size ID:</label>
            <input type="text" name="sizeID" value={form.sizeID} onChange={handleChange} required />

            <label>Quantity:</label>
            <input type="number" name="quantity" value={form.quantity} onChange={handleChange} required />

            <label>Price:</label>
            <input type="number" name="price" value={form.price} onChange={handleChange} required />

            <label>Type:</label>
            <input type="text" name="type" value={form.type} onChange={handleChange} required />

            <button type="submit">Create Product Variant</button>
        </form>
    );
}

export default ProductVariantForm;
