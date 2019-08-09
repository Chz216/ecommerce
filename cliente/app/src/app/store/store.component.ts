import { Component, OnInit } from '@angular/core';
import { ProductRepositoryService } from '../model/product-repository.service';
import { Product } from '../model/product';
import { Cart } from '../model/cart';

@Component({
  selector: 'app-store',
  templateUrl: './store.component.html',
  styleUrls: ['./store.component.css']
})
export class StoreComponent implements OnInit {

  public selectedCategory = null;
  public selectedScale = null;
  public selectedVendor = null;
  public productsPerPage = 12;
  public selectedPage = 1;
  public lines = null;

  constructor(private productRepoService: ProductRepositoryService, private cart: Cart) { }

  ngOnInit() {
    
  }

  get products(): Product[] {
    const pageIndex = (this.selectedPage - 1) * this.productsPerPage;
    console.log(pageIndex + +this.productsPerPage);
    return this.productRepoService.getProducts(this.selectedCategory, this.selectedScale, this.selectedVendor)
      .slice(pageIndex, pageIndex + +this.productsPerPage);
  }

  get categories(): string[] {
    return this.productRepoService.getCategories();
  }

  get scales(): string[] {
    return this.productRepoService.getScales();
  }

  get vendors(): string[] {
    return this.productRepoService.getVendors();
  }

  changeCategory(newCategory?: string) {
    this.selectedPage = 1;
    this.selectedCategory = newCategory;
  }

  changeScale(newScale?: string) {
    this.selectedPage = 1;
    this.selectedScale = newScale;
  }

  changeVendor(newVendor?: string) {
    this.selectedPage = 1;
    this.selectedVendor = newVendor;
  }

  get pageNumbers(): number[] {
    return Array(Math.ceil(this.productRepoService.getProducts(this.selectedCategory, this.selectedScale, this.selectedVendor).length / this.productsPerPage))
      .fill(0).map((x, i) => i + 1);
  }

  changePage(newNumber: number) {
    this.selectedPage = newNumber;
  }

  changePageSize(newSize: number) {
    this.productsPerPage = newSize;
    this.changePage(1);
  }

  addLine(product?: Product) {
    this.cart.addLine(product);
  }


}
