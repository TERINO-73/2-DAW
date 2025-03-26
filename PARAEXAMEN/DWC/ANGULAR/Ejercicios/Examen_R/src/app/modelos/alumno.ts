import { Estadocivil } from "./estadocivil";
import { Sexo } from "./sexo";

export interface Alumno {
    id:number,
    nombre:string,
    apellidos:string,
    sexo:Sexo,
    sexo_nombre:string,

    fecha_nacimiento:Date,
    estado_civil:Estadocivil,
    nombre_ec:string,
}
