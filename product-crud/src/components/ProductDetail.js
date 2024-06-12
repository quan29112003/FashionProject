import React, { useEffect, useState } from 'react';
import axios from 'axios';

function ProductDetail({ match }) {
    const [product, setProduct] = useState(null);

    useEffect(() => {
        axios.get(`http://127.0.0.1:8000/${id}`)
            .then(response => {
                setProduct(response.data);
            })
            .catch(error => {
                console.error('There was an error fetching the product!', error);
            });
    }, [id]);

    if (!product) {
        return <div>Loading...</div>;
    }

    return (
        <div>
            <h1>{product.nameProduct}</h1>
            <p>{product.description}</p>
            <p>Price: {product.price}</p>
            <p>Category: {product.categoryID}</p>
        </div>
    );
}

export default ProductDetail;
