create database rrhh;

use rrhh;

create table department(
    code varchar(5) primary key,
    name varchar(30) not null,
    index idx_department(name)
);

create table promotion(
    code varchar(5) primary key,
    name varchar(40) not null,
    description varchar(50) not null,
    status varchar(10) not null,
    publicationDate date not null,
    index idx_promotion(publicationDate)
);

create table position(
    code varchar(5) primary key,
    name varchar(30) not null,
    salary float not null,
    departmentCode varchar(5) not null,
    index idx_position(name),

    foreign key(departmentCode) references department(code)
);

create table employee(
    code varchar(5) primary key,
    firstName varchar(30) not null,
    lastName varchar(30) not null,
    middleName varchar(30) not null,
    email varchar(35) not null,
    gender varchar(1) not null,
    age int not null,
    mobile varchar(15) not null,
    password varchar(20) not null,
    contractDate date not null,
    positionCode varchar(5) not null,
    supervisorId int,
    index idx_employee(lastName),
    
    foreign key(positionCode) references position(code)
);

alter table employee add foreign key(supervisorId) references employee(code);

create table attendance(
    number int primary key auto_increment,
    startDate datetime not null,
    endDate datetime,
    employee varchar(5) not null,
    index idx_date(startDate),

    Foreign Key (employ) REFERENCES employee(code)
);

create table benefits(
    code varchar(5) primary key,
    name varchar(30) not null,
    type varchar(20) not null,
    description varchar(40) not null,
    index idx_benefits(name)
);

create table performance(
    code varchar(5) primary key,
    score float not null,
    evaluationDate date not null,
    comments varchar(60),
    employee varchar(5) not null,
    index idx_performance(score),

    foreign key(employee) REFERENCES employee(code)
);

create table vacations(
    id int primary key auto_increment,
    startDate date not null,
    endDate date not null,
    status varchar(10) not null,
    employee varchar(5) not null,
    index idx_vacations(startDate),

    foreign key(employee) references employee(code)
);

create table complaints(
    id int primary key auto_increment,
    date date not null,
    description varchar(60) not null,
    status varchar(10) not null,
    employee varchar(5) not null,
    index idx_complaints(date),

    foreign key(employee) references employee(code)
);

create table absence(
    id int primary key auto_increment,
    startDate date not null,
    endDate date not null,
    status varchar(10) not null,
    type varchar(10) not null,
    description varchar(60) not null,
    employee varchar(5) not null,
    index idx_absence(startDate),

    foreign key(employee) references employee(code)
);

create table incident(
    id int primary key auto_increment,
    incidentType varchar(40) not null,
    incidentDate date not null,
    description varchar(40) not null,
    employee varchar(5) not null,
    index idx_incident(incidentDate),

    foreign key(employee) references employee(code)
);

create table application(
    id int primary key auto_increment,
    publicationDate date not null,
    status varchar(10) not null,
    employee varchar(5) not null,
    promotion varchar(5) not null,
    index idx_application(publicationDate),

    foreign Key(employee) references employee(code),
    foreign key(promotion) references promotion(code)
);

create table payments(
    id int primary key auto_increment,
    hourlyPayment float(5,2) not null,
    totalPayment float(10,2) not null,
    bonuses float(10,2),
    employee varchar(5) not null,
    index idx_payments(id),

    foreign key(employee) references employee(code)
);

/*Insertar los datos a nuestra base de datos*/

-- Inserción en la tabla departamento
INSERT INTO department (code, name) VALUES
('D001', 'Human Resources'),
('D002', 'Technology'),
('D003', 'Marketing'),
('D004', 'Finance'),
('D005', 'Sales'),
('D006', 'Operations'),
('D007', 'Customer Service');

