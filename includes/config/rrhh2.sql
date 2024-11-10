-- Inserción en la tabla departamento
INSERT INTO department (code, name) VALUES
('D001', 'Recursos Humanos'),
('D002', 'Tecnología'),
('D003', 'Marketing'),
('D004', 'Finanzas'),
('D005', 'Ventas'),
('D006', 'Operaciones'),
('D007', 'Atención al Cliente');


-- Inserción en la tabla promocion
INSERT INTO promotion (code, name, description, status, publicationDate) VALUES
('P001', 'Promoción Anual', 'Aumento del 10% en salario', 'Activo', '2023-01-15'),
('P002', 'Bono de Desempeño', 'Bono por desempeño excepcional', 'Activo', '2023-02-01'),
('P003', 'Promoción de Verano', 'Aumento temporal durante el verano', 'Inactivo', '2023-06-01'),
('P004', 'Bono de Navidad', 'Bono especial por Navidad', 'Activo', '2023-12-01'),
('P005', 'Promoción de Cumpleaños', 'Aumento del 5% en salario', 'Activo', '2023-03-01'),
('P006', 'Promoción de Proyecto', 'Bono por finalización de proyecto', 'Activo', '2023-04-01'),
('P007', 'Promoción de Innovación', 'Reconocimiento por innovación', 'Activo', '2023-05-01'),
('P008', 'Bono de Retención', 'Bono por permanencia en la empresa', 'Activo', '2023-07-01'),
('P009', 'Promoción de Liderazgo', 'Aumento por rol de liderazgo', 'Activo', '2023-08-01'),
('P010', 'Promoción de Capacitación', 'Bono por capacitación completada', 'Activo', '2023-09-01');


-- Inserción en la tabla puesto
INSERT INTO position (code, name, salary, departmentCode) VALUES
('P001', 'Gerente de Recursos Humanos', 60000, 'D001'),
('P002', 'Desarrollador de Software', 80000, 'D002'),
('P003', 'Especialista en Marketing', 50000, 'D003'),
('P004', 'Analista Financiero', 70000, 'D004'),
('P005', 'Ejecutivo de Ventas', 55000, 'D005'),
('P006', 'Coordinador de Operaciones', 65000, 'D006'),
('P007', 'Agente de Atención al Cliente', 30000, 'D007');


-- Inserción en la tabla empleado
INSERT INTO employee (firstName, lastName, middleName, email, gender, age, mobile, password, contractDate, positionCode, supervisorId) VALUES
('Juan', 'Pérez', 'Alberto', 'juan.perez@example.com', 'M', 30, '5551234567', 'pass123', '2021-01-15', 'P001', NULL),
('María', 'González', 'Fernanda', 'maria.gonzalez@example.com', 'F', 28, '5552345678', 'pass234', '2021-02-20', 'P002', null),
('Luis', 'Martínez', 'Antonio', 'luis.martinez@example.com', 'M', 35, '5553456789', 'pass345', '2020-03-10', 'P003', null),
('Ana', 'López', 'Carmen', 'ana.lopez@example.com', 'F', 26, '5554567890', 'pass456', '2022-04-18', 'P004', null),
('Carlos', 'Hernández', 'Eduardo', 'carlos.hernandez@example.com', 'M', 32, '5555678901', 'pass567', '2021-05-21', 'P005', null),
('Laura', 'García', 'Isabel', 'laura.garcia@example.com', 'F', 29, '5556789012', 'pass678', '2021-06-30', 'P006', null),
('Jorge', 'Ramírez', 'Diego', 'jorge.ramirez@example.com', 'M', 40, '5557890123', 'pass789', '2019-07-15', 'P007', null),
('Sofía', 'Torres', 'María', 'sofia.torres@example.com', 'F', 34, '5558901234', 'pass890', '2020-08-25', 'P008', 1),
('Diego', 'Mendoza', 'Julián', 'diego.mendoza@example.com', 'M', 31, '5559012345', 'pass901', '2021-09-10', 'P009', 2),
('Claudia', 'Sánchez', 'Patricia', 'claudia.sanchez@example.com', 'F', 27, '5550123456', 'pass012', '2022-10-05', 'P010', 3),
('Fernando', 'Castillo', 'Ricardo', 'fernando.castillo@example.com', 'M', 38, '5551234568', 'pass1234', '2018-11-12', 'P011', 4),
('Patricia', 'Ríos', 'Elena', 'patricia.rios@example.com', 'F', 33, '5552345679', 'pass2345', '2019-12-20', 'P012', 5),
('Andrés', 'Vega', 'Luis', 'andres.vega@example.com', 'M', 36, '5553456780', 'pass3456', '2020-01-30', 'P013', 6),
('Elena', 'Cruz', 'Ana', 'elena.cruz@example.com', 'F', 30, '5554567891', 'pass4567', '2021-02-15', 'P014', 7),
('Roberto', 'Morales', 'Javier', 'roberto.morales@example.com', 'M', 29, '5555678902', 'pass5678', '2021-03-20', 'P015', 1),
('Victoria', 'Jiménez', 'Lucía', 'victoria.jimenez@example.com', 'F', 32, '5556789013', 'pass6789', '2021-04-25', 'P016', 2),
('Pablo', 'Rojas', 'Fernando', 'pablo.rojas@example.com', 'M', 37, '5557890124', 'pass7890', '2020-05-30', 'P017', 3),
('Gabriela', 'Salazar', 'María', 'gabriela.salazar@example.com', 'F', 28, '5558901235', 'pass8901', '2021-06-15', 'P018', 4),
('Samuel', 'Pineda', 'Andrés', 'samuel.pineda@example.com', 'M', 34, '5559012346', 'pass9012', '2021-07-10', 'P019', 5),
('Jessica', 'Márquez', 'Sofía', 'jessica.marquez@example.com', 'F', 31, '5550123457', 'pass0123', '2021-08-05', 'P020', 6),
('Ricardo', 'Aguilar', 'Luis', 'ricardo.aguilar@example.com', 'M', 39, '5551234569', 'pass12345', '2020-09-15', 'P021', 7),
('Mariana', 'Cano', 'Isabel', 'mariana.cano@example.com', 'F', 25, '5552345670', 'pass23456', '2020-10-10', 'P022', 1),
('Hugo', 'Alvarado', 'José', 'hugo.alvarado@example.com', 'M', 29, '5553456781', 'pass34567', '2021-11-20', 'P023', 2),
('Natalia', 'Ceballos', 'Elena', 'natalia.ceballos@example.com', 'F', 27, '5554567892', 'pass45678', '2021-12-25', 'P024', 3),
('Cristian', 'Gaitán', 'Diego', 'cristian.gaitan@example.com', 'M', 32, '5555678903', 'pass56789', '2022-01-05', 'P025', 4),
('Daniela', 'Pérez', 'María', 'daniela.perez@example.com', 'F', 30, '5556789014', 'pass67890', '2022-02-15', 'P026', 5),
('Gabriel', 'Soto', 'Ricardo', 'gabriel.soto@example.com', 'M', 38, '5557890125', 'pass78901', '2022-03-20', 'P027', 6),
('Verónica', 'Cruz', 'Patricia', 'veronica.cruz@example.com', 'F', 35, '5558901236', 'pass89012', '2022-04-25', 'P028', 7),
('Sergio', 'Martínez', 'Alberto', 'sergio.martinez@example.com', 'M', 40, '5559012347', 'pass90123', '2022-05-30', 'P029', 1),
('Lucía', 'Hernández', 'Carmen', 'lucia.hernandez@example.com', 'F', 29, '5550123458', 'pass01234', '2022-06-15', 'P010', 2);


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
INSERT INTO performance (code, score, evaluationDate, comments, employeeId) VALUES
('PERF001', 85.5, '2023-01-20', 'Excellent performance throughout the year', 1),
('PERF002', 78.0, '2023-02-15', 'Good performance but needs improvement in teamwork', 2),
('PERF003', 90.0, '2023-03-10', 'Outstanding contributions to projects', 3),
('PERF004', 72.5, '2023-04-05', 'Satisfactory performance, but missed deadlines', 4),
('PERF005', 88.0, '2023-05-15', 'Consistently meets expectations', 5),
('PERF006', 95.0, '2023-06-10', 'Exceptional leadership skills', 6),
('PERF007', 80.0, '2023-07-20', 'Good performance, needs to focus on efficiency', 7),
('PERF008', 75.0, '2023-08-30', 'Meets expectations but lacks initiative', 8);


