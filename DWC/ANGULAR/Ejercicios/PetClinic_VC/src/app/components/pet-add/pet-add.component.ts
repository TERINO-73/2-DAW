import { Component } from '@angular/core';
import { Pet } from '../../models/pet';
import { PetService } from '../../services/pet.service';
import { ActivatedRoute, Router, RouterLink } from '@angular/router';
import { FormsModule } from '@angular/forms';
import { Owner } from '../../models/owner';
import { Pettype } from '../../models/pettype';
import { OwnerService } from '../../services/owner.service';


@Component({
  selector: 'app-pet-add',
  imports: [FormsModule, RouterLink],
  templateUrl: './pet-add.component.html',
  styleUrl: './pet-add.component.css'
})
export class PetAddComponent {

  //Modo insertar o editar
  public addMode: boolean = true;

  //Objeto owner
  public owner: Owner = <Owner>{};

  //Objeto per
  public pet: Pet = <Pet>{ type: <Pettype>{}}; //Type predefinido para que no salga error por tipo objeto

  //Array de tipos
  public petTypes: Pettype[] = [];

  constructor(
    private servicePet: PetService,
    private serviceOwner: OwnerService,
    private ruta: Router,
    private rutaActiva: ActivatedRoute
  ){}

  //Metodo que se ejecutara al iniciar el componente
  ngOnInit(){
    //Obtenemos el id del propietario y el id de la mascota
    const idOwner = this.rutaActiva.snapshot.params['idOwner'];
    const idPet = this.rutaActiva.snapshot.params['idPet'];

    //Cargamos los datos del propietario siempre
    this.serviceOwner.obtenerOwnerPorId(idOwner).subscribe({
      next: (owner) => {
        this.owner = owner; //Asignamos el propietario
        this.pet.owner = owner; //Asignamos el propietario al pet
      },
      error: (err) => {
        console.log("Error al obtener Owner: ", err);
      }
    });

    //Cargamos los tipos de mascotas
    this.servicePet.obtenerTypes().subscribe({
      next: (types) => {
        this.petTypes = types;
      },
      error: (err) => {
        console.log("Error al obtener Types: ", err);
      }
    })

    //Verificamos si estamos en modo insertar o editar
    //Si estamos editando, obtenemos los datos de la mascota
    if (idPet != -1) {

      this.addMode = false;

      this.servicePet.obtenerPetPorId(idPet).subscribe({
        next: (pet) => {
          this.pet = pet;

          this.pet.type.id = this.petTypes.find(type => type.id === this.pet.type.id)?.id || this.pet.type.id;
        },
        error: (err) => {
          console.log("Error al obtener Pet: ", err);
        }
      })
    } else {
      this.addMode = true;
    }

  }

  //Metodo que se ejecutara al enviar el formulario
  onSubmit(form: Pet){}

  //OTROS METODOS
  insertarPet(){
    //Insertamos la mascota
    this.servicePet.insertarPet(this.pet).subscribe({
      next: (pet) => {
        this.ruta.navigate(["/detailOwner/", this.owner.id]);
      },
      error: (err) => {
        console.log("Error al insertar Pet: ", err);
      }
    })
  }

  modificarPet(){
    //Modificamos la mascota
    this.servicePet.modificarPet(this.pet).subscribe({
      next: (pt) => {
        this.ruta.navigate(["/detailOwner/", this.owner.id]);
      },
      error: (err) => {
        console.log("Error al modificar Pet: ", err);
      }
    })
  }
}