-- Inserción en la tabla promocion
INSERT INTO promotion (code, name, description, status, publicationDate) VALUES
('P001', 'Annual Promotion', '10% salary increase', 'Active', '2023-01-15'),
('P002', 'Performance Bonus', 'Bonus for exceptional performance', 'Active', '2023-02-01'),
('P003', 'Summer Promotion', 'Temporary increase during the summer', 'Inactive', '2023-06-01'),
('P004', 'Christmas Bonus', 'Special bonus for Christmas', 'Active', '2023-12-01'),
('P005', 'Birthday Promotion', '5% salary increase', 'Active', '2023-03-01'),
('P006', 'Project Promotion', 'Bonus for project completion', 'Active', '2023-04-01'),
('P007', 'Innovation Promotion', 'Recognition for innovation', 'Active', '2023-05-01'),
('P008', 'Retention Bonus', 'Bonus for staying with the company', 'Active', '2023-07-01'),
('P009', 'Leadership Promotion', 'Increase for leadership role', 'Active', '2023-08-01'),
('P010', 'Training Promotion', 'Bonus for completed training', 'Active', '2023-09-01');

-- Inserción en la tabla puesto
INSERT INTO position (code, name, salary, departmentCode) VALUES
('P001', 'Human Resources Manager', 60000, 'D001'),
('P002', 'Software Developer', 80000, 'D002'),
('P003', 'Marketing Specialist', 50000, 'D003'),
('P004', 'Financial Analyst', 70000, 'D004'),
('P005', 'Sales Executive', 55000, 'D005'),
('P006', 'Operations Coordinator', 65000, 'D006'),
('P007', 'Customer Service Agent', 30000, 'D007');

-- Inserción en la tabla empleado
INSERT INTO employee (firstName, lastName, middleName, email, gender, age, mobile, password, contractDate, positionCode, supervisorId) VALUES
('Juan', 'Pérez', 'Alberto', 'juan.perez@example.com', 'M', 30, '5551234567', 'pass123', '2021-01-15', 'P001', NULL),
('María', 'González', 'Fernanda', 'maria.gonzalez@example.com', 'F', 28, '5552345678', 'pass234', '2021-02-20', 'P002', null),
('Luis', 'Martínez', 'Antonio', 'luis.martinez@example.com', 'M', 35, '5553456789', 'pass345', '2020-03-10', 'P003', null),
('Ana', 'López', 'Carmen', 'ana.lopez@example.com', 'F', 26, '5554567890', 'pass456', '2022-04-18', 'P004', null),
('Carlos', 'Hernández', 'Eduardo', 'carlos.hernandez@example.com', 'M', 32, '5555678901', 'pass567', '2021-05-21', 'P005', null),
('Laura', 'García', 'Isabel', 'laura.garcia@example.com', 'F', 29, '5556789012', 'pass678', '2021-06-30', 'P006', null),
('Jorge', 'Ramírez', 'Diego', 'jorge.ramirez@example.com', 'M', 40, '5557890123', 'pass789', '2019-07-15', 'P007', null),
('Sofía', 'Mendoza', 'María', 'sofia.mendoza@example.com', 'F', 34, '5558901234', 'pass890', '2020-08-25', 'P008', 1),
('Diego', 'Gómez', 'Julián', 'diego.gomez@example.com', 'M', 31, '5559012345', 'pass901', '2021-09-10', 'P009', 2),
('Claudia', 'Martínez', 'Patricia', 'claudia.martinez@example.com', 'F', 27, '5550123456', 'pass012', '2022-10-05', 'P010', 3),
('Fernando', 'Rodríguez', 'Ricardo', 'fernando.rodriguez@example.com', 'M', 38, '5551234568', 'pass1234', '2018-11-12', 'P011', 4),
('Patricia', 'Lopez', 'Elena', 'patricia.lopez@example.com', 'F', 33, '5552345679', 'pass2345', '2019-12-20', 'P012', 5),
('Andrés', 'Sánchez', 'Luis', 'andres.sanchez@example.com', 'M', 36, '5553456780', 'pass3456', '2020-01-30', 'P013', 6),
('Elena', 'Morales', 'Ana', 'elena.morales@example.com', 'F', 30, '5554567891', 'pass4567', '2021-02-15', 'P014', 7),
('Roberto', 'González', 'Javier', 'roberto.gonzalez@example.com', 'M', 29, '5555678902', 'pass5678', '2021-03-20', 'P015', 1),
('Victoria', 'Fernández', 'Lucía', 'victoria.fernandez@example.com', 'F', 32, '5556789013', 'pass6789', '2021-04-25', 'P016', 2),
('Pablo', 'Jiménez', 'Fernando', 'pablo.jimenez@example.com', 'M', 37, '5557890124', 'pass7890', '2020-05-30', 'P017', 3),
('Gabriela', 'Pérez', 'María', 'gabriela.perez@example.com', 'F', 28, '5558901235', 'pass8901', '2021-06-15', 'P018', 4),
('Samuel', 'Ríos', 'Andrés', 'samuel.rios@example.com', 'M', 34, '5559012346', 'pass9012', '2021-07-10', 'P019', 5),
('Jessica', 'Hernández', 'Sofía', 'jessica.hernandez@example.com', 'F', 31, '5550123457', 'pass0123', '2021-08-05', 'P020', 6),
('Ricardo', 'Ruiz', 'Luis', 'ricardo.ruiz@example.com', 'M', 39, '5551234569', 'pass12345', '2020-09-15', 'P021', 7),
('Mariana', 'Díaz', 'Isabel', 'mariana.diaz@example.com', 'F', 25, '5552345670', 'pass23456', '2020-10-10', 'P022', 1),
('Hugo', 'Martínez', 'José', 'hugo.martinez@example.com', 'M', 29, '5553456781', 'pass34567', '2021-11-20', 'P023', 2),
('Natalia', 'González', 'Elena', 'natalia.gonzalez@example.com', 'F', 27, '5554567892', 'pass45678', '2021-12-25', 'P024', 3),
('Cristian', 'Jiménez', 'Diego', 'cristian.jimenez@example.com', 'M', 32, '5555678903', 'pass56789', '2022-01-05', 'P025', 4),
('Daniela', 'Castro', 'María', 'daniela.castro@example.com', 'F', 30, '5556789014', 'pass67890', '2022-02-15', 'P026', 5),
('Gabriel', 'Torres', 'Ricardo', 'gabriel.torres@example.com', 'M', 38, '5557890125', 'pass78901', '2022-03-20', 'P027', 6),
('Verónica', 'López', 'Patricia', 'veronica.lopez@example.com', 'F', 35, '5558901236', 'pass89012', '2022-04-25', 'P028', 7),
('Sergio', 'González', 'Alberto', 'sergio.gonzalez@example.com', 'M', 40, '5559012347', 'pass90123', '2022-05-30', 'P029', 1),
('Lucía', 'Serrano', 'Carmen', 'lucia.serrano@example.com', 'F', 29, '5550123458', 'pass01234', '2022-06-15', 'P030', 2);

