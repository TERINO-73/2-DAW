import { Component } from '@angular/core';
import { Pet } from '../../models/pet';
import { VisitService } from '../../services/visit.service';
import { ActivatedRoute, Router, RouterLink } from '@angular/router';
import { PetService } from '../../services/pet.service';
import { FormsModule } from '@angular/forms';
import { Visit } from '../../models/visit';

@Component({
  selector: 'app-visit-add',
  imports: [FormsModule, RouterLink],
  templateUrl: './visit-add.component.html',
  styleUrl: './visit-add.component.css'
})
export class VisitAddComponent {

  //Modo insertar o editar
  public addMode: boolean = true;

  //Objeto pet
  public pet: Pet = <Pet>{
    name: '',
    birthDate: '',
    type: { name: '' },
    owner: { firstName: '', lastName: '' }
  };

  //Objeto visit
  public visit: Visit = <Visit>{};

  constructor(
    private visitService: VisitService,
    private petService: PetService,
    private ruta: Router,
    private rutaActiva: ActivatedRoute
  ) { }

  // Metodo que se ejecutara al iniciar el componente
  ngOnInit() {
    //Obtener datos de la mascota y de la visita
    const idPet = this.rutaActiva.snapshot.params['idPet'];
    const idVisit = this.rutaActiva.snapshot.params['idVisit'];

    this.petService.obtenerPetPorId(idPet).subscribe({
      next: (pet) => {
        this.pet = pet;
        this.visit.pet = this.pet;
      },
      error: err => console.log("Error al obtener Pet: ", err)
    });

    //Verificamos si estamos en modo insertar o editar
    //Si estamos editando, obtenemos los datos de la visita
    if (idVisit != -1) {
      this.addMode = false;

      this.visitService.obtenerDatosVisit(idVisit).subscribe({
        next: (visit) => {
          this.visit = visit;
          console.log(this.visit);
        },
        error: err => console.log("Error al obtener Visit: ", err)
      });
    } else {
      this.addMode = true;
    }
  }

  //Metodo que se ejecutara al enviar el formulario
  onSubmit(form: Visit) { }


  //OTROS METODOS

  insertarVisit() {

    //Creamos una variable igual que visit pero con petId porque el backend solo acepta petId
    const visitDatos = {
      ...this.visit,
      petId: this.pet.id
    }

    this.visitService.insertarVisit(visitDatos).subscribe({
      next: () => {
        this.ruta.navigate(["/detailOwner/", this.pet.owner.id]);
      },
      error: (err) => {
        console.log("Error al insertar Visit: ", err);
      }
    })
  }

  modificarVisit() {

    //Creamos una variable igual que visit pero con petId porque el backend solo acepta petId
    const visitDatos = {
      ...this.visit,
      petId: this.pet.id
    }

    this.visitService.modificarVisit(visitDatos).subscribe({
      next: () => {
        this.ruta.navigate(["/detailOwner/", this.pet.owner.id]);
      },
      error: (err) => {
        console.log("Error al modificar Visit: ", err);
      }
    })
  }

}
