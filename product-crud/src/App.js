import logo from './logo.svg';
import './App.css';
import React from 'react';
import { BrowserRouter as Router, Route, Switch } from 'react-router-dom';
import ProductList from './components/ProductList';
import ProductForm from './components/ProductForm';
import ProductEdit from './components/ProductEdit';
import ProductDetail from './components/ProductDetail';

function App() {
  return (
    <Router>
      <div>
        <Switch>
          <Route path="/" exact component={ProductList} />
          <Route path="/products/new" component={ProductForm} />
          <Route path="/products/edit/:id" component={ProductEdit} />
          <Route path="/products/:id" component={ProductDetail} />
        </Switch>
      </div>
    </Router>
  );
}

export default App;
