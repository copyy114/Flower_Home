CREATE TABLE IF NOT EXISTS `tbproduct` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255),
  `description` TEXT,
  `prev_price` DECIMAL(10,2),
  `current_price` DECIMAL(10,2),
  `img_path` VARCHAR(255),
  `type_shop` VARCHAR(50),
  `date_created` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `date_updated` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO `tbproduct` (`name`, `description`, `prev_price`, `current_price`, `img_path`, `type_shop`, `date_created`, `date_updated`) VALUES 
('bow1	','ไม่ระบุ','20',	'0','IMG_1185.jpg','bow_set',NOW(),NOW()),
('bow2	','ไม่ระบุ','20',	'0','IMG_1186.jpg','bow_set',NOW(),NOW()),
('bow3	','ไม่ระบุ','20',	'0','IMG_1187.jpg','bow_set',NOW(),NOW()),
('bow4	','ไม่ระบุ','20',	'0','IMG_1188.jpg','bow_set',NOW(),NOW()),
('bow5	','ไม่ระบุ','20',	'0','IMG_1189.jpg','bow_set',NOW(),NOW()),
('bow6	','ไม่ระบุ','20',	'0','IMG_1190.jpg','bow_set',NOW(),NOW()),
('bow7	','ไม่ระบุ','20',	'0','IMG_1191.jpg','bow_set',NOW(),NOW()),
('bow8	','ไม่ระบุ','20',	'0','IMG_1192.jpg','bow_set',NOW(),NOW()),
('bow9	','ไม่ระบุ','20',	'0','IMG_1193.jpg','bow_set',NOW(),NOW()),
('bow10	','ไม่ระบุ','20',	'0','IMG_1194.jpg','bow_set',NOW(),NOW()),
('bow11	','ไม่ระบุ','20',	'0','IMG_1195.jpg','bow_set',NOW(),NOW()),
('bow12	','ไม่ระบุ','20',	'0','IMG_1196.jpg','bow_set',NOW(),NOW()),
('bow13	','ไม่ระบุ','20',	'0','IMG_1197.jpg','bow_set',NOW(),NOW()),
('bow14	','ไม่ระบุ','20',	'0','IMG_1198.jpg','bow_set',NOW(),NOW()),
('bow15	','ไม่ระบุ','20',	'0','IMG_1199.jpg','bow_set',NOW(),NOW()),
('bow16	','ไม่ระบุ','20',	'0','IMG_1200.jpg','bow_set',NOW(),NOW()),
('bow17	','ไม่ระบุ','20',	'0','IMG_1201.jpg','bow_set',NOW(),NOW()),
('bow18	','ไม่ระบุ','20',	'0','IMG_1202.jpg','bow_set',NOW(),NOW()),
('bow19	','ไม่ระบุ','20',	'0','IMG_1203.jpg','bow_set',NOW(),NOW()),
('bow20	','ไม่ระบุ','20',	'0','IMG_1204.jpg','bow_set',NOW(),NOW()),
('bow21	','ไม่ระบุ','20',	'0','IMG_1205.jpg','bow_set',NOW(),NOW()),
('bow22	','ไม่ระบุ','20',	'0','IMG_1206.jpg','bow_set',NOW(),NOW()),
('bow23	','ไม่ระบุ','20',	'0','IMG_1207.jpg','bow_set',NOW(),NOW()),
('equipment1','ไม่ระบุ','80','0','IMG_0576.jpg', 'other_equipment',NOW(),NOW()),
('equipment2','ไม่ระบุ','80','0','IMG_0577.jpg', 'other_equipment',NOW(),NOW()),
('equipment3','ไม่ระบุ','80','0','IMG_0578.jpg', 'other_equipment',NOW(),NOW()),
('equipment4','ไม่ระบุ','80','0','Square(1).png','other_equipment',NOW(),NOW()),
('equipment5','ไม่ระบุ','80','0','Square(2).png','other_equipment',NOW(),NOW()),
('equipment6','ไม่ระบุ','80','0','Square(3).png','other_equipment',NOW(),NOW()),
('equipment7','ไม่ระบุ','80','0','Square.png',   'other_equipment',NOW(),NOW());
