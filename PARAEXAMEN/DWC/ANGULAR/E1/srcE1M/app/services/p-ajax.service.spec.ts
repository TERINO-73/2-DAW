import { TestBed } from '@angular/core/testing';

import { PAJAXService } from './p-ajax.service';

describe('PAJAXService', () => {
  let service: PAJAXService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(PAJAXService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
