import { Component, OnInit } from '@angular/core';
import { Product } from 'src/app/model/product';
import { ActivatedRoute } from '@angular/router';
import { ProductRepositoryService } from 'src/app/model/product-repository.service';

@Component({
  selector: 'app-detail',
  templateUrl: './detail.component.html',
  styleUrls: ['./detail.component.css']
})
export class DetailComponent implements OnInit {

  public productCode;

  constructor(private productRepoService: ProductRepositoryService, private route: ActivatedRoute) { }

  ngOnInit() {
  }

   get product(): Product[]{
     const id = this.route.snapshot.paramMap.get('id');
     this.productCode = id;
     return this.productRepoService.getProduct(this.productCode);
  }

}
