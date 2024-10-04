import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ConversationsModalComponent } from './conversations-modal.component';

describe('ConversationsModalComponent', () => {
  let component: ConversationsModalComponent;
  let fixture: ComponentFixture<ConversationsModalComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [ConversationsModalComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(ConversationsModalComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
