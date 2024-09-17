ALTER TABLE order_items ADD COLUMN is_new BOOLEAN DEFAULT TRUE;

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
('flower_basket1','	ไม่ระบุ','	1',	'0',	'basket1.jpg',	'flower_basket',NOW(),NOW()),
('flower_basket2','	ไม่ระบุ','	1',	'0',	'basket2.jpg',	'flower_basket',NOW(),NOW()),
('flower_basket3','	ไม่ระบุ','	1',	'0',	'basket3.jpg',	'flower_basket',NOW(),NOW()),
('flower_basket4','	ไม่ระบุ','	1',	'0',	'basket4.jpg',	'flower_basket',NOW(),NOW()),
('flower_basket5','	ไม่ระบุ','	1',	'0',	'basket5.jpg',	'flower_basket',NOW(),NOW()),
('flower_basket6','	ไม่ระบุ','	1',	'0',	'basket6.jpg',	'flower_basket',NOW(),NOW()),
('flower_basket7','	ไม่ระบุ','	1',	'0',	'basket7.jpg',	'flower_basket',NOW(),NOW()),
('flower_basket8','	ไม่ระบุ','	1',	'0',	'basket8.jpg',	'flower_basket',NOW(),NOW()),
('flower_basket9','	ไม่ระบุ','	1',	'0',	'basket9.jpg',	'flower_basket',NOW(),NOW()),
('flower_basket10','ไม่ระบุ','1',	'0'	,'basket10.jpg',	'flower_basket',NOW(),NOW()),
('flower_basket11','ไม่ระบุ','1',	'0'	,'basket11.jpg',	'flower_basket',NOW(),NOW()),
('flower_basket12','ไม่ระบุ','1',	'0'	,'basket12.jpg',	'flower_basket',NOW(),NOW()),
('flower_basket13','ไม่ระบุ','1',	'0'	,'basket13.jpg',	'flower_basket',NOW(),NOW()),
('flower_basket14','ไม่ระบุ','1',	'0'	,'basket14.jpg',	'flower_basket',NOW(),NOW()),
('flower_wrapping_pape1',	'ไม่ระบุ'	,'1'	,'0'	,'flower_wrapping_pape1.jpg',	'flower_wrapping_pape',NOW(),NOW()),
('flower_wrapping_pape2',	'ไม่ระบุ'	,'1'	,'0'	,'flower_wrapping_pape2.jpg',	'flower_wrapping_pape',NOW(),NOW()),
('flower_wrapping_pape3',	'ไม่ระบุ'	,'1'	,'0'	,'flower_wrapping_pape3.jpg',	'flower_wrapping_pape',NOW(),NOW()),
('flower_wrapping_pape4',	'ไม่ระบุ'	,'1'	,'0'	,'flower_wrapping_pape4.jpg',	'flower_wrapping_pape',NOW(),NOW()),
('flower_wrapping_pape5',	'ไม่ระบุ'	,'1'	,'0'	,'flower_wrapping_pape5.jpg',	'flower_wrapping_pape',NOW(),NOW()),
('flower_wrapping_pape6',	'ไม่ระบุ'	,'1'	,'0'	,'flower_wrapping_pape6.jpg',	'flower_wrapping_pape',NOW(),NOW()),
('flower_wrapping_pape7',	'ไม่ระบุ'	,'1'	,'0'	,'flower_wrapping_pape7.jpg',	'flower_wrapping_pape',NOW(),NOW()),
('flower_wrapping_pape8',	'ไม่ระบุ'	,'1'	,'0'	,'flower_wrapping_pape8.jpg',	'flower_wrapping_pape',NOW(),NOW()),
('flower_wrapping_pape9',	'ไม่ระบุ'	,'1'	,'0'	,'flower_wrapping_pape9.jpg',	'flower_wrapping_pape',NOW(),NOW()),
('bouquet_of_money1',	'ไม่ระบุ'	,'1'	,'0'	,'bouquet_of_money1.jpg'	,'bouquet_of_money',NOW(),NOW()),
('bouquet_of_money2',	'ไม่ระบุ'	,'1'	,'0'	,'bouquet_of_money2.jpg'	,'bouquet_of_money',NOW(),NOW()),
('bouquet_of_money3',	'ไม่ระบุ'	,'1'	,'0'	,'bouquet_of_money3.jpg'	,'bouquet_of_money',NOW(),NOW()),
('bouquet_of_money4',	'ไม่ระบุ'	,'1'	,'0'	,'bouquet_of_money4.jpg'	,'bouquet_of_money',NOW(),NOW()),
('bouquet_of_money5',	'ไม่ระบุ'	,'1'	,'0'	,'bouquet_of_money5.jpg'	,'bouquet_of_money',NOW(),NOW()),
('bouquet_of_money6',	'ไม่ระบุ'	,'1'	,'0'	,'bouquet_of_money6.jpg'	,'bouquet_of_money',NOW(),NOW()),
('bouquet_of_money7',	'ไม่ระบุ'	,'1'	,'0'	,'bouquet_of_money7.jpg'	,'bouquet_of_money',NOW(),NOW()),
('bouquet_of_money8',	'ไม่ระบุ'	,'1'	,'0'	,'bouquet_of_money8.jpg'	,'bouquet_of_money',NOW(),NOW()),
('bouquet_of_money9',	'ไม่ระบุ'	,'1'	,'0'	,'bouquet_of_money9.jpg'	,'bouquet_of_money',NOW(),NOW()),
('bouquet_of_money10'	,'ไม่ระบุ'	,'1'	,'0',	'bouquet_of_money10.jpg',	'bouquet_of_money',NOW(),NOW()),
('bouquet_of_money11'	,'ไม่ระบุ'	,'1'	,'0',	'bouquet_of_money11.jpg',	'bouquet_of_money',NOW(),NOW()),
('bouquet_of_money12'	,'ไม่ระบุ'	,'1'	,'0',	'bouquet_of_money12.jpg',	'bouquet_of_money',NOW(),NOW()),
('bouquet_of_money13'	,'ไม่ระบุ'	,'1'	,'0',	'bouquet_of_money13.jpg',	'bouquet_of_money',NOW(),NOW()),
('bouquet_of_money14'	,'ไม่ระบุ'	,'1'	,'0',	'bouquet_of_money14.jpg',	'bouquet_of_money',NOW(),NOW()),
('bouquet_of_money15'	,'ไม่ระบุ'	,'1'	,'0',	'bouquet_of_money15.jpg',	'bouquet_of_money',NOW(),NOW()),
('bouquet_of_money16'	,'ไม่ระบุ'	,'1'	,'0',	'bouquet_of_money16.jpg',	'bouquet_of_money',NOW(),NOW()),
('bouquet_of_money17'	,'ไม่ระบุ'	,'1'	,'0',	'bouquet_of_money17.jpg',	'bouquet_of_money',NOW(),NOW()),
('bunch_of_flowers1'	,'ไม่ระบุ'	,'1'	,'0'	,'bunch_of_flowers1.jpg'	,'bunch_of_flowers',NOW(),NOW()),
('bunch_of_flowers2'	,'ไม่ระบุ'	,'1'	,'0'	,'bunch_of_flowers2.jpg'	,'bunch_of_flowers',NOW(),NOW()),
('bunch_of_flowers3'	,'ไม่ระบุ'	,'1'	,'0'	,'bunch_of_flowers3.jpg'	,'bunch_of_flowers',NOW(),NOW()),
('bunch_of_flowers4'	,'ไม่ระบุ'	,'1'	,'0'	,'bunch_of_flowers4.jpg'	,'bunch_of_flowers',NOW(),NOW()),
('bunch_of_flowers5'	,'ไม่ระบุ'	,'1'	,'0'	,'bunch_of_flowers5.jpg'	,'bunch_of_flowers',NOW(),NOW()),
('bunch_of_flowers6'	,'ไม่ระบุ'	,'1'	,'0'	,'bunch_of_flowers6.jpg'	,'bunch_of_flowers',NOW(),NOW()),
('bunch_of_flowers7'	,'ไม่ระบุ'	,'1'	,'0'	,'bunch_of_flowers7.jpg'	,'bunch_of_flowers',NOW(),NOW()),
('bunch_of_flowers8'	,'ไม่ระบุ'	,'1'	,'0'	,'bunch_of_flowers8.jpg'	,'bunch_of_flowers',NOW(),NOW()),
('bunch_of_flowers9'	,'ไม่ระบุ'	,'1'	,'0'	,'bunch_of_flowers9.jpg'	,'bunch_of_flowers',NOW(),NOW()),
('price_of_flowers1'	,'ไม่ระบุ'	,'1'	,'0'	,'price_of_flowers1.jpg'	,'price_of_flowers',NOW(),NOW()),
('price_of_flowers2'	,'ไม่ระบุ'	,'1'	,'0'	,'price_of_flowers2.jpg'	,'price_of_flowers',NOW(),NOW()),
('price_of_flowers3'	,'ไม่ระบุ'	,'1'	,'0'	,'price_of_flowers3.jpg'	,'price_of_flowers',NOW(),NOW()),
('price_of_flowers4'	,'ไม่ระบุ'	,'1'	,'0'	,'price_of_flowers4.jpg'	,'price_of_flowers',NOW(),NOW()),
('price_of_flowers5'	,'ไม่ระบุ'	,'1'	,'0'	,'price_of_flowers5.jpg'	,'price_of_flowers',NOW(),NOW()),
('price_of_flowers6'	,'ไม่ระบุ'	,'1'	,'0'	,'price_of_flowers6.jpg'	,'price_of_flowers',NOW(),NOW()),
('price_of_flowers7'	,'ไม่ระบุ'	,'1'	,'0'	,'price_of_flowers7.jpg'	,'price_of_flowers',NOW(),NOW()),
('price_of_flowers8'	,'ไม่ระบุ'	,'1'	,'0'	,'price_of_flowers8.jpg'	,'price_of_flowers',NOW(),NOW()),
('price_of_flowers9'	,'ไม่ระบุ'	,'1'	,'0'	,'price_of_flowers9.jpg'	,'price_of_flowers',NOW(),NOW()),
('bunch_of_flowers10'	,'ไม่ระบุ'	,'1'	,'0'	,'bunch_of_flowers10.jpg',	'bunch_of_flowers',NOW(),NOW()),
('bunch_of_flowers11'	,'ไม่ระบุ'	,'1'	,'0'	,'bunch_of_flowers11.jpg',	'bunch_of_flowers',NOW(),NOW()),
('bunch_of_flowers12'	,'ไม่ระบุ'	,'1'	,'0'	,'bunch_of_flowers12.jpg',	'bunch_of_flowers',NOW(),NOW()),
('bunch_of_flowers13'	,'ไม่ระบุ'	,'1'	,'0'	,'bunch_of_flowers13.jpg',	'bunch_of_flowers',NOW(),NOW()),
('bunch_of_flowers14'	,'ไม่ระบุ'	,'1'	,'0'	,'bunch_of_flowers14.jpg',	'bunch_of_flowers',NOW(),NOW()),
('bunch_of_flowers15'	,'ไม่ระบุ'	,'1'	,'0'	,'bunch_of_flowers15.jpg',	'bunch_of_flowers',NOW(),NOW()),
('bunch_of_flowers16'	,'ไม่ระบุ'	,'1'	,'0'	,'bunch_of_flowers16.jpg',	'bunch_of_flowers',NOW(),NOW()),
('bunch_of_flowers17'	,'ไม่ระบุ'	,'1'	,'0'	,'bunch_of_flowers17.jpg',	'bunch_of_flowers',NOW(),NOW()),
('bunch_of_flowers18'	,'ไม่ระบุ'	,'1'	,'0'	,'bunch_of_flowers18.jpg',	'bunch_of_flowers',NOW(),NOW()),
('price_of_flowers10'	,'ไม่ระบุ'	,'1'	,'0'	,'price_of_flowers10.jpg',	'price_of_flowers',NOW(),NOW()),
('price_of_flowers11'	,'ไม่ระบุ'	,'1'	,'0'	,'price_of_flowers11.jpg',	'price_of_flowers',NOW(),NOW()),
('price_of_flowers12'	,'ไม่ระบุ'	,'1'	,'0'	,'price_of_flowers12.jpg',	'price_of_flowers',NOW(),NOW()),
('price_of_flowers13'	,'ไม่ระบุ'	,'1'	,'0'	,'price_of_flowers13.jpg',	'price_of_flowers',NOW(),NOW()),
('price_of_flowers14'	,'ไม่ระบุ'	,'1'	,'0'	,'price_of_flowers14.jpg',	'price_of_flowers',NOW(),NOW()),
('price_of_flowers15'	,'ไม่ระบุ'	,'1'	,'0'	,'price_of_flowers15.jpg',	'price_of_flowers',NOW(),NOW());


