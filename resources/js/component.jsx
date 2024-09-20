import React from 'react';
import ReactDOM from 'react-dom/client';
import ExampleComponent from './ExampleComponent';

// Encuentra el contenedor donde se montará el componente
const exampleComponent = document.getElementById('example-component');

if (exampleComponent) {
    ReactDOM.createRoot(exampleComponent).render(<ExampleComponent />);
}
