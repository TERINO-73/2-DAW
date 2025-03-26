import { Component } from '@angular/core';
import { FormsModule } from '@angular/forms';

@Component({
  selector: 'app-contacto',
  templateUrl: './contacto.component.html',
  styleUrls: ['./contacto.component.css'],
  standalone: true,
  imports: [FormsModule] // Agrega FormsModule aquí
})
export class ContactoComponent {
  formData = {
    name: '',
    email: '',
    message: ''
  };
  isFormSubmitted = false;

  onSubmit() {
    // Simular que el formulario se envía correctamente
    console.log('Formulario enviado:', this.formData);
    this.isFormSubmitted = true;

    // Restablecer el formulario después de 3 segundos (simula un envío)
    setTimeout(() => {
      this.isFormSubmitted = false;
      this.formData = { name: '', email: '', message: '' }; // Limpiar campos
    }, 3000);
  }
}
