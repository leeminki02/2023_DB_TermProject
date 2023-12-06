-- Insert data into the PATIENTS table
INSERT INTO PATIENTS (pid, name, age, address, phone, height, weight, doctor) VALUES 
(0, '김예시', 30, '123 Exmpl St', '1034007090', 180, 75, 1),
(1, '이영희', 10, '456 Main St',  '3456787654', 130, 35, 1),
(2, '박민수', 40, '789 Main St',  '0987656787', 170, 75, 2),
(3, '최민지', 35, '100 Main St',  '8691243475', 188, 95, 2),
(4, '김철수', 30, '123 Main St',  '1234567890', 180, 75, 1);

-- Insert data into the DOCTORS table
INSERT INTO DOCTORS (did, name, phone, specialty) VALUES 
(0, 'Dr. Example', '1111111111', 1),
(1, 'Dr. Smith',   '0987654321', 1),
(2, 'Dr. Hong',    '5432535294', 2),
(3, 'Dr. Kim',     '1234567890', 0);

-- Insert data into the DEPARTMENTS table
INSERT INTO DEPARTMENTS (dpmt_id, name) VALUES 
(0, 'Cardiology'),
(1, 'Dermatology'),
(2, 'Neurology');

-- RECORDS
INSERT INTO RECORDS (rid, pid, did, date, time, description) VALUES 
(1, 1, 1, '2022-01-01', '10:00:00', 'Initial consultation'),
(2, 2, 1, '2022-01-02', '11:00:00', 'Follow-up'),
(3, 3, 2, '2022-01-03', '12:00:00', 'Routine check-up'),
(4, 4, 1, '2022-01-04', '13:00:00', 'Prescription refill');

-- SCHEDULE
INSERT INTO SCHEDULE (sid, did, pid, date, time, description) VALUES 
(1, 1, 1, '2022-01-05', '14:00:00', 'Patient consultation'),
(2, 1, 0, '2022-01-06', '15:00:00', 'Surgery'),
(3, 2, 3, '2022-01-07', '16:00:00', 'Research'),
(4, 1, 2, '2022-01-08', '17:00:00', 'Conference');

-- login_cred
INSERT INTO login_cred (id, type, uid, passcode) VALUES 
(0, 0, 0, 'php_1234'),
(1, 0, 1, 'php_1234'),
(2, 0, 2, 'php_1234'),
(3, 0, 3, 'php_1234'),
(4, 0, 4, 'php_1234'),
(5, 1, 0, 'php_1234'),
(6, 1, 1, 'php_1234'),
(7, 1, 2, 'php_1234'),
(8, 1, 3, 'php_1234');

