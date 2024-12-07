// Configuración y conexión a JsStore
var jsStoreCon = new JsStore.Connection(new Worker("jsstore.worker.min.js"));

// Definición de la tabla 'personas'
var tblPersonas = {
    name: 'personas',
    columns: {
        id: { primaryKey: true, autoIncrement: true },
        dni: { notNull: true, dataType: "string" },
        nombre: { notNull: true, dataType: "string" },
        apellidos: { notNull: false, dataType: "string" },
        fnacimiento: { notNull: true, dataType: "date_time" },
        estatura: { notNull: false, dataType: "number" }
    }
};

// Creación de la base de datos con la tabla 'personas'
var database = {
    name: 'miBaseDeDatos',
    tables: [tblPersonas]
};

const createDB = async (db) => {
    try {
        const isDbCreated = await jsStoreCon.initDb(db);
        if (isDbCreated) {
            console.log("Base de datos creada.");
            insertarDatosIniciales();
        } else {
            console.log("Base de datos abierta.");
        }
    } catch (ex) {
        console.error("Error al crear o abrir la base de datos", ex);
    }
};

// Llamada para crear la base de datos
createDB(database);

// Función para insertar datos iniciales
const insertarDatosIniciales = async () => {
    let datos = [
        { dni: '12345678A', nombre: 'Juan', apellidos: 'Pérez', fnacimiento: new Date('1990-01-01'), estatura: 175 },
        { dni: '87654321B', nombre: 'Ana', apellidos: 'García', fnacimiento: new Date('1985-06-15'), estatura: 160 }
    ];
    const count = await jsStoreCon.insert({
        into: 'personas',
        values: datos
    });
    console.log(`${count} registros iniciales insertados en la tabla personas`);
};

// Funciones CRUD para la tabla personas

// Create: Añadir una nueva persona
const addPersona = async (persona) => {
    const id = await jsStoreCon.insert({
        into: 'personas',
        values: [persona]
    });
    console.log(`Nueva persona añadida con ID: ${id}`);
};

// Read: Obtener todas las personas
const getPersonas = async () => {
    const personas = await jsStoreCon.select({
        from: 'personas'
    });
    return personas;
};

// Update: Modificar una persona existente
const updatePersona = async (id, nuevosDatos) => {
    const rowsUpdated = await jsStoreCon.update({
        in: 'personas',
        set: nuevosDatos,
        where: { id: id }
    });
    console.log(`${rowsUpdated} registro(s) actualizado(s)`);
};

// Delete: Eliminar una persona
const deletePersona = async (id) => {
    const rowsDeleted = await jsStoreCon.remove({
        from: 'personas',
        where: { id: id }
    });
    console.log(`${rowsDeleted} registro(s) eliminado(s)`);
};