-- Inserción en la tabla beneficios
INSERT INTO benefits (code, name, type, description) VALUES
('B001', 'Health Insurance', 'Insurance', 'Comprehensive health insurance coverage'),
('B002', 'Retirement Plan', 'Retirement', 'Company-sponsored retirement savings plan'),
('B003', 'Paid Time Off', 'Leave', 'Accrued paid time off for vacation and personal use'),
('B004', 'Gym Membership', 'Wellness', 'Annual gym membership reimbursement'),
('B005', 'Tuition Reimbursement', 'Education', 'Reimbursement for educational expenses'),
('B006', 'Flexible Work Hours', 'Work Arrangement', 'Ability to adjust work hours'),
('B007', 'Childcare Assistance', 'Support', 'Financial assistance for childcare costs'),
('B008', 'Transportation Allowance', 'Allowance', 'Monthly allowance for commuting expenses'),
('B009', 'Professional Development', 'Training', 'Funding for professional training and workshops'),
('B010', 'Employee Discounts', 'Discount', 'Discounts on company products and services');

-- Inserción en la tabla desempenio
INSERT INTO performance (code, score, evaluationDate, comments, employee) VALUES
('PERF001', 85.5, '2023-01-20', 'Excellent performance throughout the year', 1),
('PERF002', 78.0, '2023-02-15', 'Good performance but needs improvement in teamwork', 2),
('PERF003', 90.0, '2023-03-10', 'Outstanding contributions to projects', 3),
('PERF004', 72.5, '2023-04-05', 'Satisfactory performance, but missed deadlines', 4),
('PERF005', 88.0, '2023-05-15', 'Consistently meets expectations', 5),
('PERF006', 95.0, '2023-06-10', 'Exceptional leadership skills', 6),
('PERF007', 80.0, '2023-07-20', 'Good performance, needs to focus on efficiency', 7),
('PERF008', 75.0, '2023-08-30', 'Meets expectations but lacks initiative', 8);

