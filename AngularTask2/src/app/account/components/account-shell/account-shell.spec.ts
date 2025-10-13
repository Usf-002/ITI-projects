import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AccountShell } from './account-shell';

describe('AccountShell', () => {
  let component: AccountShell;
  let fixture: ComponentFixture<AccountShell>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [AccountShell]
    })
    .compileComponents();

    fixture = TestBed.createComponent(AccountShell);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
