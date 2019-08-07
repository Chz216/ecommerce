import { Component, OnInit } from '@angular/core';
import { Cart } from 'src/app/model/cart';
import { Product } from 'src/app/model/product';

@Component({
  selector: 'app-cart',
  templateUrl: './cart.component.html',
  styleUrls: ['./cart.component.css']
})
export class CartComponent implements OnInit {

  constructor(private cart: Cart) { }

  ngOnInit() {
  }

  get cartLine() {
    return this.cart.getCartLine();
  }

  changeQuantity(product: Product, quantity: number) {
    return this.cart.changequantity(product,+quantity);
  }

  deleteCartLine(product: Product) {
    this.cart.deleteCartLine(product);
  }

}
