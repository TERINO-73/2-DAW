import { Component, Input } from '@angular/core';
import { FormsModule } from '@angular/forms';
@Component({
  selector: 'app-search',
  imports: [FormsModule],
  templateUrl: './search.component.html',
  styleUrl: './search.component.css'
})
export class SearchComponent {
  public query: string = '';
  public result: string = '';
  @Input() labelButton: string = 'Buscar';
  constructor() {}
  search() {
    this.result = 'Consulta realizada con query \"' + this.query + '\"';
  }

}