-- Inserción en la tabla vacaciones
INSERT INTO vacations (startDate, endDate, status, employeeId) VALUES
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
INSERT INTO complaints (date, description, status, employeeId) VALUES
('2023-06-15', 'Issue with a colleague', 'Resolved', 1),
('2023-09-01', 'Complaint about defective equipment', 'Pending', 2),
('2023-08-05', 'Conflict with supervisor', 'Resolved', 3),
('2023-10-12', 'Problems with work schedule', 'Pending', 4),
('2023-11-20', 'Incident with a customer', 'Resolved', 5),
('2023-07-15', 'Dispute over project responsibilities', 'Resolved', 6),
('2023-08-25', 'Concerns about workplace safety', 'Pending', 7),
('2023-09-30', 'Feedback on team collaboration', 'Resolved', 8);


-- Inserción en la tabla ausencia
INSERT INTO absence (startDate, endDate, status, type, description, employeeId) VALUES
('2023-01-15', '2023-01-20', 'Approved', 'Sick', 'Flu symptoms', 1),
('2023-02-10', '2023-02-12', 'Approved', 'Personal', 'Family emergency', 2),
('2023-03-05', '2023-03-06', 'Pending', 'Vacation', 'Planned family trip', 3),
('2023-04-15', '2023-04-16', 'Approved', 'Sick', 'Migraine', 4),
('2023-05-01', '2023-05-02', 'Approved', 'Personal', 'Moving house', 5),
('2023-06-20', '2023-06-22', 'Approved', 'Sick', 'Stomach flu', 6),
('2023-07-10', '2023-07-15', 'Pending', 'Vacation', 'Beach holiday', 7),
('2023-08-01', '2023-08-03', 'Approved', 'Personal', 'Medical appointment', 8);


-- Inserción en la tabla incidente
INSERT INTO incident (incidentType, incidentDate, description, employeeId) VALUES
('Safety', '2023-01-15', 'Slip and fall accident in the workplace', 1),
('Harassment', '2023-02-20', 'Reported inappropriate comments from a colleague', 2),
('Equipment Failure', '2023-03-10', 'Machine malfunction during operation', 3),
('Policy Violation', '2023-04-05', 'Failure to adhere to safety protocols', 4),
('Theft', '2023-05-15', 'Personal belongings stolen from the locker', 5),
('Injury', '2023-06-25', 'Injury while lifting heavy equipment', 6),
('Conflict', '2023-07-30', 'Dispute over project responsibilities', 7),
('Accident', '2023-08-15', 'Minor accident during transportation', 8);