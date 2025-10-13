import { Component } from '@angular/core';

interface Product {
  id: number;
  name: string;
  price: number;
}

@Component({
  selector: 'app-product-list',
  standalone: false,
  templateUrl: './product-list.html',
  styleUrl: './product-list.css',
})
export class ProductList {
  products: Product[] = [
    { id: 1, name: 'Camera', price: 900 },
    { id: 2, name: 'Smart TV', price: 1500 },
    { id: 3, name: 'Speakers', price: 400 },
    { id: 4, name: 'Laptop', price: 1200 },
  ];
}
