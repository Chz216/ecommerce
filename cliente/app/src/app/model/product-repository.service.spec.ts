import { TestBed } from '@angular/core/testing';

import { ProductRepositoryService } from './product-repository.service';

describe('ProductRepositoryService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: ProductRepositoryService = TestBed.get(ProductRepositoryService);
    expect(service).toBeTruthy();
  });
});