-- Inserción en la tabla vacaciones
INSERT INTO vacations (startDate, endDate, status, employee) VALUES
('2024-07-01', '2024-07-10', 'Approved', 1),
('2024-12-20', '2025-01-05', 'Pending', 2),
('2023-08-15', '2023-08-25', 'Approved', 3),
('2023-12-01', '2023-12-10', 'Rejected', 4),
('2024-02-10', '2024-02-20', 'Pending', 5),
('2023-06-01', '2023-06-10', 'Approved', 6),
('2023-09-10', '2023-09-15', 'Approved', 7),
('2024-03-01', '2024-03-10', 'Pending', 8),
('2024-05-05', '2024-05-15', 'Approved', 9),
('2024-11-01', '2024-11-10', 'Approved', 10);

-- Inserción en la tabla quejas
INSERT INTO complaints (date, description, status, employee) VALUES
('2023-06-15', 'Issue with a colleague', 'Resolved', 1),
('2023-09-01', 'Complaint about defective equipment', 'Pending', 2),
('2023-08-05', 'Conflict with supervisor', 'Resolved', 3),
('2023-10-12', 'Problems with work schedule', 'Pending', 4),
('2023-11-20', 'Incident with a customer', 'Resolved', 5),
('2023-07-15', 'Dispute over project responsibilities', 'Resolved', 6),
('2023-08-25', 'Concerns about workplace safety', 'Pending', 7),
('2023-09-30', 'Feedback on team collaboration', 'Resolved', 8);

-- Inserción en la tabla ausencia
INSERT INTO absence (startDate, endDate, status, type, description, employee) VALUES
('2023-01-15', '2023-01-20', 'Approved', 'Sick', 'Flu symptoms', 1),
('2023-02-10', '2023-02-12', 'Approved', 'Personal', 'Family emergency', 2),
('2023-03-05', '2023-03-06', 'Pending', 'Vacation', 'Planned family trip', 3),
('2023-04-15', '2023-04-16', 'Approved', 'Sick', 'Migraine', 4),
('2023-05-01', '2023-05-02', 'Approved', 'Personal', 'Moving house', 5),
('2023-06-20', '2023-06-22', 'Approved', 'Sick', 'Stomach flu', 6),
('2023-07-10', '2023-07-15', 'Pending', 'Vacation', 'Beach holiday', 7),
('2023-08-01', '2023-08-03', 'Approved', 'Personal', 'Medical appointment', 8);

-- Inserción en la tabla incidente
INSERT INTO incident (incidentType, incidentDate, description, employee) VALUES
('Safety', '2023-01-15', 'Slip and fall accident in the workplace', 1),
('Harassment', '2023-02-20', 'Reported inappropriate comments from a colleague', 2),
('Equipment Failure', '2023-03-10', 'Machine malfunction during operation', 3),
('Policy Violation', '2023-04-05', 'Failure to adhere to safety protocols', 4),
('Theft', '2023-05-15', 'Personal belongings stolen from the locker', 5),
('Injury', '2023-06-25', 'Injury while lifting heavy equipment', 6),
('Conflict', '2023-07-30', 'Dispute over project responsibilities', 7),
('Accident', '2023-08-15', 'Minor accident during transportation', 8);

