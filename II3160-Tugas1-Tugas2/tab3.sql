create database gadget;

use gadget;

create table handphone(
	hp_id VARCHAR(50),
	hp_brand VARCHAR(50),
	hp_type VARCHAR(50),
	hp_price VARCHAR(50), 
	PRIMARY KEY (hp_id)
	);


INSERT INTO handphone(hp_id, hp_brand, hp_type, hp_price) VALUES
('001', 'samsung', 'S4', 'Rp 5.000.000'),
('002', 'samsung', 'S3', 'Rp 3.000.000'),
('003', 'nokia', 'Lumia 720', 'Rp 3.500.000'),
('004', 'sony', 'Z', 'Rp 6.500.000'),
('005', 'lg', 'G2', 'Rp 6.000.000');