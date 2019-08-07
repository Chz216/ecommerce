import { TestBed } from '@angular/core/testing';

import { ProductDatasourceService } from './product-datasource.service';

describe('ProductDatasourceService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: ProductDatasourceService = TestBed.get(ProductDatasourceService);
    expect(service).toBeTruthy();
  });
});
