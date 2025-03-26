import { Component, EventEmitter, Output } from '@angular/core';
import { Pettype } from '../../models/pettype';
@Component({
  selector: 'app-pettype-add',
  imports: [],
  templateUrl: './pettype-add.component.html',
  styleUrl: './pettype-add.component.css'
})
export class PettypeAddComponent {
  @Output() onNew = new EventEmitter<Pettype>();
}
