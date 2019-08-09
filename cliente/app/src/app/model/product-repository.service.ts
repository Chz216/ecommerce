import { Injectable } from '@angular/core';
import { Product } from './product';
import { ProductDatasourceService } from './product-datasource.service';

@Injectable({
  providedIn: 'root'
})
export class ProductRepositoryService {
  
  private products: Product[] = [];
  private categories: string[] = [];
  private scales: string[] = [];
  private vendors: string[] = [];
  
  constructor(private dataSourceService: ProductDatasourceService) { 
    dataSourceService.getProducts().subscribe((response) => {
      this.products = response['products'];
      this.categories = response['products'].map(p => p.productLine).filter((c, index, array) =>
        array.indexOf(c) === index).sort();
      this.scales = response['products'].map(p => p.productScale).filter((s, index, array) =>
        array.indexOf(s) === index).sort();
      this.vendors = response['products'].map(p => p.productVendor).filter((v, index, array) =>
        array.indexOf(v) === index).sort();
      });
  }

  getProducts(productLine: string = null, productScale: string = null, productVendor:string = null): Product[]{
    return this.products.filter((p) => (productLine == null || p.productLine === productLine) && (productScale == null || p.productScale === productScale) && (productVendor == null || p.productVendor === productVendor));
  }


  getCategories(): string[]{
    return this.categories;
  }

  getScales(): string[]{
    return this.scales;
  }

  getVendors(): string[]{
    return this.vendors;
  }

  getProduct(productCode: string): Product[]{
    return this.products.filter((p) => (p.productCode === productCode));
  } 

}
