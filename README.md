# Proyecto-P.C-demo
# Proyecto: Implementar una plataforma digital para la automatizacion de los procesos administrativos del Departamento de Recursos Humanos de P.C Sede el Prado

## Descripción General
Este repositorio documenta la propuesta, es una solución tecnológica web de arquitectura centralizada y fundamentada en estándares de Software Libre , diseñada específicamente para mitigar la vulnerabilidad estructural de datos y erradicar la cultura de gestión manual en el Departamento de Recursos Humanos de Protección Civil, Sede El Prado (Municipio Pampanito, Estado Trujillo).
El sistema interactúa de forma directa con una base de datos relacional orientada a resguardar de forma íntegra y confidencial los expedientes digitales de los funcionarios de la institución. Su interfaz gráfica, construida con tecnologías estándar de la Web (HTML5, CSS3 y JavaScript) , ofrece un entorno intuitivo y responsivo adaptado a los equipos de computación actualizados con los que cuenta el departamento.
A nivel operativo, la plataforma unifica el ecosistema administrativo a través de módulos modulares interactivos. Estos permiten al personal autorizado gestionar de manera ágil el registro laboral, automatizar la emisión instantánea de constancias de trabajo, procesar cálculos automáticos de periodos vacacionales y centralizar repositorios normativos u ofimáticos en un entorno digital seguro, accesible incluso ante las limitaciones de conectividad reportadas en el diagnóstico situacional.

## Lógica de Negocio del Sistema
La lógica de negocio define las reglas operativas, restricciones y flujos de información que el software debe ejecutar de forma automatizada para satisfacer los requerimientos del departamento. Para su sistema, se estructuran los siguientes flujos principales:

## Gestión de Usuarios y Control de Accesos:

# Regla de Negocio: El acceso a la plataforma está restringido mediante credenciales autenticadas (Usuario/Contraseña).

# Flujo: El sistema valida el nivel de rol asignado (Administrador de RRHH o Funcionario Operativo). El Administrador posee privilegios de lectura, escritura, actualización y eliminación de expedientes. El Funcionario regular solo cuenta con permisos de lectura para consultas de manuales, visualización de estatus o solicitudes específicas.

## Módulo de Automatización de Constancias de Trabajo:

# Regla de Negocio: Las constancias deben generarse en tiempo real, extrayendo dinámicamente los datos almacenados en la base de datos relacional para evitar la manipulación de datos o duplicación de tareas.

# Flujo: El operador selecciona el número de Cédula de Identidad del funcionario. El sistema realiza una consulta relacional (Query), extrae automáticamente los nombres, apellidos, cargo, sueldo y fecha de ingreso, e inserta la información en una plantilla digital normalizada imprimible o exportable a formatos estandarizados abiertos.

## Módulo Conversor de Días de Trabajo a Vacaciones

# Regla de Negocio: El cálculo de los días de vacaciones correspondientes a cada funcionario debe apegarse estrictamente al tiempo de servicio registrado en el sistema, mitigando confusiones operativas o retrasos manuales.

# Flujo: El sistema evalúa de forma automática la fecha de ingreso del trabajador contrastada con la fecha actual del servidor. Aplicando algoritmos lógicos basados en el marco legal laboral vigente, calcula la antigüedad exacta y computa la cantidad de días de descanso remunerados que le corresponden por periodo legal, actualizando inmediatamente el histórico vacacional en su expediente digital.

## Importancia del Proyecto

# La importancia de esta propuesta sociotecnológica se divide en tres dimensiones fundamentales articuladas con los objetivos del Programa Nacional de Formación en Informática (PNFI):  

Soberanía Tecnológica e Independencia Nacional: En estricto cumplimiento con el Artículo 110 de la CRBV, la Ley de Infogobierno y el Objetivo Histórico N° 1 del Plan de la Patria, el proyecto erradica la dependencia de licencias comerciales propietarias o software ilegal. Al ser desarrollado bajo Software Libre, se dota a un órgano de seguridad del Estado de una herramienta completamente auditable, adaptable y soberana.

Eficiencia Operativa e Impacto Institucional: La transición de un modelo físico propenso al deterioro y retrasos hacia una plataforma automatizada reduce a cero la duplicidad de tareas y los prolongados tiempos de espera del personal. Al centralizar los datos, se resguarda la memoria histórica de los trabajadores de Protección Civil, permitiendo que la gestión administrativa interna sea tan rápida y eficaz como la respuesta inmediata que la institución ofrece a la ciudadanía en situaciones de riesgo.





