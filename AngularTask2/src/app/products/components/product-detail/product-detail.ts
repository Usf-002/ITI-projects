import { Component } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { ProductList } from '../product-list/product-list';

@Component({
  selector: 'app-product-detail',
  standalone: false,
  templateUrl: './product-detail.html',
  styleUrl: './product-detail.css',
})
export class ProductDetail {
  productId!: number;

  constructor(private route: ActivatedRoute, private router: Router) {}

  ngOnInit() {
    this.productId = Number(this.route.snapshot.paramMap.get('id'));
  }

  goBack() {
    this.router.navigate(['/products']);
  }
  products = new ProductList().products;
}