-- Inserción en la tabla postulacion
INSERT INTO application (publicationDate, status, employee, promotion) VALUES
('2023-01-01', 'Approved', 1, 'P001'),
('2023-02-01', 'Pending', 2, 'P002'),
('2023-03-01', 'Rejected', 3, 'P003'),
('2023-04-01', 'Approved', 4, 'P004'),
('2023-05-01', 'Approved', 5, 'P005'),
('2023-06-01', 'Pending', 6, 'P006'),
('2023-07-01', 'Approved', 7, 'P007'),
('2023-08-01', 'Rejected', 8, 'P008'),
('2023-09-01', 'Pending', 9, 'P009'),
('2023-10-01', 'Approved', 10, 'P010'),
('2023-11-01', 'Approved', 11, 'P001'),
('2023-12-01', 'Rejected', 12, 'P002'),
('2024-01-01', 'Pending', 13, 'P003'),
('2024-02-01', 'Approved', 14, 'P004'),
('2024-03-01', 'Rejected', 15, 'P005'),
('2024-04-01', 'Approved', 16, 'P006'),
('2024-05-01', 'Pending', 17, 'P007'),
('2024-06-01', 'Approved', 18, 'P008'),
('2024-07-01', 'Rejected', 19, 'P009'),
('2024-08-01', 'Approved', 20, 'P010');

-- Inserción en la tabla pagos
INSERT INTO payments (hourlyPayment, totalPayment, bonuses, employee) VALUES
(20.00, 1600.00, 200.00, 1),
(25.00, 2000.00, 300.00, 2),
(30.00, 2400.00, 250.00, 3),
(22.50, 1800.00, 150.00, 4),
(27.00, 2160.00, 100.00, 5),
(20.50, 1640.00, 250.00, 6),
(23.00, 1840.00, 300.00, 7),
(29.00, 2320.00, 200.00, 8),
(24.00, 1920.00, 400.00, 9),
(28.00, 2240.00, 350.00, 10),
(21.00, 1680.00, 150.00, 11),
(26.00, 2080.00, 250.00, 12),
(30.00, 2400.00, 300.00, 13),
(25.50, 2040.00, 200.00, 14),
(22.00, 1760.00, 100.00, 15),
(27.50, 2200.00, 200.00, 16),
(24.50, 1960.00, 150.00, 17),
(29.50, 2360.00, 300.00, 18),
(30.50, 2440.00, 350.00, 19),
(28.50, 2280.00, 250.00, 20);





-- SUBCONSULTAS

/*Obtener el salario promedio por departamento*/
SELECT d.name AS Department, 
       (SELECT AVG(p.salary) 
        FROM position p 
        WHERE p.departmentCode = d.code) AS Average_Salary
FROM department d;


/*Número de quejas por empleado que tiene más de una queja*/
SELECT e.firstName, e.lastName, 
       (SELECT COUNT(*) 
        FROM complaints c 
        WHERE c.employeeId = e.id) AS Complaints_Count
FROM employee e
WHERE (SELECT COUNT(*) 
       FROM complaints c 
       WHERE c.employeeId = e.id) > 1;



/*Total de días de vacaciones aprobadas para empleados con más de 3 años de antigüedad*/
SELECT e.firstName, e.lastName, 
       (SELECT SUM(DATEDIFF(v.endDate, v.startDate) + 1) 
        FROM vacations v 
        WHERE v.employeeId = e.id AND v.status = 'Approved') AS Total_Vacation_Days
FROM employee e
WHERE DATEDIFF(CURDATE(), e.contractDate) > 1095; -- 3 años



/*Lista de empleados que han recibido al menos un bono de desempeño*/
SELECT e.firstName, e.lastName
FROM employee e
WHERE e.id IN (
    SELECT DISTINCT perf.employeeId 
    FROM performance perf 
    WHERE perf.score > (
        SELECT AVG(score) 
        FROM performance
    )
);


/*Contar el número de ausencias por tipo de ausencia*/
SELECT a.type, 
       (SELECT COUNT(*) 
        FROM absence a2 
        WHERE a2.type = a.type) AS Absence_Count
FROM absence a
GROUP BY a.type;


/*Obtener el total de pagos realizados a empleados que han tomado vacaciones aprobadas*/

SELECT e.firstName, e.lastName, 
       (SELECT SUM(p.totalPayment) 
        FROM payments p 
        WHERE p.employeeId = e.id) AS Total_Payments
FROM employee e
WHERE e.id IN (
    SELECT v.employeeId 
    FROM vacations v 
    WHERE v.status = 'Approved'
);





