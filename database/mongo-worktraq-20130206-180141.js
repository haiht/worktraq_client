
/** tb_product indexes **/
db.getCollection("tb_product").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** tb_product indexes **/
db.getCollection("tb_product").ensureIndex({
  "product_sku": NumberInt(1)
},[
  
]);

/** tb_product indexes **/
db.getCollection("tb_product").ensureIndex({
  "product_id": NumberInt(1)
},{
  "unique": true
});

/** tb_product records **/
db.getCollection("tb_product").insert({
  "_id": ObjectId("50c04e7b9c7684f067000000"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10006),
  "date_created": ISODate("2012-12-26T10:20:34.0Z"),
  "default_price": 96,
  "image_desc": "Image for current product",
  "image_file": "thumbnail_sc03.jpg",
  "image_option": NumberInt(0),
  "location_id": NumberInt(0),
  "long_description": "Grand Opening POP 48x72 - Scratch & Save",
  "map_content": [
    
  ],
  "material": [
    
  ],
  "num_images": NumberInt(1),
  "package_content": [
    
  ],
  "package_quantity": NumberInt(1),
  "package_type": NumberInt(0),
  "product_detail": "Grand_Opening_POP",
  "product_id": NumberLong(7),
  "product_sku": "NC-POP_06",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/FGL\/products\/7\/",
  "short_description": "Grand Opening POP 48x72 - Scratch & Save",
  "size": [
    {
      "width": NumberInt(48),
      "height": NumberInt(72),
      "unit": "in",
      "status": NumberInt(0)
    }
  ],
  "size_option": NumberInt(0),
  "size_unit": "in",
  "sold_by": "",
  "tag": [
    
  ],
  "taxonomy": [
    
  ],
  "text": [
    {
      "text": "",
      "color": "#000000",
      "font-name": "Verdana",
      "font-size": "14pt",
      "font-bold": NumberInt(1),
      "font-italic": NumberInt(0),
      "left": NumberInt(0),
      "top": NumberInt(0)
    }
  ],
  "text_option": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0)
});
db.getCollection("tb_product").insert({
  "_id": ObjectId("50c1487a9c7684f60e00000f"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10006),
  "date_created": ISODate("2012-12-26T10:20:34.0Z"),
  "default_price": 0,
  "image_desc": "Image for current product",
  "image_file": "SCF11_252_Snowboard_45x28_K2_02.jpg",
  "image_option": NumberInt(0),
  "location_id": NumberInt(0),
  "long_description": "Snowboard Merchandising POP 45x28 CORE",
  "map_content": [
    
  ],
  "material": [
    
  ],
  "num_images": NumberInt(1),
  "package_content": [
    
  ],
  "package_quantity": NumberInt(1),
  "package_type": NumberInt(0),
  "product_detail": "",
  "product_id": NumberInt(33),
  "product_note": "",
  "product_sku": "FGL-SNOWBPOP-007",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/FGL\/products\/33\/",
  "short_description": "Snowboard Merchandising POP 45x28 CORE",
  "size": [
    {
      "width": NumberInt(45),
      "height": NumberInt(28),
      "unit": "in",
      "status": NumberInt(0)
    }
  ],
  "size_option": NumberInt(0),
  "size_unit": "in",
  "sold_by": "",
  "tag": [
    NumberInt(2)
  ],
  "taxonomy": [
    
  ],
  "text": [
    {
      "text": "",
      "color": "#000000",
      "font-name": "Verdana",
      "font-size": "14pt",
      "font-bold": NumberInt(1),
      "font-italic": NumberInt(0),
      "left": NumberInt(0),
      "top": NumberInt(0)
    }
  ],
  "text_option": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0)
});
db.getCollection("tb_product").insert({
  "_id": ObjectId("5108ffab9c7684cd35000029"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10004),
  "date_created": ISODate("2013-01-30T11:10:35.0Z"),
  "default_price": 395,
  "file_hd": "",
  "image_choose": NumberInt(0),
  "image_desc": "Image for current product",
  "image_file": "angie850.png",
  "image_option": NumberInt(1),
  "location_id": NumberInt(0),
  "long_description": "",
  "map_content": [
    
  ],
  "material": [
    
  ],
  "num_images": NumberInt(1),
  "package_content": [
    
  ],
  "package_quantity": NumberInt(1),
  "package_type": NumberInt(0),
  "product_detail": "Jenni Bannerstand",
  "product_id": NumberInt(45),
  "product_note": "",
  "product_sku": "VHT-Angie600",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/VHT\/products\/45\/",
  "short_description": "Bannerstand - Angie 600",
  "size_option": NumberInt(0),
  "sold_by": NumberInt(0),
  "tag": [
    NumberInt(13)
  ],
  "text": [
    {
      "text": "",
      "color": "#000000",
      "font-name": "Verdana",
      "font-size": "14pt",
      "font-bold": NumberInt(1),
      "font-italic": NumberInt(0),
      "left": NumberInt(0),
      "top": NumberInt(0)
    }
  ],
  "text_option": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0)
});
db.getCollection("tb_product").insert({
  "_id": ObjectId("510b75fc9c7684626b000270"),
  "product_id": NumberInt(53),
  "product_sku": "VHT-SintaBox-Certificate",
  "short_description": "Co-Op Certificates (Set of 2)",
  "long_description": "",
  "product_detail": "",
  "size_option": NumberInt(0),
  "image_option": NumberInt(0),
  "image_choose": NumberInt(0),
  "num_images": NumberInt(1),
  "package_quantity": NumberInt(1),
  "allow_single": NumberInt(1),
  "package_type": NumberInt(0),
  "package_content": [
    
  ],
  "image_file": "Ceritificate.png",
  "image_desc": "Image for current product",
  "saved_dir": "resources\/VHT\/products\/53\/",
  "map_content": [
    
  ],
  "material": [
    {
      "id": NumberInt(2),
      "name": "Sintra",
      "color": "White",
      "width": 11.75,
      "length": 8.75,
      "thick": 0.3,
      "uthick": "cm",
      "usize": "in",
      "price": NumberInt(35),
      "size": NumberInt(0),
      "status": NumberInt(0)
    }
  ],
  "text_option": NumberInt(0),
  "text": [
    {
      "text": "",
      "color": "#000000",
      "font-name": "Verdana",
      "font-size": "14pt",
      "font-bold": NumberInt(1),
      "font-italic": NumberInt(0),
      "left": NumberInt(0),
      "top": NumberInt(0)
    }
  ],
  "sold_by": NumberInt(1),
  "default_price": 0,
  "product_status": NumberInt(3),
  "company_id": NumberInt(10004),
  "location_id": NumberInt(0),
  "tag": [
    
  ],
  "product_note": "",
  "user_name": "admin",
  "user_type": NumberInt(0),
  "file_hd": "",
  "date_created": ISODate("2013-02-01T07:59:56.0Z")
});
db.getCollection("tb_product").insert({
  "_id": ObjectId("50c04e839c7684d45d0000db"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10006),
  "date_created": ISODate("2012-12-26T10:20:34.0Z"),
  "default_price": 19.75,
  "image_desc": "Image for current product",
  "image_file": "thumbnail_sc04.jpg",
  "image_option": NumberInt(0),
  "location_id": NumberInt(0),
  "long_description": "Grand_Opening_POP_11x85_Scratch_Save",
  "map_content": [
    
  ],
  "material": [
    
  ],
  "num_images": NumberInt(1),
  "package_content": [
    
  ],
  "package_quantity": NumberInt(1),
  "package_type": NumberInt(0),
  "product_detail": "Grand_Opening_POP",
  "product_id": NumberLong(8),
  "product_sku": "NC-POP_04",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/FGL\/products\/8\/",
  "short_description": "Grand_Opening_POP_11x85_Scratch_Save",
  "size": [
    {
      "width": NumberInt(11),
      "height": 8.5,
      "unit": "in",
      "status": NumberInt(0)
    }
  ],
  "size_option": NumberInt(0),
  "size_unit": "in",
  "sold_by": "",
  "tag": [
    
  ],
  "taxonomy": [
    
  ],
  "text": [
    {
      "text": "",
      "color": "#000000",
      "font-name": "Verdana",
      "font-size": "14pt",
      "font-bold": NumberInt(1),
      "font-italic": NumberInt(0),
      "left": NumberInt(0),
      "top": NumberInt(0)
    }
  ],
  "text_option": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0)
});
db.getCollection("tb_product").insert({
  "_id": ObjectId("50c04e949c7684ec67000004"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10006),
  "date_created": ISODate("2012-12-26T10:20:34.0Z"),
  "default_price": 64.23,
  "image_desc": "Image for current product",
  "image_file": "tn_NC_POP_05.jpg",
  "image_option": NumberInt(0),
  "location_id": NumberInt(0),
  "long_description": "Grand Opening POP 28\"x59\" - (Scratch & Save)",
  "map_content": [
    
  ],
  "material": [
    
  ],
  "num_images": NumberInt(1),
  "package_content": [
    
  ],
  "package_quantity": NumberInt(1),
  "package_type": NumberInt(0),
  "product_detail": "Grand Opening POP 28\"x59\" - (Scratch & Save)",
  "product_id": NumberLong(9),
  "product_sku": "NC-POP_05",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/FGL\/products\/9\/",
  "short_description": "Grand Opening POP 28\"x59\" - (Scratch & Save)",
  "size": [
    {
      "width": NumberInt(28),
      "height": NumberInt(59),
      "unit": "in",
      "status": NumberInt(0)
    }
  ],
  "size_option": NumberInt(0),
  "size_unit": "in",
  "sold_by": "",
  "tag": [
    
  ],
  "taxonomy": [
    
  ],
  "text": [
    {
      "text": "",
      "color": "#000000",
      "font-name": "Verdana",
      "font-size": "14pt",
      "font-bold": NumberInt(1),
      "font-italic": NumberInt(0),
      "left": NumberInt(0),
      "top": NumberInt(0)
    }
  ],
  "text_option": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0)
});
db.getCollection("tb_product").insert({
  "_id": ObjectId("50c04eb69c76841066000052"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10006),
  "date_created": ISODate("2012-12-26T10:20:34.0Z"),
  "default_price": 10,
  "image_desc": "Image for current product",
  "image_file": "tn_NC_POP_01.jpg",
  "image_option": NumberInt(0),
  "location_id": NumberInt(1000006),
  "long_description": "Grand Opening_POP 11\"x8.5\"",
  "map_content": [
    
  ],
  "material": [
    
  ],
  "num_images": NumberInt(1),
  "package_content": [
    
  ],
  "package_quantity": NumberInt(1),
  "package_type": NumberInt(0),
  "product_detail": "Grand Opening_POP 11\"x8.5\"",
  "product_id": NumberLong(10),
  "product_sku": "NC-POP_01",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/FGL\/products\/10\/",
  "short_description": "Grand Opening_POP 11\"x8.5\"",
  "size": [
    
  ],
  "size_option": NumberInt(0),
  "size_unit": "in",
  "sold_by": "",
  "tag": [
    
  ],
  "taxonomy": [
    
  ],
  "text": [
    {
      "text": "",
      "color": "#000000",
      "font-name": "Verdana",
      "font-size": "14pt",
      "font-bold": NumberInt(1),
      "font-italic": NumberInt(0),
      "left": NumberInt(0),
      "top": NumberInt(0)
    }
  ],
  "text_option": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0)
});
db.getCollection("tb_product").insert({
  "_id": ObjectId("50c074879c768416700000cd"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10004),
  "date_created": ISODate("2012-12-26T10:20:34.0Z"),
  "default_price": 0,
  "image_desc": "Image for current product",
  "image_file": "13b8e65ed9874d0d1db5d227d6e71ddc.jpg",
  "image_option": NumberInt(0),
  "location_id": NumberInt(1000001),
  "long_description": "Product_Name_Cards_for_the_Bello_Gourmet_Coffee_Thermos_4_Styles_Available",
  "map_content": [
    
  ],
  "material": [
    
  ],
  "num_images": NumberInt(1),
  "package_content": [
    
  ],
  "package_quantity": NumberInt(1),
  "package_type": NumberInt(0),
  "product_detail": "",
  "product_id": NumberInt(14),
  "product_sku": "VHT - 0004",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/VHT\/products\/14\/",
  "short_description": "Italian_Blend",
  "size": [
    
  ],
  "size_option": NumberInt(0),
  "size_unit": "in",
  "sold_by": "",
  "tag": [
    
  ],
  "taxonomy": [
    "1"
  ],
  "text": [
    {
      "text": "",
      "color": "#000000",
      "font-name": "Verdana",
      "font-size": "14pt",
      "font-bold": NumberInt(1),
      "font-italic": NumberInt(0),
      "left": NumberInt(0),
      "top": NumberInt(0)
    }
  ],
  "text_option": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0)
});
db.getCollection("tb_product").insert({
  "_id": ObjectId("50c146429c7684660e000020"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10006),
  "date_created": ISODate("2012-12-26T10:20:34.0Z"),
  "default_price": 0,
  "image_desc": "Image for current product",
  "image_file": "SCF11_252_Ski_45x28_K2_01.jpg",
  "image_option": NumberInt(0),
  "location_id": NumberInt(1000006),
  "long_description": "Ski Merchandising POP - 45x28 - CORE",
  "map_content": [
    
  ],
  "material": [
    
  ],
  "num_images": NumberInt(1),
  "package_content": [
    
  ],
  "package_quantity": NumberInt(1),
  "package_type": NumberInt(0),
  "product_detail": "",
  "product_id": NumberInt(20),
  "product_sku": "FGL-SKIPOP-006",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/FGL\/products\/20\/",
  "short_description": "Ski Merchandising POP - 45x28 - CORE",
  "size": [
    
  ],
  "size_option": NumberInt(0),
  "size_unit": "in",
  "sold_by": "",
  "tag": [
    
  ],
  "taxonomy": [
    "2"
  ],
  "text": [
    {
      "text": "",
      "color": "#000000",
      "font-name": "Verdana",
      "font-size": "14pt",
      "font-bold": NumberInt(1),
      "font-italic": NumberInt(0),
      "left": NumberInt(0),
      "top": NumberInt(0)
    }
  ],
  "text_option": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0)
});
db.getCollection("tb_product").insert({
  "_id": ObjectId("50c146b19c7684e80d000075"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10006),
  "date_created": ISODate("2012-12-26T10:20:34.0Z"),
  "default_price": 0,
  "image_desc": "Image for current product",
  "image_file": "SCF11_252_Ski_45x28_Rossignol_01.jpg",
  "image_option": NumberInt(0),
  "location_id": NumberInt(1000006),
  "long_description": "Ski Merchandising POP - 45x28 - CORE",
  "map_content": [
    
  ],
  "material": [
    
  ],
  "num_images": NumberInt(1),
  "package_content": [
    
  ],
  "package_quantity": NumberInt(1),
  "package_type": NumberInt(0),
  "product_detail": "",
  "product_id": NumberInt(23),
  "product_sku": "FGL-SKIPOP-009",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/FGL\/products\/23\/",
  "short_description": "Ski Merchandising POP - 45x28 - CORE",
  "size": [
    
  ],
  "size_option": NumberInt(0),
  "size_unit": "in",
  "sold_by": "",
  "tag": [
    
  ],
  "taxonomy": [
    "2"
  ],
  "text": [
    {
      "text": "",
      "color": "#000000",
      "font-name": "Verdana",
      "font-size": "14pt",
      "font-bold": NumberInt(1),
      "font-italic": NumberInt(0),
      "left": NumberInt(0),
      "top": NumberInt(0)
    }
  ],
  "text_option": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0)
});
db.getCollection("tb_product").insert({
  "_id": ObjectId("50c147209c7684cc730000a6"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10006),
  "date_created": ISODate("2012-12-26T10:20:34.0Z"),
  "default_price": 0,
  "image_desc": "Image for current product",
  "image_file": "SCF11_252_Ski_45x28_Salomon_02.jpg",
  "image_option": NumberInt(0),
  "location_id": NumberInt(1000006),
  "long_description": "Ski Merchandising POP - 45x28 - CORE",
  "map_content": [
    
  ],
  "material": [
    
  ],
  "num_images": NumberInt(1),
  "package_content": [
    
  ],
  "package_quantity": NumberInt(1),
  "package_type": NumberInt(0),
  "product_detail": "",
  "product_id": NumberInt(25),
  "product_sku": "FGL-SKIPOP-011",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/FGL\/products\/25\/",
  "short_description": "Ski Merchandising POP - 45x28 - CORE",
  "size": [
    {
      "width": "45",
      "height": "28",
      "unit": "in"
    }
  ],
  "size_option": NumberInt(0),
  "size_unit": "in",
  "sold_by": "",
  "tag": [
    
  ],
  "taxonomy": [
    "2"
  ],
  "text": [
    {
      "text": "",
      "color": "#000000",
      "font-name": "Verdana",
      "font-size": "14pt",
      "font-bold": NumberInt(1),
      "font-italic": NumberInt(0),
      "left": NumberInt(0),
      "top": NumberInt(0)
    }
  ],
  "text_option": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0)
});
db.getCollection("tb_product").insert({
  "_id": ObjectId("50c147b09c7684d50e00000f"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10006),
  "date_created": ISODate("2012-12-26T10:20:34.0Z"),
  "default_price": 0,
  "image_desc": "Image for current product",
  "image_file": "SCF11_252_Snowboard_45x28_Burton_02.jpg",
  "image_option": NumberInt(0),
  "location_id": NumberInt(1000006),
  "long_description": "Snowboard Merchandising POP 45x28 CORE",
  "map_content": [
    
  ],
  "material": [
    
  ],
  "num_images": NumberInt(1),
  "package_content": [
    
  ],
  "package_quantity": NumberInt(1),
  "package_type": NumberInt(0),
  "product_detail": "",
  "product_id": NumberInt(27),
  "product_sku": "FGL-SNOWBPOP-002",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/FGL\/products\/27\/",
  "short_description": "Snowboard Merchandising POP 45x28 CORE",
  "size": [
    
  ],
  "size_option": NumberInt(0),
  "size_unit": "in",
  "sold_by": "",
  "tag": [
    
  ],
  "taxonomy": [
    "2"
  ],
  "text": [
    {
      "text": "",
      "color": "#000000",
      "font-name": "Verdana",
      "font-size": "14pt",
      "font-bold": NumberInt(1),
      "font-italic": NumberInt(0),
      "left": NumberInt(0),
      "top": NumberInt(0)
    }
  ],
  "text_option": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0)
});
db.getCollection("tb_product").insert({
  "_id": ObjectId("50c147f49c76843e0e000092"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10006),
  "date_created": ISODate("2012-12-26T10:20:34.0Z"),
  "default_price": 0,
  "image_desc": "Image for current product",
  "image_file": "SCF11_252_Snowboard_45x28_Firefly_02.jpg",
  "image_option": NumberInt(0),
  "location_id": NumberInt(1000006),
  "long_description": "Snowboard Merchandising POP 45x28 CORE",
  "map_content": [
    
  ],
  "material": [
    
  ],
  "num_images": NumberInt(1),
  "package_content": [
    
  ],
  "package_quantity": NumberInt(1),
  "package_type": NumberInt(0),
  "product_detail": "",
  "product_id": NumberInt(29),
  "product_sku": "FGL-SNOWBPOP-004",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/FGL\/products\/29\/",
  "short_description": "Snowboard Merchandising POP 45x28 CORE",
  "size": [
    {
      "width": "45",
      "height": "28",
      "unit": "in"
    }
  ],
  "size_option": NumberInt(0),
  "size_unit": "in",
  "sold_by": "",
  "tag": [
    
  ],
  "taxonomy": [
    
  ],
  "text": [
    {
      "text": "",
      "color": "#000000",
      "font-name": "Verdana",
      "font-size": "14pt",
      "font-bold": NumberInt(1),
      "font-italic": NumberInt(0),
      "left": NumberInt(0),
      "top": NumberInt(0)
    }
  ],
  "text_option": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0)
});
db.getCollection("tb_product").insert({
  "_id": ObjectId("50c148199c7684d20e000033"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10006),
  "date_created": ISODate("2012-12-26T10:20:34.0Z"),
  "default_price": 0,
  "image_desc": "Image for current product",
  "image_file": "SCF11_252_Snowboard_45x28_Forum_01.jpg",
  "image_option": NumberInt(0),
  "location_id": NumberInt(1000006),
  "long_description": "Snowboard Merchandising POP 45x28 CORE",
  "map_content": [
    
  ],
  "material": [
    
  ],
  "num_images": NumberInt(1),
  "package_content": [
    
  ],
  "package_quantity": NumberInt(1),
  "package_type": NumberInt(0),
  "product_detail": "",
  "product_id": NumberInt(30),
  "product_sku": "FGL-SNOWBPOP-004",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/FGL\/products\/30\/",
  "short_description": "Snowboard Merchandising POP 45x28 CORE",
  "size": [
    {
      "width": "45",
      "height": "28",
      "unit": "in"
    }
  ],
  "size_option": NumberInt(0),
  "size_unit": "in",
  "sold_by": "",
  "tag": [
    
  ],
  "taxonomy": [
    
  ],
  "text": [
    {
      "text": "",
      "color": "#000000",
      "font-name": "Verdana",
      "font-size": "14pt",
      "font-bold": NumberInt(1),
      "font-italic": NumberInt(0),
      "left": NumberInt(0),
      "top": NumberInt(0)
    }
  ],
  "text_option": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0)
});
db.getCollection("tb_product").insert({
  "_id": ObjectId("50c148489c768477720001b1"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10006),
  "date_created": ISODate("2012-12-26T10:20:34.0Z"),
  "default_price": 0,
  "image_desc": "Image for current product",
  "image_file": "SCF11_252_Snowboard_45x28_Forum_02.jpg",
  "image_option": NumberInt(0),
  "location_id": NumberInt(1000006),
  "long_description": "Snowboard Merchandising POP 45x28 CORE",
  "map_content": [
    
  ],
  "material": [
    
  ],
  "num_images": NumberInt(1),
  "package_content": [
    
  ],
  "package_quantity": NumberInt(1),
  "package_type": NumberInt(0),
  "product_detail": "",
  "product_id": NumberInt(31),
  "product_sku": "FGL-SNOWBPOP-005",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/FGL\/products\/31\/",
  "short_description": "Snowboard Merchandising POP 45x28 CORE",
  "size": [
    {
      "width": "45",
      "height": "28",
      "unit": "in"
    }
  ],
  "size_option": NumberInt(0),
  "size_unit": "in",
  "sold_by": "",
  "tag": [
    
  ],
  "taxonomy": [
    
  ],
  "text": [
    {
      "text": "",
      "color": "#000000",
      "font-name": "Verdana",
      "font-size": "14pt",
      "font-bold": NumberInt(1),
      "font-italic": NumberInt(0),
      "left": NumberInt(0),
      "top": NumberInt(0)
    }
  ],
  "text_option": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0)
});
db.getCollection("tb_product").insert({
  "_id": ObjectId("50c148649c76848a0e000091"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10006),
  "date_created": ISODate("2012-12-26T10:20:34.0Z"),
  "default_price": 0,
  "image_desc": "Image for current product",
  "image_file": "SCF11_252_Snowboard_45x28_K2_01.jpg",
  "image_option": NumberInt(0),
  "location_id": NumberInt(1000006),
  "long_description": "Snowboard Merchandising POP 45x28 CORE",
  "map_content": [
    
  ],
  "material": [
    
  ],
  "num_images": NumberInt(1),
  "package_content": [
    
  ],
  "package_quantity": NumberInt(1),
  "package_type": NumberInt(0),
  "product_detail": "",
  "product_id": NumberInt(32),
  "product_sku": "FGL-SNOWBPOP-006",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/FGL\/products\/32\/",
  "short_description": "Snowboard Merchandising POP 45x28 CORE",
  "size": [
    {
      "width": "45",
      "height": "28",
      "unit": "in"
    }
  ],
  "size_option": NumberInt(0),
  "size_unit": "in",
  "sold_by": "",
  "tag": [
    
  ],
  "taxonomy": [
    
  ],
  "text": [
    {
      "text": "",
      "color": "#000000",
      "font-name": "Verdana",
      "font-size": "14pt",
      "font-bold": NumberInt(1),
      "font-italic": NumberInt(0),
      "left": NumberInt(0),
      "top": NumberInt(0)
    }
  ],
  "text_option": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0)
});
db.getCollection("tb_product").insert({
  "_id": ObjectId("510b641e9c76840607000094"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10004),
  "date_created": ISODate("2013-02-01T06:43:42.0Z"),
  "default_price": 0,
  "file_hd": "",
  "image_choose": NumberInt(0),
  "image_desc": "Image for current product",
  "image_file": "ADAGIO_kk_sight_gauge.png",
  "image_option": NumberInt(0),
  "location_id": NumberInt(0),
  "long_description": "",
  "map_content": [
    
  ],
  "material": [
    
  ],
  "num_images": NumberInt(1),
  "package_content": [
    
  ],
  "package_quantity": NumberInt(1),
  "package_type": NumberInt(0),
  "product_detail": "",
  "product_id": NumberInt(46),
  "product_note": "",
  "product_sku": "VHT-Wrap-Adagio",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/VHT\/products\/46\/",
  "short_description": "Adagio Thermal Wrap with sight gauge",
  "size_option": NumberInt(0),
  "sold_by": NumberInt(1),
  "tag": [
    
  ],
  "text": [
    {
      "text": "",
      "color": "#000000",
      "font-name": "Verdana",
      "font-size": "14pt",
      "font-bold": NumberInt(1),
      "font-italic": NumberInt(0),
      "left": NumberInt(0),
      "top": NumberInt(0)
    }
  ],
  "text_option": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0)
});
db.getCollection("tb_product").insert({
  "_id": ObjectId("510b65829c7684d00a00000f"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10004),
  "date_created": ISODate("2013-02-01T06:49:38.0Z"),
  "default_price": 0,
  "file_hd": "",
  "image_choose": NumberInt(0),
  "image_desc": "Image for current product",
  "image_file": "Bello_Clasic.png",
  "image_option": NumberInt(0),
  "location_id": NumberInt(0),
  "long_description": "",
  "map_content": [
    
  ],
  "material": [
    
  ],
  "num_images": NumberInt(1),
  "package_content": [
    
  ],
  "package_quantity": NumberInt(1),
  "package_type": NumberInt(0),
  "product_detail": "",
  "product_id": NumberInt(47),
  "product_note": "",
  "product_sku": "VHT-Wrap-Bello_Classic",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/VHT\/products\/47\/",
  "short_description": "Bello Thermal Wrap - Classic",
  "size_option": NumberInt(0),
  "sold_by": NumberInt(1),
  "tag": [
    NumberInt(9)
  ],
  "text": [
    {
      "text": "",
      "color": "#000000",
      "font-name": "Verdana",
      "font-size": "14pt",
      "font-bold": NumberInt(1),
      "font-italic": NumberInt(0),
      "left": NumberInt(0),
      "top": NumberInt(0)
    }
  ],
  "text_option": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0)
});
db.getCollection("tb_product").insert({
  "_id": ObjectId("510b67999c7684626b00012e"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10004),
  "date_created": ISODate("2013-02-01T06:58:33.0Z"),
  "default_price": 0,
  "file_hd": "",
  "image_choose": NumberInt(1),
  "image_desc": "Image for current product",
  "image_file": "BM_Wrap.png",
  "image_option": NumberInt(0),
  "location_id": NumberInt(0),
  "long_description": "",
  "map_content": [
    
  ],
  "material": [
    
  ],
  "num_images": NumberInt(4),
  "package_content": [
    
  ],
  "package_quantity": NumberInt(1),
  "package_type": NumberInt(0),
  "product_detail": "",
  "product_id": NumberInt(48),
  "product_note": "",
  "product_sku": "VHT-Wrap-Blue_Mountain",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/VHT\/products\/48\/",
  "short_description": "Blue Mountain Thermal Wrap",
  "size_option": NumberInt(0),
  "sold_by": NumberInt(0),
  "tag": [
    NumberInt(9)
  ],
  "text": [
    {
      "text": "",
      "color": "#000000",
      "font-name": "Verdana",
      "font-size": "14pt",
      "font-bold": NumberInt(1),
      "font-italic": NumberInt(0),
      "left": NumberInt(0),
      "top": NumberInt(0)
    }
  ],
  "text_option": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0)
});
db.getCollection("tb_product").insert({
  "_id": ObjectId("510b6a569c7684e6070000a5"),
  "product_id": NumberInt(49),
  "product_sku": "VHT-Wrap-Fair Trade (small)",
  "short_description": "Fair Trade Thermal Wrap (small)",
  "long_description": "",
  "product_detail": "",
  "size_option": NumberInt(0),
  "image_option": NumberInt(0),
  "image_choose": NumberInt(0),
  "num_images": NumberInt(1),
  "package_quantity": NumberInt(1),
  "allow_single": NumberInt(1),
  "package_type": NumberInt(0),
  "package_content": [
    
  ],
  "image_file": "FTO_Wrap_small.png",
  "image_desc": "Image for current product",
  "saved_dir": "resources\/VHT\/products\/49\/",
  "map_content": [
    
  ],
  "material": [
    
  ],
  "text_option": NumberInt(0),
  "text": [
    {
      "text": "",
      "color": "#000000",
      "font-name": "Verdana",
      "font-size": "14pt",
      "font-bold": NumberInt(1),
      "font-italic": NumberInt(0),
      "left": NumberInt(0),
      "top": NumberInt(0)
    }
  ],
  "sold_by": NumberInt(0),
  "default_price": 0,
  "product_status": NumberInt(3),
  "company_id": NumberInt(10004),
  "location_id": NumberInt(0),
  "tag": [
    
  ],
  "product_note": "",
  "user_name": "admin",
  "user_type": NumberInt(0),
  "file_hd": "",
  "date_created": ISODate("2013-02-01T07:10:14.0Z")
});
db.getCollection("tb_product").insert({
  "_id": ObjectId("510b70de9c7684960c0000a1"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10004),
  "date_created": ISODate("2013-02-01T07:38:06.0Z"),
  "default_price": 295,
  "file_hd": "",
  "image_choose": NumberInt(0),
  "image_desc": "Image for current product",
  "image_file": "Jennie850.png",
  "image_option": NumberInt(1),
  "location_id": NumberInt(0),
  "long_description": "",
  "map_content": [
    
  ],
  "material": [
    
  ],
  "num_images": NumberInt(1),
  "package_content": [
    
  ],
  "package_quantity": NumberInt(1),
  "package_type": NumberInt(0),
  "product_detail": "",
  "product_id": NumberInt(50),
  "product_note": "",
  "product_sku": "VHT-Jenni850",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/VHT\/products\/50\/",
  "short_description": "Bannerstand - Jennie 850",
  "size_option": NumberInt(0),
  "sold_by": NumberInt(1),
  "tag": [
    NumberInt(13)
  ],
  "text": [
    {
      "text": "",
      "color": "#000000",
      "font-name": "Verdana",
      "font-size": "14pt",
      "font-bold": NumberInt(1),
      "font-italic": NumberInt(0),
      "left": NumberInt(0),
      "top": NumberInt(0)
    }
  ],
  "text_option": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0)
});
db.getCollection("tb_product").insert({
  "_id": ObjectId("510b72199c7684aa64000369"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10004),
  "date_created": ISODate("2013-02-01T07:43:21.0Z"),
  "default_price": 0,
  "file_hd": "",
  "image_choose": NumberInt(0),
  "image_desc": "Image for current product",
  "image_file": "B60_floorstand_sign.png",
  "image_option": NumberInt(1),
  "location_id": NumberInt(0),
  "long_description": "",
  "map_content": [
    
  ],
  "material": [
    
  ],
  "num_images": NumberInt(1),
  "package_content": [
    
  ],
  "package_quantity": NumberInt(1),
  "package_type": NumberInt(0),
  "product_detail": "",
  "product_id": NumberInt(51),
  "product_note": "",
  "product_sku": "VHT-Coroplast",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/VHT\/products\/51\/",
  "short_description": "Coroplast Signs - Single-sided",
  "size_option": NumberInt(0),
  "sold_by": NumberInt(0),
  "tag": [
    
  ],
  "text": [
    {
      "text": "",
      "color": "#000000",
      "font-name": "Verdana",
      "font-size": "14pt",
      "font-bold": NumberInt(1),
      "font-italic": NumberInt(0),
      "left": NumberInt(0),
      "top": NumberInt(0)
    }
  ],
  "text_option": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0)
});
db.getCollection("tb_product").insert({
  "_id": ObjectId("50c148d79c7684290f00000f"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10006),
  "date_created": ISODate("2012-12-26T10:20:34.0Z"),
  "default_price": 19.89,
  "image_desc": "Image for current product",
  "image_file": "SCF11_252_Snowboard_45x28_Ride_02.jpg",
  "image_option": NumberInt(0),
  "location_id": NumberInt(0),
  "long_description": "Snowboard Merchandising POP 45x28 CORE",
  "map_content": [
    
  ],
  "material": [
    
  ],
  "num_images": NumberInt(1),
  "package_content": [
    
  ],
  "package_quantity": NumberInt(1),
  "package_type": NumberInt(0),
  "product_detail": "",
  "product_id": NumberInt(35),
  "product_note": "",
  "product_sku": "FGL-SNOWBPOP-009",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/FGL\/products\/35\/",
  "short_description": "Snowboard Merchandising POP 45x28 CORE",
  "size": [
    {
      "width": NumberInt(45),
      "height": NumberInt(28),
      "unit": "in",
      "status": NumberInt(0)
    }
  ],
  "size_option": NumberInt(0),
  "size_unit": "in",
  "sold_by": "",
  "tag": [
    
  ],
  "taxonomy": [
    
  ],
  "text": [
    {
      "text": "",
      "color": "#000000",
      "font-name": "Verdana",
      "font-size": "14pt",
      "font-bold": NumberInt(1),
      "font-italic": NumberInt(0),
      "left": NumberInt(0),
      "top": NumberInt(0)
    }
  ],
  "text_option": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0)
});
db.getCollection("tb_product").insert({
  "_id": ObjectId("50c148fb9c7684f60e000035"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10006),
  "date_created": ISODate("2012-12-26T10:20:34.0Z"),
  "default_price": 19.89,
  "image_desc": "Image for current product",
  "image_file": "SCF11_252_Snowboard_45x28_Sims_01.jpg",
  "image_option": NumberInt(0),
  "location_id": NumberInt(0),
  "long_description": "Snowboard Merchandising POP 45x28 CORE",
  "map_content": [
    
  ],
  "material": [
    
  ],
  "num_images": NumberInt(1),
  "package_content": [
    
  ],
  "package_quantity": NumberInt(1),
  "package_type": NumberInt(0),
  "product_detail": "",
  "product_id": NumberInt(36),
  "product_note": "",
  "product_sku": "FGL-SNOWBPOP-010",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/FGL\/products\/36\/",
  "short_description": "Snowboard Merchandising POP 45x28 CORE",
  "size": [
    {
      "width": NumberInt(45),
      "height": NumberInt(28),
      "unit": "in",
      "status": NumberInt(0)
    }
  ],
  "size_option": NumberInt(0),
  "size_unit": "in",
  "sold_by": "",
  "tag": [
    NumberInt(2)
  ],
  "taxonomy": [
    
  ],
  "text": [
    {
      "text": "",
      "color": "#000000",
      "font-name": "Verdana",
      "font-size": "14pt",
      "font-bold": NumberInt(1),
      "font-italic": NumberInt(0),
      "left": NumberInt(0),
      "top": NumberInt(0)
    }
  ],
  "text_option": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0)
});
db.getCollection("tb_product").insert({
  "_id": ObjectId("50b6e0bc3d5e55740c000035"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10004),
  "date_created": ISODate("2012-12-26T10:20:34.0Z"),
  "default_price": 49,
  "file_hd": "",
  "image_choose": NumberInt(0),
  "image_desc": "Image for current product",
  "image_file": "thumbnail_vh01.jpg",
  "image_option": NumberInt(0),
  "location_id": NumberInt(0),
  "long_description": "Van Houtte Standard Menuboard",
  "map_content": [
    
  ],
  "material": [
    {
      "id": NumberInt(2),
      "name": "Sintra",
      "color": "Black",
      "width": 22.5,
      "length": NumberInt(9),
      "thick": 0.3,
      "uthick": "cm",
      "usize": "in",
      "price": NumberInt(49),
      "size": NumberInt(0),
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(2),
      "name": "Sintra",
      "color": "Black",
      "width": 22.5,
      "length": NumberInt(9),
      "thick": 0.6,
      "uthick": "cm",
      "usize": "in",
      "price": NumberInt(55),
      "size": NumberInt(0),
      "status": NumberInt(0)
    }
  ],
  "num_images": NumberInt(1),
  "package_content": [
    
  ],
  "package_quantity": NumberInt(1),
  "package_type": NumberInt(0),
  "product_detail": "Van Houtte Standard Menuboard",
  "product_id": NumberInt(2),
  "product_note": "",
  "product_sku": "BB-01-02",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/VHT\/products\/2\/",
  "short_description": "Van Houtte Standard Menuboard",
  "size": [
    {
      "width": NumberInt(3),
      "height": NumberInt(7),
      "unit": "in",
      "status": NumberInt(0)
    }
  ],
  "size_option": NumberInt(0),
  "size_unit": "in",
  "sold_by": NumberInt(0),
  "tag": [
    NumberInt(4)
  ],
  "taxonomy": [
    "2"
  ],
  "text": [
    {
      "text": "",
      "color": "#000000",
      "font-name": "Verdana",
      "font-size": "14pt",
      "font-bold": NumberInt(1),
      "font-italic": NumberInt(0),
      "left": NumberInt(0),
      "top": NumberInt(0)
    }
  ],
  "text_option": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0)
});
db.getCollection("tb_product").insert({
  "_id": ObjectId("50c04c459c7684106600003b"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10006),
  "date_created": ISODate("2012-12-26T10:20:34.0Z"),
  "default_price": 10,
  "file_hd": "",
  "image_choose": NumberInt(0),
  "image_desc": "Image for current product",
  "image_file": "thumbnail_sc05.jpg",
  "image_option": NumberInt(0),
  "location_id": NumberInt(0),
  "long_description": "Grand_Opening_POP_28x59",
  "map_content": [
    
  ],
  "material": [
    {
      "id": NumberInt(2),
      "name": "Sintra",
      "color": "Blue",
      "width": NumberInt(22),
      "length": NumberInt(28),
      "thick": 0.3,
      "uthick": "cm",
      "usize": "ft",
      "price": NumberInt(15),
      "size": NumberInt(0),
      "status": NumberInt(0)
    }
  ],
  "num_images": NumberInt(1),
  "package_content": [
    
  ],
  "package_quantity": NumberInt(1),
  "package_type": NumberInt(0),
  "product_detail": "Grand_Opening_POP",
  "product_id": NumberInt(5),
  "product_note": "",
  "product_sku": "NC-POP_02",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/FGL\/products\/5\/",
  "short_description": "Grand_Opening_POP_28x59",
  "size": [
    
  ],
  "size_option": NumberInt(0),
  "size_unit": "in",
  "sold_by": NumberInt(0),
  "tag": [
    
  ],
  "taxonomy": [
    
  ],
  "text": [
    {
      "text": "",
      "color": "#000000",
      "font-name": "Verdana",
      "font-size": "14pt",
      "font-bold": NumberInt(1),
      "font-italic": NumberInt(0),
      "left": NumberInt(0),
      "top": NumberInt(0)
    }
  ],
  "text_option": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0)
});
db.getCollection("tb_product").insert({
  "_id": ObjectId("50c04e6b9c76843d68000030"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10006),
  "date_created": ISODate("2012-12-26T10:20:34.0Z"),
  "default_price": 10,
  "image_desc": "Image for current product",
  "image_file": "thumbnail_sc06.jpg",
  "image_option": NumberInt(0),
  "location_id": NumberInt(0),
  "long_description": "Grand_Opening_POP_48x72",
  "map_content": [
    
  ],
  "material": [
    
  ],
  "num_images": NumberInt(1),
  "package_content": [
    
  ],
  "package_quantity": NumberInt(1),
  "package_type": NumberInt(0),
  "product_detail": "Grand_Opening_POP",
  "product_id": NumberLong(6),
  "product_sku": "NC-POP_03",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/FGL\/products\/6\/",
  "short_description": "Grand_Opening_POP_48x72",
  "size": [
    {
      "width": NumberInt(23),
      "height": NumberInt(40),
      "unit": "in",
      "status": NumberInt(0)
    }
  ],
  "size_option": NumberInt(0),
  "size_unit": "in",
  "sold_by": "",
  "tag": [
    
  ],
  "taxonomy": [
    
  ],
  "text": [
    {
      "text": "",
      "color": "#000000",
      "font-name": "Verdana",
      "font-size": "14pt",
      "font-bold": NumberInt(1),
      "font-italic": NumberInt(0),
      "left": NumberInt(0),
      "top": NumberInt(0)
    }
  ],
  "text_option": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0)
});
db.getCollection("tb_product").insert({
  "_id": ObjectId("50c074189c7684206f0000b5"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10004),
  "date_created": ISODate("2012-12-26T10:20:34.0Z"),
  "default_price": 0,
  "image_desc": "Image for current product",
  "image_file": "c05f0b1f7ff634446b9439996201410d.jpg",
  "image_option": NumberInt(0),
  "location_id": NumberInt(1000001),
  "long_description": "Product_Name_Cards_for_the_Bello_Gourmet_Coffee_Thermos_4_Styles_Available",
  "map_content": [
    
  ],
  "material": [
    
  ],
  "num_images": NumberInt(1),
  "package_content": [
    
  ],
  "package_quantity": NumberInt(1),
  "package_type": NumberInt(0),
  "product_detail": "",
  "product_id": NumberInt(12),
  "product_sku": "VHT - 0002",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/VHT\/products\/12\/",
  "short_description": "Bello_Breakfast_Blend",
  "size": [
    
  ],
  "size_option": NumberInt(0),
  "size_unit": "in",
  "sold_by": "",
  "tag": [
    
  ],
  "taxonomy": [
    "1"
  ],
  "text": [
    {
      "text": "",
      "color": "#000000",
      "font-name": "Verdana",
      "font-size": "14pt",
      "font-bold": NumberInt(1),
      "font-italic": NumberInt(0),
      "left": NumberInt(0),
      "top": NumberInt(0)
    }
  ],
  "text_option": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0)
});
db.getCollection("tb_product").insert({
  "_id": ObjectId("50c074519c7684477000000f"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10004),
  "date_created": ISODate("2012-12-26T10:20:34.0Z"),
  "default_price": 0,
  "image_desc": "Image for current product",
  "image_file": "9d962b87344f2a43b81326befce136ba.jpg",
  "image_option": NumberInt(0),
  "location_id": NumberInt(1000001),
  "long_description": "Product_Name_Cards_for_the_Bello_Gourmet_Coffee_Thermos_4_Styles_Available",
  "map_content": [
    
  ],
  "material": [
    
  ],
  "num_images": NumberInt(1),
  "package_content": [
    
  ],
  "package_quantity": NumberInt(1),
  "package_type": NumberInt(0),
  "product_detail": "",
  "product_id": NumberInt(13),
  "product_sku": "VHT - 0003",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/VHT\/products\/13\/",
  "short_description": "Bello_House_Blend",
  "size": [
    
  ],
  "size_option": NumberInt(0),
  "size_unit": "in",
  "sold_by": "",
  "tag": [
    
  ],
  "taxonomy": [
    "1"
  ],
  "text": [
    {
      "text": "",
      "color": "#000000",
      "font-name": "Verdana",
      "font-size": "14pt",
      "font-bold": NumberInt(1),
      "font-italic": NumberInt(0),
      "left": NumberInt(0),
      "top": NumberInt(0)
    }
  ],
  "text_option": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0)
});
db.getCollection("tb_product").insert({
  "_id": ObjectId("50c145399c76843e0e000015"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10006),
  "date_created": ISODate("2012-12-26T10:20:34.0Z"),
  "default_price": 15,
  "image_desc": "Image for current product",
  "image_file": "SCF11_252_Ski_45x28_Atomic_01.jpg",
  "image_option": NumberInt(0),
  "location_id": NumberInt(1000006),
  "long_description": "Ski Merchandising POP - 45x28 - CORE",
  "map_content": [
    
  ],
  "material": [
    
  ],
  "num_images": NumberInt(1),
  "package_content": [
    
  ],
  "package_quantity": NumberInt(1),
  "package_type": NumberInt(0),
  "product_detail": "Product detail ...",
  "product_id": NumberInt(16),
  "product_sku": "FGL-SKIPOP-003",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/FGL\/products\/16\/",
  "short_description": "Ski Merchandising POP - 45x28 - CORE",
  "size": [
    {
      "width": "45",
      "height": "28",
      "unit": "in"
    }
  ],
  "size_option": NumberInt(0),
  "size_unit": "in",
  "sold_by": "",
  "tag": [
    
  ],
  "taxonomy": [
    "2"
  ],
  "text": [
    {
      "text": "",
      "color": "#000000",
      "font-name": "Verdana",
      "font-size": "14pt",
      "font-bold": NumberInt(1),
      "font-italic": NumberInt(0),
      "left": NumberInt(0),
      "top": NumberInt(0)
    }
  ],
  "text_option": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0)
});
db.getCollection("tb_product").insert({
  "_id": ObjectId("50c145c69c7684380e000071"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10006),
  "date_created": ISODate("2012-12-26T10:20:34.0Z"),
  "default_price": 0,
  "image_desc": "Image for current product",
  "image_file": "SCF11_252_Ski_45x28_Atomic_02.jpg",
  "image_option": NumberInt(0),
  "location_id": NumberInt(1000006),
  "long_description": "Ski Merchandising POP - 45x28 - CORE",
  "map_content": [
    
  ],
  "material": [
    
  ],
  "num_images": NumberInt(1),
  "package_content": [
    
  ],
  "package_quantity": NumberInt(1),
  "package_type": NumberInt(0),
  "product_detail": "",
  "product_id": NumberInt(17),
  "product_sku": "FGL-SKIPOP-004",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/FGL\/products\/17\/",
  "short_description": "Ski Merchandising POP - 45x28 - CORE",
  "size": [
    {
      "width": "45",
      "height": "28",
      "unit": "in"
    }
  ],
  "size_option": NumberInt(0),
  "size_unit": "in",
  "sold_by": "",
  "tag": [
    
  ],
  "taxonomy": [
    "2"
  ],
  "text": [
    {
      "text": "",
      "color": "#000000",
      "font-name": "Verdana",
      "font-size": "14pt",
      "font-bold": NumberInt(1),
      "font-italic": NumberInt(0),
      "left": NumberInt(0),
      "top": NumberInt(0)
    }
  ],
  "text_option": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0)
});
db.getCollection("tb_product").insert({
  "_id": ObjectId("50c145f79c76843f0e000041"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10006),
  "date_created": ISODate("2012-12-26T10:20:34.0Z"),
  "default_price": 0,
  "image_desc": "Image for current product",
  "image_file": "SCF11_252_Ski_45x28_Head_01.jpg",
  "image_option": NumberInt(0),
  "location_id": NumberInt(1000006),
  "long_description": "Ski Merchandising POP - 45x28 - CORE",
  "map_content": [
    
  ],
  "material": [
    
  ],
  "num_images": NumberInt(1),
  "package_content": [
    
  ],
  "package_quantity": NumberInt(1),
  "package_type": NumberInt(0),
  "product_detail": "",
  "product_id": NumberInt(18),
  "product_sku": "FGL-SKIPOP-005",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/FGL\/products\/18\/",
  "short_description": "Ski Merchandising POP - 45x28 - CORE",
  "size": [
    {
      "width": "45",
      "height": "28",
      "unit": "in"
    }
  ],
  "size_option": NumberInt(0),
  "size_unit": "in",
  "sold_by": "",
  "tag": [
    
  ],
  "taxonomy": [
    "2"
  ],
  "text": [
    {
      "text": "",
      "color": "#000000",
      "font-name": "Verdana",
      "font-size": "14pt",
      "font-bold": NumberInt(1),
      "font-italic": NumberInt(0),
      "left": NumberInt(0),
      "top": NumberInt(0)
    }
  ],
  "text_option": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0)
});
db.getCollection("tb_product").insert({
  "_id": ObjectId("50c146139c76843e0e00005a"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10006),
  "date_created": ISODate("2012-12-26T10:20:34.0Z"),
  "default_price": 0,
  "image_desc": "Image for current product",
  "image_file": "SCF11_252_Ski_45x28_Head_02.jpg",
  "image_option": NumberInt(0),
  "location_id": NumberInt(1000006),
  "long_description": "Ski Merchandising POP - 45x28 - CORE",
  "map_content": [
    
  ],
  "material": [
    
  ],
  "num_images": NumberInt(1),
  "package_content": [
    
  ],
  "package_quantity": NumberInt(1),
  "package_type": NumberInt(0),
  "product_detail": "",
  "product_id": NumberInt(19),
  "product_sku": "FGL-SKIPOP-001",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/FGL\/products\/19\/",
  "short_description": "Ski Merchandising POP - 45x28 - CORE",
  "size": [
    {
      "width": "45",
      "height": "28",
      "unit": "in"
    }
  ],
  "size_option": NumberInt(0),
  "size_unit": "in",
  "sold_by": "",
  "tag": [
    
  ],
  "taxonomy": [
    "2"
  ],
  "text": [
    {
      "text": "",
      "color": "#000000",
      "font-name": "Verdana",
      "font-size": "14pt",
      "font-bold": NumberInt(1),
      "font-italic": NumberInt(0),
      "left": NumberInt(0),
      "top": NumberInt(0)
    }
  ],
  "text_option": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0)
});
db.getCollection("tb_product").insert({
  "_id": ObjectId("50c146609c76847772000179"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10006),
  "date_created": ISODate("2012-12-26T10:20:34.0Z"),
  "default_price": 0,
  "image_desc": "Image for current product",
  "image_file": "SCF11_252_Ski_45x28_K2_02.jpg",
  "image_option": NumberInt(0),
  "location_id": NumberInt(1000006),
  "long_description": "Ski Merchandising POP - 45x28 - CORE",
  "map_content": [
    
  ],
  "material": [
    
  ],
  "num_images": NumberInt(1),
  "package_content": [
    
  ],
  "package_quantity": NumberInt(1),
  "package_type": NumberInt(0),
  "product_detail": "",
  "product_id": NumberInt(21),
  "product_sku": "FGL-SKIPOP-007",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/FGL\/products\/21\/",
  "short_description": "Ski Merchandising POP - 45x28 - CORE",
  "size": [
    {
      "width": "45",
      "height": "28",
      "unit": "in"
    }
  ],
  "size_option": NumberInt(0),
  "size_unit": "in",
  "sold_by": "",
  "tag": [
    
  ],
  "taxonomy": [
    
  ],
  "text": [
    {
      "text": "",
      "color": "#000000",
      "font-name": "Verdana",
      "font-size": "14pt",
      "font-bold": NumberInt(1),
      "font-italic": NumberInt(0),
      "left": NumberInt(0),
      "top": NumberInt(0)
    }
  ],
  "text_option": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0)
});
db.getCollection("tb_product").insert({
  "_id": ObjectId("50c146889c76843f0e000079"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10006),
  "date_created": ISODate("2012-12-26T10:20:34.0Z"),
  "default_price": 0,
  "image_desc": "Image for current product",
  "image_file": "SCF11_252_Ski_45x28_Nordica_02.jpg",
  "image_option": NumberInt(0),
  "location_id": NumberInt(1000006),
  "long_description": "Ski Merchandising POP - 45x28 - CORE",
  "map_content": [
    
  ],
  "material": [
    
  ],
  "num_images": NumberInt(1),
  "package_content": [
    
  ],
  "package_quantity": NumberInt(1),
  "package_type": NumberInt(0),
  "product_detail": "",
  "product_id": NumberInt(22),
  "product_sku": "FGL-SKIPOP-008",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/FGL\/products\/22\/",
  "short_description": "Ski Merchandising POP - 45x28 - CORE",
  "size": [
    {
      "width": "45",
      "height": "28",
      "unit": "in"
    }
  ],
  "size_option": NumberInt(0),
  "size_unit": "in",
  "sold_by": "",
  "tag": [
    
  ],
  "taxonomy": [
    "2"
  ],
  "text": [
    {
      "text": "",
      "color": "#000000",
      "font-name": "Verdana",
      "font-size": "14pt",
      "font-bold": NumberInt(1),
      "font-italic": NumberInt(0),
      "left": NumberInt(0),
      "top": NumberInt(0)
    }
  ],
  "text_option": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0)
});
db.getCollection("tb_product").insert({
  "_id": ObjectId("50c146d59c768470720000b9"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10006),
  "date_created": ISODate("2012-12-26T10:20:34.0Z"),
  "default_price": 0,
  "image_desc": "Image for current product",
  "image_file": "SCF11_252_Ski_45x28_Rossignol_02.jpg",
  "image_option": NumberInt(0),
  "location_id": NumberInt(1000006),
  "long_description": "Ski Merchandising POP - 45x28 - CORE",
  "map_content": [
    
  ],
  "material": [
    
  ],
  "num_images": NumberInt(1),
  "package_content": [
    
  ],
  "package_quantity": NumberInt(1),
  "package_type": NumberInt(0),
  "product_detail": "",
  "product_id": NumberInt(24),
  "product_sku": "FGL-SKIPOP-010",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/FGL\/products\/24\/",
  "short_description": "Ski Merchandising POP - 45x28 - CORE",
  "size": [
    {
      "width": "45",
      "height": "28",
      "unit": "in"
    }
  ],
  "size_option": NumberInt(0),
  "size_unit": "in",
  "sold_by": "",
  "tag": [
    
  ],
  "taxonomy": [
    "2"
  ],
  "text": [
    {
      "text": "",
      "color": "#000000",
      "font-name": "Verdana",
      "font-size": "14pt",
      "font-bold": NumberInt(1),
      "font-italic": NumberInt(0),
      "left": NumberInt(0),
      "top": NumberInt(0)
    }
  ],
  "text_option": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0)
});
db.getCollection("tb_product").insert({
  "_id": ObjectId("50c1478c9c76848a0e00000f"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10006),
  "date_created": ISODate("2012-12-26T10:20:34.0Z"),
  "default_price": 0,
  "image_desc": "Image for current product",
  "image_file": "SCF11_252_Snowboard_45x28_Burton_01.jpg",
  "image_option": NumberInt(0),
  "location_id": NumberInt(1000006),
  "long_description": "Snowboard Merchandising POP 45x28 CORE",
  "map_content": [
    
  ],
  "material": [
    
  ],
  "num_images": NumberInt(1),
  "package_content": [
    
  ],
  "package_quantity": NumberInt(1),
  "package_type": NumberInt(0),
  "product_detail": "",
  "product_id": NumberInt(26),
  "product_sku": "FGL-SNOWBPOP-001",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/FGL\/products\/26\/",
  "short_description": "Snowboard Merchandising POP 45x28 CORE",
  "size": [
    {
      "width": "45",
      "height": "28",
      "unit": "in"
    }
  ],
  "size_option": NumberInt(0),
  "size_unit": "in",
  "sold_by": "",
  "tag": [
    
  ],
  "taxonomy": [
    "2"
  ],
  "text": [
    {
      "text": "",
      "color": "#000000",
      "font-name": "Verdana",
      "font-size": "14pt",
      "font-bold": NumberInt(1),
      "font-italic": NumberInt(0),
      "left": NumberInt(0),
      "top": NumberInt(0)
    }
  ],
  "text_option": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0)
});
db.getCollection("tb_product").insert({
  "_id": ObjectId("50c147ce9c7684900e00004c"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10006),
  "date_created": ISODate("2012-12-26T10:20:34.0Z"),
  "default_price": 0,
  "image_desc": "Image for current product",
  "image_file": "SCF11_252_Snowboard_45x28_Firefly_01.jpg",
  "image_option": NumberInt(0),
  "location_id": NumberInt(1000006),
  "long_description": "Snowboard Merchandising POP 45x28 CORE",
  "map_content": [
    
  ],
  "material": [
    
  ],
  "num_images": NumberInt(1),
  "package_content": [
    
  ],
  "package_quantity": NumberInt(1),
  "package_type": NumberInt(0),
  "product_detail": "",
  "product_id": NumberInt(28),
  "product_sku": "FGL-SNOWBPOP-003",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/FGL\/products\/28\/",
  "short_description": "Snowboard Merchandising POP 45x28 CORE",
  "size": [
    {
      "width": "45",
      "height": "28",
      "unit": "in"
    }
  ],
  "size_option": NumberInt(0),
  "size_unit": "in",
  "sold_by": "",
  "tag": [
    
  ],
  "taxonomy": [
    "2"
  ],
  "text": [
    {
      "text": "",
      "color": "#000000",
      "font-name": "Verdana",
      "font-size": "14pt",
      "font-bold": NumberInt(1),
      "font-italic": NumberInt(0),
      "left": NumberInt(0),
      "top": NumberInt(0)
    }
  ],
  "text_option": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0)
});
db.getCollection("tb_product").insert({
  "_id": ObjectId("50c148b99c76843f0e0000b1"),
  "allow_single": NumberInt(0),
  "company_id": NumberInt(10006),
  "date_created": ISODate("2012-12-26T10:20:34.0Z"),
  "default_price": 150,
  "image_desc": "Image for current product",
  "image_file": "SCF11_252_Snowboard_45x28_Ride_01.jpg",
  "image_option": NumberInt(0),
  "location_id": NumberInt(0),
  "long_description": "Snowboard Merchandising POP 45x28 CORE",
  "map_content": [
    
  ],
  "material": [
    
  ],
  "num_images": NumberInt(1),
  "package_content": [
    
  ],
  "package_quantity": NumberInt(10),
  "package_type": NumberInt(1),
  "product_detail": "",
  "product_id": NumberInt(34),
  "product_note": "",
  "product_sku": "FGL-SNOWBPOP-008",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/FGL\/products\/34\/",
  "short_description": "Snowboard Merchandising POP 45x28 CORE",
  "size": [
    {
      "width": NumberInt(45),
      "height": NumberInt(28),
      "unit": "in",
      "status": NumberInt(0)
    }
  ],
  "size_option": NumberInt(0),
  "size_unit": "in",
  "sold_by": "",
  "tag": [
    
  ],
  "taxonomy": [
    
  ],
  "text": [
    {
      "text": "",
      "color": "#000000",
      "font-name": "Verdana",
      "font-size": "14pt",
      "font-bold": NumberInt(1),
      "font-italic": NumberInt(0),
      "left": NumberInt(0),
      "top": NumberInt(0)
    }
  ],
  "text_option": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0)
});
db.getCollection("tb_product").insert({
  "_id": ObjectId("50c149109c7684320f00000f"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10006),
  "date_created": ISODate("2012-12-26T10:20:34.0Z"),
  "default_price": 19.89,
  "image_choose": NumberInt(0),
  "image_desc": "Image for current product",
  "image_file": "SCF11_252_Snowboard_45x28_Sims_02.jpg",
  "image_option": NumberInt(0),
  "location_id": NumberInt(10000),
  "long_description": "Snowboard Merchandising POP 45x28 CORE",
  "map_content": [
    
  ],
  "material": [
    
  ],
  "num_images": NumberInt(1),
  "package_content": [
    
  ],
  "package_quantity": NumberInt(1),
  "package_type": NumberInt(0),
  "product_detail": "",
  "product_id": NumberInt(37),
  "product_note": "",
  "product_sku": "FGL-SNOWBPOP-011",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/FGL\/products\/37\/",
  "short_description": "Snowboard Merchandising POP 45x28 CORE",
  "size": [
    {
      "width": NumberInt(22),
      "height": NumberInt(27),
      "unit": "in",
      "status": NumberInt(0)
    }
  ],
  "size_option": NumberInt(0),
  "size_unit": "in",
  "sold_by": "",
  "tag": [
    NumberInt(1)
  ],
  "taxonomy": [
    
  ],
  "text": [
    {
      "text": "",
      "color": "#000000",
      "font-name": "Verdana",
      "font-size": "14pt",
      "font-bold": NumberInt(1),
      "font-italic": NumberInt(0),
      "left": NumberInt(0),
      "top": NumberInt(0)
    }
  ],
  "text_option": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0)
});
db.getCollection("tb_product").insert({
  "_id": ObjectId("50ea9dbc9c76848b1500000b"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10006),
  "date_created": ISODate("2013-01-08T08:50:53.0Z"),
  "default_price": 55,
  "image_desc": "",
  "image_file": "Jellyfish.jpg",
  "image_option": NumberInt(0),
  "location_id": NumberInt(0),
  "long_description": "Package 01 - Test",
  "map_content": [
    
  ],
  "material": [
    
  ],
  "num_images": NumberInt(1),
  "package_content": [
    {
      "package_name": "FGL-SNOWBPOP-011",
      "package_type": NumberInt(0),
      "quantity": NumberInt(1),
      "price": 19.89,
      "refer_id": NumberInt(37),
      "package_image": "SCF11_252_Snowboard_45x28_Sims_02.jpg",
      "saved_dir": "resources\/FGL\/products\/",
      "location_id": NumberInt(10000),
      "status": NumberInt(0)
    },
    {
      "package_name": "FGL-SNOWBPOP-010",
      "package_type": NumberInt(0),
      "quantity": NumberInt(1),
      "price": 19.89,
      "refer_id": NumberInt(36),
      "package_image": "SCF11_252_Snowboard_45x28_Sims_01.jpg",
      "saved_dir": "resources\/FGL\/products\/",
      "location_id": NumberInt(0),
      "status": NumberInt(0)
    },
    {
      "package_name": "FGL-SNOWBPOP-009",
      "package_type": NumberInt(0),
      "quantity": NumberInt(1),
      "price": 19.89,
      "refer_id": NumberInt(35),
      "package_image": "SCF11_252_Snowboard_45x28_Ride_02.jpg",
      "saved_dir": "resources\/FGL\/products\/",
      "location_id": NumberInt(0),
      "status": NumberInt(0)
    }
  ],
  "package_quantity": NumberInt(1),
  "package_type": NumberInt(2),
  "product_detail": "",
  "product_id": NumberInt(39),
  "product_note": "",
  "product_sku": "PK01",
  "product_status": NumberInt(0),
  "saved_dir": "resources\/FGL\/products\/39\/",
  "short_description": "",
  "size": [
    
  ],
  "size_option": NumberInt(0),
  "size_unit": "0",
  "sold_by": "",
  "tag": [
    
  ],
  "taxonomy": [
    
  ],
  "text": [
    
  ],
  "text_option": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0)
});
db.getCollection("tb_product").insert({
  "_id": ObjectId("50ebdead9c76840938000080"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10006),
  "date_created": ISODate("2013-01-08T08:54:05.0Z"),
  "default_price": 40,
  "file_hd": "",
  "image_choose": NumberInt(0),
  "image_desc": "Image for current product",
  "image_file": "SCF11_252_Snowboard_45x28_Ride_01.jpg",
  "image_option": NumberInt(0),
  "location_id": NumberInt(0),
  "long_description": "Snowboard Merchandising POP 45x28 CORE",
  "map_content": [
    
  ],
  "material": [
    
  ],
  "num_images": NumberInt(1),
  "package_content": [
    {
      "package_name": "FGL-SNOWBPOP-008",
      "package_type": NumberInt(0),
      "quantity": NumberInt(10),
      "price": 150,
      "refer_id": NumberInt(34),
      "package_image": "SCF11_252_Snowboard_45x28_Ride_01.jpg",
      "saved_dir": "resources\/FGL\/products\/",
      "location_id": NumberInt(1000006),
      "status": NumberInt(0)
    }
  ],
  "package_quantity": NumberInt(1),
  "package_type": NumberInt(0),
  "product_detail": "",
  "product_id": NumberInt(40),
  "product_note": "",
  "product_sku": "FGL-SNOWBPOP-008",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/FGL\/products\/40\/",
  "short_description": "Snowboard Merchandising POP 45x28 CORE",
  "size": [
    
  ],
  "size_option": NumberInt(0),
  "size_unit": "in",
  "sold_by": NumberInt(0),
  "tag": [
    
  ],
  "taxonomy": [
    
  ],
  "text": [
    {
      "text": "adds",
      "color": "#000000",
      "font-name": "Verdana",
      "font-size": "14pt",
      "font-bold": NumberInt(1),
      "font-italic": NumberInt(0),
      "left": NumberInt(0),
      "top": NumberInt(0)
    }
  ],
  "text_option": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0)
});
db.getCollection("tb_product").insert({
  "_id": ObjectId("50c074d79c7684c57000000f"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10004),
  "date_created": ISODate("2012-12-26T10:20:34.0Z"),
  "default_price": 0,
  "file_hd": "",
  "image_choose": NumberInt(0),
  "image_desc": "Image for current product",
  "image_file": "1d95bcbd0e208ec92bd8e7be44d443f4.jpg",
  "image_option": NumberInt(0),
  "location_id": NumberInt(0),
  "long_description": "",
  "map_content": [
    
  ],
  "material": [
    {
      "id": NumberInt(2),
      "name": "Sintra",
      "color": "White",
      "width": NumberInt(25),
      "length": NumberInt(9),
      "thick": 0.3,
      "uthick": "cm",
      "usize": "cm",
      "price": NumberInt(39),
      "size": NumberInt(0),
      "status": NumberInt(0)
    }
  ],
  "num_images": NumberInt(1),
  "package_content": [
    
  ],
  "package_quantity": NumberInt(1),
  "package_type": NumberInt(0),
  "product_detail": "Standard 5-Line Adagio menuboard.\r\nMaterial option: 020 Styrene or 3mm Sintra\r\nMounting included: doubled-sided tape \r\nPrice kit: not included, must be ordered separately",
  "product_id": NumberInt(15),
  "product_note": "",
  "product_sku": "VHT-Menuboard-AD05",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/VHT\/products\/15\/",
  "short_description": "Adagio standard 5-line menu board",
  "size": [
    {
      "width": 22.5,
      "height": NumberInt(12),
      "unit": "in",
      "status": NumberInt(0)
    }
  ],
  "size_option": NumberInt(0),
  "size_unit": "in",
  "sold_by": NumberInt(1),
  "tag": [
    NumberInt(4)
  ],
  "taxonomy": [
    
  ],
  "text": [
    {
      "text": "",
      "color": "#000000",
      "font-name": "Verdana",
      "font-size": "14pt",
      "font-bold": NumberInt(1),
      "font-italic": NumberInt(0),
      "left": NumberInt(0),
      "top": NumberInt(0)
    }
  ],
  "text_option": NumberInt(1),
  "user_name": "admin",
  "user_type": NumberInt(0)
});
db.getCollection("tb_product").insert({
  "_id": ObjectId("50c072a59c7684266f000030"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10004),
  "date_created": ISODate("2012-12-26T10:20:34.0Z"),
  "default_price": 0,
  "file_hd": "",
  "image_choose": NumberInt(0),
  "image_desc": "Image for current product",
  "image_file": "48c6cc8050734c4008866a687c416474.jpg",
  "image_option": NumberInt(0),
  "location_id": NumberInt(0),
  "long_description": "ADAGIO Sandwich Board - 24x32",
  "map_content": [
    
  ],
  "material": [
    {
      "id": NumberInt(12),
      "name": "Crezone",
      "color": "Black",
      "width": NumberInt(24),
      "length": NumberInt(32),
      "thick": 0.5,
      "uthick": "in",
      "usize": "in",
      "price": NumberInt(195),
      "size": NumberInt(0),
      "status": NumberInt(0)
    }
  ],
  "num_images": NumberInt(1),
  "package_content": [
    
  ],
  "package_quantity": NumberInt(1),
  "package_type": NumberInt(0),
  "product_detail": "ADAGIO Sandwich Board - 24x32",
  "product_id": NumberInt(11),
  "product_note": "",
  "product_sku": "VHT - 0001",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/VHT\/products\/11\/",
  "short_description": "ADAGIO Sandwich Board - 24x32",
  "size": [
    
  ],
  "size_option": NumberInt(0),
  "size_unit": "in",
  "sold_by": NumberInt(1),
  "tag": [
    NumberInt(5)
  ],
  "taxonomy": [
    "1"
  ],
  "text": [
    {
      "text": "",
      "color": "#000000",
      "font-name": "Verdana",
      "font-size": "14pt",
      "font-bold": NumberInt(1),
      "font-italic": NumberInt(0),
      "left": NumberInt(0),
      "top": NumberInt(0)
    }
  ],
  "text_option": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0)
});
db.getCollection("tb_product").insert({
  "_id": ObjectId("51079d139c7684893000011b"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10004),
  "date_created": ISODate("2013-01-29T09:57:39.0Z"),
  "default_price": 0,
  "file_hd": "",
  "image_choose": NumberInt(0),
  "image_desc": "Image for current product",
  "image_file": "VH_logo.jpg",
  "image_option": NumberInt(0),
  "location_id": NumberInt(0),
  "long_description": "Laminated contour-cut Van Houtte logo",
  "map_content": [
    
  ],
  "material": [
    {
      "id": NumberInt(2),
      "name": "Sintra",
      "color": "White",
      "width": NumberInt(24),
      "length": NumberInt(16),
      "thick": 0.3,
      "uthick": "cm",
      "usize": "in",
      "price": NumberInt(32),
      "size": NumberInt(1),
      "status": NumberInt(0)
    }
  ],
  "num_images": NumberInt(1),
  "package_content": [
    
  ],
  "package_quantity": NumberInt(1),
  "package_type": NumberInt(0),
  "product_detail": "Matte laminated\r\nMounting Spacers & Velcro is included.",
  "product_id": NumberInt(41),
  "product_note": "",
  "product_sku": "VHT-Logo-VH",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/VHT\/products\/41\/",
  "short_description": "Van Houtte Logo",
  "size_option": NumberInt(0),
  "sold_by": NumberInt(1),
  "tag": [
    NumberInt(6)
  ],
  "text": [
    {
      "text": "",
      "color": "#000000",
      "font-name": "Verdana",
      "font-size": "14pt",
      "font-bold": NumberInt(1),
      "font-italic": NumberInt(0),
      "left": NumberInt(0),
      "top": NumberInt(0)
    }
  ],
  "text_option": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0)
});
db.getCollection("tb_product").insert({
  "_id": ObjectId("5107ab409c76848c49000056"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10004),
  "date_created": ISODate("2013-01-29T10:58:08.0Z"),
  "default_price": 0,
  "file_hd": "",
  "image_choose": NumberInt(0),
  "image_desc": "Image for current product",
  "image_file": "OE_logo.jpg",
  "image_option": NumberInt(0),
  "location_id": NumberInt(0),
  "long_description": "Laminated Orient Express Logo",
  "map_content": [
    
  ],
  "material": [
    {
      "id": NumberInt(2),
      "name": "Sintra",
      "color": "White",
      "width": NumberInt(22),
      "length": NumberInt(9),
      "thick": 0.3,
      "uthick": "cm",
      "usize": "cm",
      "price": NumberInt(32),
      "size": NumberInt(0),
      "status": NumberInt(0)
    }
  ],
  "num_images": NumberInt(1),
  "package_content": [
    
  ],
  "package_quantity": NumberInt(1),
  "package_type": NumberInt(0),
  "product_detail": "Matte laminated; Mounting (Spacers & Velcro included)",
  "product_id": NumberInt(42),
  "product_note": "",
  "product_sku": "VHT-Logo-OE",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/VHT\/products\/42\/",
  "short_description": "Laminated Orient Express Logo",
  "size_option": NumberInt(0),
  "sold_by": NumberInt(1),
  "tag": [
    NumberInt(6)
  ],
  "text": [
    {
      "text": "",
      "color": "#000000",
      "font-name": "Verdana",
      "font-size": "14pt",
      "font-bold": NumberInt(1),
      "font-italic": NumberInt(0),
      "left": NumberInt(0),
      "top": NumberInt(0)
    }
  ],
  "text_option": NumberInt(1),
  "user_name": "admin",
  "user_type": NumberInt(0)
});
db.getCollection("tb_product").insert({
  "_id": ObjectId("5107ac579c76848c4900006a"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10004),
  "date_created": ISODate("2013-01-29T11:02:47.0Z"),
  "default_price": 0,
  "file_hd": "",
  "image_choose": NumberInt(0),
  "image_desc": "Image for current product",
  "image_file": "BM_logo.jpg",
  "image_option": NumberInt(0),
  "location_id": NumberInt(0),
  "long_description": "Laminated contour-cut Blue Mountain logo",
  "map_content": [
    
  ],
  "material": [
    {
      "id": NumberInt(2),
      "name": "Sintra",
      "color": "White",
      "width": NumberInt(22),
      "length": NumberInt(16),
      "thick": 0.3,
      "uthick": "cm",
      "usize": "cm",
      "price": NumberInt(32),
      "size": NumberInt(1),
      "status": NumberInt(0)
    }
  ],
  "num_images": NumberInt(1),
  "package_content": [
    
  ],
  "package_quantity": NumberInt(1),
  "package_type": NumberInt(0),
  "product_detail": "Matte laminated; Mounting (Spacers & Velcro Included)",
  "product_id": NumberInt(43),
  "product_note": "",
  "product_sku": "VHT-Logo-BM",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/VHT\/products\/43\/",
  "short_description": "Laminated contour-cut Blue Mountain logo",
  "size_option": NumberInt(1),
  "sold_by": NumberInt(1),
  "tag": [
    NumberInt(6)
  ],
  "text": [
    {
      "text": "",
      "color": "#000000",
      "font-name": "Verdana",
      "font-size": "14pt",
      "font-bold": NumberInt(1),
      "font-italic": NumberInt(0),
      "left": NumberInt(0),
      "top": NumberInt(0)
    }
  ],
  "text_option": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0)
});
db.getCollection("tb_product").insert({
  "_id": ObjectId("5107ad689c7684240500000f"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10004),
  "date_created": ISODate("2013-01-29T11:07:20.0Z"),
  "default_price": 0,
  "file_hd": "",
  "image_choose": NumberInt(0),
  "image_desc": "Image for current product",
  "image_file": "FT_logo.jpg",
  "image_option": NumberInt(0),
  "location_id": NumberInt(0),
  "long_description": "Laminated contour-cut Fair Trade logo",
  "map_content": [
    
  ],
  "material": [
    {
      "id": NumberInt(2),
      "name": "Sintra",
      "color": "White",
      "width": NumberInt(12),
      "length": NumberInt(12),
      "thick": 0.3,
      "uthick": "cm",
      "usize": "cm",
      "price": NumberInt(32),
      "size": NumberInt(1),
      "status": NumberInt(0)
    }
  ],
  "num_images": NumberInt(1),
  "package_content": [
    
  ],
  "package_quantity": NumberInt(1),
  "package_type": NumberInt(0),
  "product_detail": "Matte laminated, Mounting (Spacers & Velcro included)",
  "product_id": NumberInt(44),
  "product_note": "",
  "product_sku": "VHT-Logo-FT",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/VHT\/products\/44\/",
  "short_description": "Laminated contour-cut Fair Trade logo",
  "size_option": NumberInt(1),
  "sold_by": NumberInt(1),
  "tag": [
    NumberInt(6)
  ],
  "text": [
    {
      "text": "",
      "color": "#000000",
      "font-name": "Verdana",
      "font-size": "14pt",
      "font-bold": NumberInt(1),
      "font-italic": NumberInt(0),
      "left": NumberInt(0),
      "top": NumberInt(0)
    }
  ],
  "text_option": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0)
});
db.getCollection("tb_product").insert({
  "_id": ObjectId("510b73d29c76840a64000385"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10004),
  "date_created": ISODate("2013-02-01T07:50:42.0Z"),
  "default_price": 0,
  "file_hd": "",
  "image_choose": NumberInt(0),
  "image_desc": "Image for current product",
  "image_file": "FTO_Co_op_Pumptopper.png",
  "image_option": NumberInt(0),
  "location_id": NumberInt(0),
  "long_description": "",
  "map_content": [
    
  ],
  "material": [
    {
      "id": NumberInt(5),
      "name": "Styrene",
      "color": "White",
      "width": NumberInt(20),
      "length": NumberInt(10),
      "thick": 0.02,
      "uthick": "in",
      "usize": "in",
      "price": NumberInt(10),
      "size": NumberInt(0),
      "status": NumberInt(0)
    }
  ],
  "num_images": NumberInt(1),
  "package_content": [
    
  ],
  "package_quantity": NumberInt(1),
  "package_type": NumberInt(0),
  "product_detail": "",
  "product_id": NumberInt(52),
  "product_note": "",
  "product_sku": "VHT-Pumptopper-CoOp-FT",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/VHT\/products\/52\/",
  "short_description": "Co-Op Fair Trade Pumptopper",
  "size_option": NumberInt(0),
  "sold_by": NumberInt(0),
  "tag": [
    NumberInt(7)
  ],
  "text": [
    {
      "text": "",
      "color": "#000000",
      "font-name": "Verdana",
      "font-size": "14pt",
      "font-bold": NumberInt(1),
      "font-italic": NumberInt(0),
      "left": NumberInt(0),
      "top": NumberInt(0)
    }
  ],
  "text_option": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0)
});
db.getCollection("tb_product").insert({
  "_id": ObjectId("510b78f69c7684e60700012c"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10004),
  "date_created": ISODate("2013-02-01T08:12:38.0Z"),
  "default_price": 0,
  "file_hd": "",
  "image_choose": NumberInt(0),
  "image_desc": "Image for current product",
  "image_file": "custom_mural.png",
  "image_option": NumberInt(1),
  "location_id": NumberInt(0),
  "long_description": "",
  "map_content": [
    
  ],
  "material": [
    {
      "id": NumberInt(2),
      "name": "Sintra",
      "color": "White",
      "width": NumberInt(60),
      "length": NumberInt(48),
      "thick": 0.3,
      "uthick": "cm",
      "usize": "in",
      "price": 12.5,
      "size": NumberInt(1),
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(5),
      "name": "Styrene",
      "color": "White",
      "width": NumberInt(60),
      "length": NumberInt(48),
      "thick": 0.02,
      "uthick": "in",
      "usize": "in",
      "price": 11.5,
      "size": NumberInt(1),
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(5),
      "name": "Styrene",
      "color": "White",
      "width": NumberInt(60),
      "length": NumberInt(48),
      "thick": 0.04,
      "uthick": "in",
      "usize": "in",
      "price": 13.75,
      "size": NumberInt(1),
      "status": NumberInt(0)
    }
  ],
  "num_images": NumberInt(1),
  "package_content": [
    
  ],
  "package_quantity": NumberInt(1),
  "package_type": NumberInt(0),
  "product_detail": "",
  "product_id": NumberInt(54),
  "product_note": "",
  "product_sku": "VHT-CustomMural",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/VHT\/products\/54\/",
  "short_description": "Custom Mural",
  "size_option": NumberInt(0),
  "sold_by": NumberInt(0),
  "tag": [
    NumberInt(14)
  ],
  "text": [
    {
      "text": "",
      "color": "#000000",
      "font-name": "Verdana",
      "font-size": "14pt",
      "font-bold": NumberInt(1),
      "font-italic": NumberInt(0),
      "left": NumberInt(0),
      "top": NumberInt(0)
    }
  ],
  "text_option": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0)
});
db.getCollection("tb_product").insert({
  "_id": ObjectId("510b7b759c7684bd0b000101"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10004),
  "date_created": ISODate("2013-02-01T08:23:17.0Z"),
  "default_price": 0,
  "file_hd": "",
  "image_choose": NumberInt(0),
  "image_desc": "Image for current product",
  "image_file": "Adagio_MB_4_Line.png",
  "image_option": NumberInt(0),
  "location_id": NumberInt(0),
  "long_description": "",
  "map_content": [
    
  ],
  "material": [
    {
      "id": NumberInt(2),
      "name": "Sintra",
      "color": "White",
      "width": NumberInt(25),
      "length": NumberInt(9),
      "thick": 0.3,
      "uthick": "cm",
      "usize": "in",
      "price": NumberInt(39),
      "size": NumberInt(0),
      "status": NumberInt(0)
    }
  ],
  "num_images": NumberInt(1),
  "package_content": [
    
  ],
  "package_quantity": NumberInt(1),
  "package_type": NumberInt(0),
  "product_detail": "",
  "product_id": NumberInt(55),
  "product_note": "",
  "product_sku": "VHT-Menuboard-AD04",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/VHT\/products\/55\/",
  "short_description": "Adagio standard 4-line menu board",
  "size_option": NumberInt(0),
  "sold_by": NumberInt(1),
  "tag": [
    NumberInt(4)
  ],
  "text": [
    {
      "text": "",
      "color": "#000000",
      "font-name": "Verdana",
      "font-size": "14pt",
      "font-bold": NumberInt(1),
      "font-italic": NumberInt(0),
      "left": NumberInt(0),
      "top": NumberInt(0)
    }
  ],
  "text_option": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0)
});
db.getCollection("tb_product").insert({
  "_id": ObjectId("510b7f429c7684d00a0000eb"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10004),
  "date_created": ISODate("2013-02-01T08:39:30.0Z"),
  "default_price": 0,
  "file_hd": "",
  "image_choose": NumberInt(0),
  "image_desc": "Image for current product",
  "image_file": "BM_MB_4_line.png",
  "image_option": NumberInt(0),
  "location_id": NumberInt(0),
  "long_description": "",
  "map_content": [
    
  ],
  "material": [
    {
      "id": NumberInt(2),
      "name": "Sintra",
      "color": "White",
      "width": 24.75,
      "length": 9.25,
      "thick": 0.3,
      "uthick": "cm",
      "usize": "in",
      "price": NumberInt(39),
      "size": NumberInt(0),
      "status": NumberInt(0)
    }
  ],
  "num_images": NumberInt(1),
  "package_content": [
    
  ],
  "package_quantity": NumberInt(1),
  "package_type": NumberInt(0),
  "product_detail": "",
  "product_id": NumberInt(56),
  "product_note": "",
  "product_sku": "VHT-Menuboard-BM04",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/VHT\/products\/56\/",
  "short_description": "BM standard 4-line menu board",
  "size_option": NumberInt(0),
  "sold_by": NumberInt(1),
  "tag": [
    NumberInt(4)
  ],
  "text": [
    {
      "text": "",
      "color": "#000000",
      "font-name": "Verdana",
      "font-size": "14pt",
      "font-bold": NumberInt(1),
      "font-italic": NumberInt(0),
      "left": NumberInt(0),
      "top": NumberInt(0)
    }
  ],
  "text_option": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0)
});
db.getCollection("tb_product").insert({
  "_id": ObjectId("510b80919c7684e607000197"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10004),
  "date_created": ISODate("2013-02-01T08:45:05.0Z"),
  "default_price": 0,
  "file_hd": "",
  "image_choose": NumberInt(0),
  "image_desc": "Image for current product",
  "image_file": "BM_MB_5_line.png",
  "image_option": NumberInt(0),
  "location_id": NumberInt(0),
  "long_description": "",
  "map_content": [
    
  ],
  "material": [
    {
      "id": NumberInt(2),
      "name": "Sintra",
      "color": "White",
      "width": 24.75,
      "length": 9.25,
      "thick": 0.3,
      "uthick": "cm",
      "usize": "in",
      "price": NumberInt(39),
      "size": NumberInt(0),
      "status": NumberInt(0)
    }
  ],
  "num_images": NumberInt(1),
  "package_content": [
    
  ],
  "package_quantity": NumberInt(1),
  "package_type": NumberInt(0),
  "product_detail": "",
  "product_id": NumberInt(57),
  "product_note": "",
  "product_sku": "VHT-Menuboard-BM05",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/VHT\/products\/57\/",
  "short_description": "BM standard 5-line menu board",
  "size_option": NumberInt(0),
  "sold_by": NumberInt(1),
  "tag": [
    NumberInt(4)
  ],
  "text": [
    {
      "text": "",
      "color": "#000000",
      "font-name": "Verdana",
      "font-size": "14pt",
      "font-bold": NumberInt(1),
      "font-italic": NumberInt(0),
      "left": NumberInt(0),
      "top": NumberInt(0)
    }
  ],
  "text_option": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0)
});
db.getCollection("tb_product").insert({
  "_id": ObjectId("5111c5c19c7684f51a000081"),
  "product_id": NumberInt(58),
  "product_sku": "MCS-VNL-Solid_Blue",
  "short_description": "Laminated Matte Vinyl-Blue 541C",
  "long_description": "",
  "product_detail": "",
  "size_option": NumberInt(0),
  "image_option": NumberInt(0),
  "image_choose": NumberInt(0),
  "num_images": NumberInt(1),
  "package_quantity": NumberInt(1),
  "allow_single": NumberInt(1),
  "package_type": NumberInt(0),
  "package_content": [
    
  ],
  "image_file": "Solid_Blue.png",
  "image_desc": "Image for current product",
  "saved_dir": "resources\/MCS\/products\/58\/",
  "map_content": [
    
  ],
  "material": [
    {
      "id": NumberInt(14),
      "name": "Laminated Matte Vinyl",
      "color": "White",
      "width": NumberInt(118),
      "length": NumberInt(38),
      "thick": 0.005,
      "uthick": "in",
      "usize": "in",
      "price": NumberInt(7),
      "size": NumberInt(1),
      "status": NumberInt(0)
    }
  ],
  "text_option": NumberInt(0),
  "text": [
    {
      "text": "",
      "color": "#000000",
      "font-name": "Verdana",
      "font-size": "14pt",
      "font-bold": NumberInt(1),
      "font-italic": NumberInt(0),
      "left": NumberInt(0),
      "top": NumberInt(0)
    }
  ],
  "sold_by": NumberInt(0),
  "default_price": 0,
  "product_status": NumberInt(3),
  "company_id": NumberInt(10002),
  "location_id": NumberInt(0),
  "tag": [
    
  ],
  "product_note": "",
  "user_name": "admin",
  "user_type": NumberInt(0),
  "file_hd": "",
  "date_created": ISODate("2013-02-06T02:53:53.0Z")
});
db.getCollection("tb_product").insert({
  "_id": ObjectId("5111c6fc9c76844a62000019"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10002),
  "date_created": ISODate("2013-02-06T02:59:08.0Z"),
  "default_price": 0,
  "file_hd": "",
  "image_choose": NumberInt(0),
  "image_desc": "Image for current product",
  "image_file": "Solid_Blue.png",
  "image_option": NumberInt(1),
  "location_id": NumberInt(0),
  "long_description": "",
  "map_content": [
    
  ],
  "material": [
    {
      "id": NumberInt(20),
      "name": "Clear Adhesive Vinyl",
      "color": "Clear",
      "width": NumberInt(40),
      "length": NumberInt(43),
      "thick": 0.005,
      "uthick": "in",
      "usize": "in",
      "price": NumberInt(8),
      "size": NumberInt(1),
      "status": NumberInt(0)
    }
  ],
  "num_images": NumberInt(1),
  "package_content": [
    
  ],
  "package_quantity": NumberInt(1),
  "package_type": NumberInt(0),
  "product_detail": "",
  "product_id": NumberInt(59),
  "product_note": "",
  "product_sku": "MCS-VNL-Clear",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/MCS\/products\/59\/",
  "short_description": "Adhesive Clear Vinyl - Background - Reverse Print",
  "size_option": NumberInt(0),
  "sold_by": NumberInt(0),
  "tag": [
    
  ],
  "text": [
    {
      "text": "",
      "color": "#000000",
      "font-name": "Verdana",
      "font-size": "14pt",
      "font-bold": NumberInt(1),
      "font-italic": NumberInt(0),
      "left": NumberInt(0),
      "top": NumberInt(0)
    }
  ],
  "text_option": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0)
});
db.getCollection("tb_product").insert({
  "_id": ObjectId("5111ce7e9c76844a62000049"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10002),
  "date_created": ISODate("2013-02-06T03:31:10.0Z"),
  "default_price": 0,
  "file_hd": "",
  "image_choose": NumberInt(0),
  "image_desc": "Image for current product",
  "image_file": "Perforation.png",
  "image_option": NumberInt(1),
  "location_id": NumberInt(0),
  "long_description": "",
  "map_content": [
    
  ],
  "material": [
    {
      "id": NumberInt(21),
      "name": "Window Perforated Vinyl",
      "color": "White",
      "width": NumberInt(11),
      "length": NumberInt(66),
      "thick": 0.005,
      "uthick": "in",
      "usize": "in",
      "price": NumberInt(17),
      "size": NumberInt(0),
      "status": NumberInt(0)
    }
  ],
  "num_images": NumberInt(1),
  "package_content": [
    
  ],
  "package_quantity": NumberInt(1),
  "package_type": NumberInt(0),
  "product_detail": "",
  "product_id": NumberInt(60),
  "product_note": "",
  "product_sku": "MCS-VNL-Perforation",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/MCS\/products\/60\/",
  "short_description": "Adhesive Perforation Vinyl - Custom Window Graphic",
  "size_option": NumberInt(0),
  "sold_by": NumberInt(0),
  "tag": [
    
  ],
  "text": [
    {
      "text": "",
      "color": "#000000",
      "font-name": "Verdana",
      "font-size": "14pt",
      "font-bold": NumberInt(1),
      "font-italic": NumberInt(0),
      "left": NumberInt(0),
      "top": NumberInt(0)
    }
  ],
  "text_option": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0)
});
db.getCollection("tb_product").insert({
  "_id": ObjectId("5111d1519c7684486300004a"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10002),
  "date_created": ISODate("2013-02-06T03:43:13.0Z"),
  "default_price": 0,
  "file_hd": "",
  "image_choose": NumberInt(0),
  "image_desc": "Image for current product",
  "image_file": "Illumina.png",
  "image_option": NumberInt(1),
  "location_id": NumberInt(0),
  "long_description": "",
  "map_content": [
    
  ],
  "material": [
    {
      "id": NumberInt(17),
      "name": "Backlit Film",
      "color": "White",
      "width": NumberInt(24),
      "length": NumberInt(36),
      "thick": 0.007,
      "uthick": "in",
      "usize": "in",
      "price": NumberInt(9),
      "size": NumberInt(0),
      "status": NumberInt(0)
    }
  ],
  "num_images": NumberInt(1),
  "package_content": [
    
  ],
  "package_quantity": NumberInt(1),
  "package_type": NumberInt(0),
  "product_detail": "",
  "product_id": NumberInt(61),
  "product_note": "",
  "product_sku": "MCS-BLT-Illumina",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/MCS\/products\/61\/",
  "short_description": "Backlit - Illumina",
  "size_option": NumberInt(0),
  "sold_by": NumberInt(0),
  "tag": [
    
  ],
  "text": [
    {
      "text": "",
      "color": "#000000",
      "font-name": "Verdana",
      "font-size": "14pt",
      "font-bold": NumberInt(1),
      "font-italic": NumberInt(0),
      "left": NumberInt(0),
      "top": NumberInt(0)
    }
  ],
  "text_option": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0)
});
db.getCollection("tb_product").insert({
  "_id": ObjectId("5111d3c29c7684fe6000007b"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10002),
  "date_created": ISODate("2013-02-06T03:53:38.0Z"),
  "default_price": 0,
  "file_hd": "",
  "image_choose": NumberInt(0),
  "image_desc": "Image for current product",
  "image_file": "polar_pop_sign.png",
  "image_option": NumberInt(0),
  "location_id": NumberInt(0),
  "long_description": "",
  "map_content": [
    
  ],
  "material": [
    {
      "id": NumberInt(22),
      "name": "LED Lightbox",
      "color": "White",
      "width": NumberInt(45),
      "length": NumberInt(30),
      "thick": NumberInt(3),
      "uthick": "in",
      "usize": "in",
      "price": NumberInt(1170),
      "size": NumberInt(0),
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(22),
      "name": "LED Lightbox",
      "color": "Blue",
      "width": NumberInt(45),
      "length": NumberInt(30),
      "thick": NumberInt(3),
      "uthick": "in",
      "usize": "in",
      "price": NumberInt(1314),
      "size": NumberInt(0),
      "status": NumberInt(0)
    }
  ],
  "num_images": NumberInt(1),
  "package_content": [
    
  ],
  "package_quantity": NumberInt(1),
  "package_type": NumberInt(0),
  "product_detail": "",
  "product_id": NumberInt(62),
  "product_note": "",
  "product_sku": "MCS-SGN-Polar_Pop_45x30",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/MCS\/products\/62\/",
  "short_description": "Polar Pop LED Lightbox (45x30)",
  "size_option": NumberInt(0),
  "sold_by": NumberInt(1),
  "tag": [
    
  ],
  "text": [
    {
      "text": "",
      "color": "#000000",
      "font-name": "Verdana",
      "font-size": "14pt",
      "font-bold": NumberInt(1),
      "font-italic": NumberInt(0),
      "left": NumberInt(0),
      "top": NumberInt(0)
    }
  ],
  "text_option": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0)
});
db.getCollection("tb_product").insert({
  "_id": ObjectId("5111d4929c7684486300008e"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10002),
  "date_created": ISODate("2013-02-06T03:57:06.0Z"),
  "default_price": 0,
  "file_hd": "",
  "image_choose": NumberInt(0),
  "image_desc": "Image for current product",
  "image_file": "PPop_logo_45_x_30.png",
  "image_option": NumberInt(0),
  "location_id": NumberInt(0),
  "long_description": "",
  "map_content": [
    
  ],
  "material": [
    {
      "id": NumberInt(23),
      "name": "Laminated Gloss Vinyl",
      "color": "White",
      "width": NumberInt(45),
      "length": NumberInt(20),
      "thick": 0.005,
      "uthick": "in",
      "usize": "in",
      "price": NumberInt(7),
      "size": NumberInt(1),
      "status": NumberInt(0)
    }
  ],
  "num_images": NumberInt(1),
  "package_content": [
    
  ],
  "package_quantity": NumberInt(1),
  "package_type": NumberInt(0),
  "product_detail": "",
  "product_id": NumberInt(63),
  "product_note": "",
  "product_sku": "MCS-VNL-Polar Pop Logo",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/MCS\/products\/63\/",
  "short_description": "Polar Pop Logo - Gloss Laminated Vinyl",
  "size_option": NumberInt(0),
  "sold_by": NumberInt(0),
  "tag": [
    
  ],
  "text": [
    {
      "text": "",
      "color": "#000000",
      "font-name": "Verdana",
      "font-size": "14pt",
      "font-bold": NumberInt(1),
      "font-italic": NumberInt(0),
      "left": NumberInt(0),
      "top": NumberInt(0)
    }
  ],
  "text_option": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0)
});
db.getCollection("tb_product").insert({
  "_id": ObjectId("511237879c7684b90200000f"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10002),
  "date_created": ISODate("2013-02-06T10:59:19.0Z"),
  "default_price": 0,
  "file_hd": "",
  "image_choose": NumberInt(0),
  "image_desc": "Image for current product",
  "image_file": "Froster_LED.png",
  "image_option": NumberInt(0),
  "location_id": NumberInt(0),
  "long_description": "",
  "map_content": [
    
  ],
  "material": [
    {
      "id": NumberInt(22),
      "name": "LED Lightbox",
      "color": "White",
      "width": NumberInt(53),
      "length": NumberInt(11),
      "thick": NumberInt(2),
      "uthick": "in",
      "usize": "in",
      "price": NumberInt(1080),
      "size": NumberInt(0),
      "status": NumberInt(0)
    }
  ],
  "num_images": NumberInt(1),
  "package_content": [
    
  ],
  "package_quantity": NumberInt(1),
  "package_type": NumberInt(0),
  "product_detail": "",
  "product_id": NumberInt(64),
  "product_note": "",
  "product_sku": "MCS-SGN-Froster",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/MCS\/products\/64\/",
  "short_description": "Froster LED Lightbox (53x11)",
  "size_option": NumberInt(0),
  "sold_by": NumberInt(1),
  "tag": [
    
  ],
  "text": [
    {
      "text": "",
      "color": "#000000",
      "font-name": "Verdana",
      "font-size": "14pt",
      "font-bold": NumberInt(1),
      "font-italic": NumberInt(0),
      "left": NumberInt(0),
      "top": NumberInt(0)
    }
  ],
  "text_option": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0)
});