--TRIGGERS

--Agregar codigo al usuario
DELIMITER $$
CREATE TRIGGER generate_employee_code BEFORE INSERT ON employee
FOR EACH ROW
BEGIN
    DECLARE dept_letter CHAR(1);
    DECLARE pos_letter CHAR(1);
    DECLARE consecutive INT;

    SELECT LEFT(name, 1) INTO dept_letter 
    FROM department 
    WHERE code = (SELECT departmentCode FROM position WHERE code = NEW.positionCode);
''
    SELECT LEFT(name, 1) INTO pos_letter 
    FROM position 
    WHERE code = NEW.positionCode;

    SELECT COUNT(*) + 1 INTO consecutive 
    FROM employee 
    WHERE positionCode = NEW.positionCode;

    -- Generar el código del empleado
    SET NEW.code = CONCAT(UPPER(dept_letter), UPPER(pos_letter), LPAD(consecutive, 2, '0'));
END;
$$
DELIMITER ;

/*Actualizar el salario de un empleado al cambiar su posicion*/
delimiter $$
CREATE TRIGGER update_salary_on_position_change
AFTER UPDATE ON employee
FOR EACH ROW
BEGIN
    IF OLD.positionCode != NEW.positionCode THEN
        UPDATE employee
        SET salary = (SELECT salary FROM position WHERE code = NEW.positionCode)
        WHERE id = NEW.id;
    END IF;
END $$
delimiter ;

/*Actualizar el total de pagos al insertar un nuevo pago*/
CREATE TRIGGER update_total_payments
AFTER INSERT ON payments
FOR EACH ROW
BEGIN
    UPDATE employee
    SET totalPayment = totalPayment + NEW.totalPayment
    WHERE id = NEW.employeeId;
END;


/*Calcular la duración de la ausencia al insertar*/
CREATE TRIGGER calculate_absence_duration
BEFORE INSERT ON absence
FOR EACH ROW
BEGIN
    SET NEW.duration = DATEDIFF(NEW.endDate, NEW.startDate);
END;


/*Asegurarse de que no se pueda eliminar un departamento si hay empleados asignados*/
CREATE TRIGGER prevent_department_delete
BEFORE DELETE ON department
FOR EACH ROW
BEGIN
    DECLARE emp_count INT;
    SELECT COUNT(*) INTO emp_count
    FROM employee
    WHERE positionCode IN (SELECT code FROM position WHERE departmentCode = OLD.code);
    
    IF emp_count > 0 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Cannot delete department with assigned employees.';
    END IF;
END;


/*Actualizar el estado de un empleado a 'Inactivo' si se elimina su posición*/
CREATE TRIGGER deactivate_employee_on_position_delete
AFTER DELETE ON position
FOR EACH ROW
BEGIN
    UPDATE employee
    SET status = 'Inactive'
    WHERE positionCode = OLD.code;
END;



/*Registrar la fecha de creación de un nuevo empleado*/
CREATE TRIGGER set_employee_creation_date
BEFORE INSERT ON employee
FOR EACH ROW
BEGIN
    SET NEW.creationDate = CURDATE();
END;


/*Aumentar el puntaje de desempeño si el empleado ha sido promovido*/
CREATE TRIGGER increase_performance_score_on_promotion
AFTER UPDATE ON employee
FOR EACH ROW
BEGIN
    IF OLD.positionCode != NEW.positionCode THEN
        UPDATE performance
        SET score = score + 5
        WHERE employeeId = NEW.id;
    END IF;
END;



/*Eliminar automáticamente los registros de ausencias de empleados que han sido despedidos*/
CREATE TRIGGER delete_absences_on_employee_termination
AFTER DELETE ON employee
FOR EACH ROW
BEGIN
    DELETE FROM absence
    WHERE employeeId = OLD.id;
END;


/*Actualizar la fecha de modificación al cambiar un registro de empleado*/
CREATE TRIGGER update_modification_date_on_employee_change
BEFORE UPDATE ON employee
FOR EACH ROW
BEGIN
    SET NEW.modificationDate = CURDATE();
END;