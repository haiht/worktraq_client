
/** fs.chunks indexes **/
db.getCollection("fs.chunks").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** fs.chunks indexes **/
db.getCollection("fs.chunks").ensureIndex({
  "files_id": NumberInt(1),
  "n": NumberInt(1)
},{
  "unique": true
});

/** fs.files indexes **/
db.getCollection("fs.files").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** fs.files indexes **/
db.getCollection("fs.files").ensureIndex({
  "filename": NumberInt(1),
  "uploadDate": NumberInt(1)
},[
  
]);

/** system.users indexes **/
db.getCollection("system.users").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** tb_allocation indexes **/
db.getCollection("tb_allocation").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** tb_allocation indexes **/
db.getCollection("tb_allocation").ensureIndex({
  "order_items_id": NumberInt(1)
},[
  
]);

/** tb_allocation indexes **/
db.getCollection("tb_allocation").ensureIndex({
  "order_id": NumberInt(1)
},[
  
]);

/** tb_allocation indexes **/
db.getCollection("tb_allocation").ensureIndex({
  "location_id": NumberInt(1)
},[
  
]);

/** tb_allocation indexes **/
db.getCollection("tb_allocation").ensureIndex({
  "location_name": NumberInt(1)
},[
  
]);

/** tb_allocation indexes **/
db.getCollection("tb_allocation").ensureIndex({
  "location_address": NumberInt(1)
},[
  
]);

/** tb_allocation indexes **/
db.getCollection("tb_allocation").ensureIndex({
  "allocation_id": NumberInt(1)
},{
  "unique": true
});

/** tb_area indexes **/
db.getCollection("tb_area").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** tb_area indexes **/
db.getCollection("tb_area").ensureIndex({
  "area_id": NumberInt(1)
},{
  "unique": true
});

/** tb_city indexes **/
db.getCollection("tb_city").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** tb_city indexes **/
db.getCollection("tb_city").ensureIndex({
  "city_id": NumberInt(1)
},{
  "unique": true
});

/** tb_color indexes **/
db.getCollection("tb_color").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** tb_color indexes **/
db.getCollection("tb_color").ensureIndex({
  "color_name": NumberInt(1)
},[
  
]);

/** tb_color indexes **/
db.getCollection("tb_color").ensureIndex({
  "color_id": NumberInt(1)
},{
  "unique": true
});

/** tb_company indexes **/
db.getCollection("tb_company").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** tb_company indexes **/
db.getCollection("tb_company").ensureIndex({
  "company_id": NumberInt(1)
},{
  "unique": true
});

/** tb_contact indexes **/
db.getCollection("tb_contact").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** tb_contact indexes **/
db.getCollection("tb_contact").ensureIndex({
  "location_id": NumberInt(1)
},[
  
]);

/** tb_contact indexes **/
db.getCollection("tb_contact").ensureIndex({
  "user_id": NumberInt(1)
},[
  
]);

/** tb_contact indexes **/
db.getCollection("tb_contact").ensureIndex({
  "contact_id": NumberInt(1)
},{
  "unique": true
});

/** tb_country indexes **/
db.getCollection("tb_country").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** tb_country indexes **/
db.getCollection("tb_country").ensureIndex({
  "country_id": NumberInt(1)
},{
  "unique": true
});

/** tb_location indexes **/
db.getCollection("tb_location").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** tb_location indexes **/
db.getCollection("tb_location").ensureIndex({
  "location_id": NumberInt(1)
},{
  "unique": true
});

/** tb_location indexes **/
db.getCollection("tb_location").ensureIndex({
  "company_id": NumberInt(1)
},[
  
]);

/** tb_material indexes **/
db.getCollection("tb_material").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** tb_material indexes **/
db.getCollection("tb_material").ensureIndex({
  "material_name": NumberInt(1)
},[
  
]);

/** tb_material indexes **/
db.getCollection("tb_material").ensureIndex({
  "material_id": NumberInt(1)
},{
  "unique": true
});

/** tb_module indexes **/
db.getCollection("tb_module").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** tb_module indexes **/
db.getCollection("tb_module").ensureIndex({
  "module_pid": NumberInt(1)
},[
  
]);

/** tb_module indexes **/
db.getCollection("tb_module").ensureIndex({
  "module_id": NumberInt(1)
},{
  "unique": true
});

/** tb_order indexes **/
db.getCollection("tb_order").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** tb_order indexes **/
db.getCollection("tb_order").ensureIndex({
  "order_id": NumberInt(1)
},{
  "unique": true
});

/** tb_order_items indexes **/
db.getCollection("tb_order_items").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** tb_order_items indexes **/
db.getCollection("tb_order_items").ensureIndex({
  "order_id": NumberInt(1)
},[
  
]);

/** tb_order_items indexes **/
db.getCollection("tb_order_items").ensureIndex({
  "product_id": NumberInt(1)
},[
  
]);

/** tb_order_items indexes **/
db.getCollection("tb_order_items").ensureIndex({
  "order_item_id": NumberInt(1)
},{
  "unique": true
});

/** tb_order_log indexes **/
db.getCollection("tb_order_log").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** tb_order_log indexes **/
db.getCollection("tb_order_log").ensureIndex({
  "log_id": NumberInt(1)
},{
  "unique": true
});

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

/** tb_product_images indexes **/
db.getCollection("tb_product_images").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** tb_product_images indexes **/
db.getCollection("tb_product_images").ensureIndex({
  "product_images_id": NumberInt(1)
},{
  "unique": true
});

/** tb_province indexes **/
db.getCollection("tb_province").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** tb_province indexes **/
db.getCollection("tb_province").ensureIndex({
  "province_id": NumberInt(1)
},{
  "unique": true
});

/** tb_rule indexes **/
db.getCollection("tb_rule").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** tb_rule indexes **/
db.getCollection("tb_rule").ensureIndex({
  "rule_id": NumberInt(1)
},{
  "unique": true
});

/** tb_settings indexes **/
db.getCollection("tb_settings").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** tb_settings indexes **/
db.getCollection("tb_settings").ensureIndex({
  "setting_id": NumberInt(1)
},{
  "unique": true
});

/** tb_settings indexes **/
db.getCollection("tb_settings").ensureIndex({
  "setting_name": NumberInt(1)
},{
  "unique": true
});

/** tb_shipping indexes **/
db.getCollection("tb_shipping").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** tb_shipping indexes **/
db.getCollection("tb_shipping").ensureIndex({
  "shipping_id": NumberInt(1)
},{
  "unique": true
});

/** tb_support indexes **/
db.getCollection("tb_support").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** tb_support indexes **/
db.getCollection("tb_support").ensureIndex({
  "support_id": NumberInt(1)
},{
  "unique": true
});

/** tb_tag indexes **/
db.getCollection("tb_tag").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** tb_tag indexes **/
db.getCollection("tb_tag").ensureIndex({
  "tag_id": NumberInt(1)
},{
  "unique": true
});

/** tb_taxonomy indexes **/
db.getCollection("tb_taxonomy").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** tb_taxonomy indexes **/
db.getCollection("tb_taxonomy").ensureIndex({
  "taxonomy_id": NumberInt(1)
},{
  "unique": true
});

/** tb_user indexes **/
db.getCollection("tb_user").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** tb_user indexes **/
db.getCollection("tb_user").ensureIndex({
  "user_id": NumberInt(1)
},[
  
]);

/** tb_user_log indexes **/
db.getCollection("tb_user_log").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** tb_user_log indexes **/
db.getCollection("tb_user_log").ensureIndex({
  "user_id": NumberInt(1)
},[
  
]);

/** tb_user_log indexes **/
db.getCollection("tb_user_log").ensureIndex({
  "log_id": NumberInt(1)
},{
  "unique": true
});

/** fs.chunks records **/
db.getCollection("fs.chunks").insert({
  "_id": ObjectId("50c07e6f9c76842a73000008"),
  "files_id": ObjectId("50c07e6f9c76842a73000007"),
  "n": NumberInt(0),
  "data": "<Mongo Binary Data>"
});
db.getCollection("fs.chunks").insert({
  "_id": ObjectId("50bd6a9c9c7684fc0500008f"),
  "files_id": ObjectId("50bd6a9c9c7684fc0500008e"),
  "n": NumberInt(0),
  "data": "<Mongo Binary Data>"
});
db.getCollection("fs.chunks").insert({
  "_id": ObjectId("50bd6ada9c7684eb05000059"),
  "files_id": ObjectId("50bd6ada9c7684eb05000058"),
  "n": NumberInt(0),
  "data": "<Mongo Binary Data>"
});
db.getCollection("fs.chunks").insert({
  "_id": ObjectId("50c002159c7684cb5a000008"),
  "files_id": ObjectId("50c002159c7684cb5a000007"),
  "n": NumberInt(0),
  "data": "<Mongo Binary Data>"
});
db.getCollection("fs.chunks").insert({
  "_id": ObjectId("50c003889c7684ea5a000026"),
  "files_id": ObjectId("50c003889c7684ea5a000025"),
  "n": NumberInt(0),
  "data": "<Mongo Binary Data>"
});
db.getCollection("fs.chunks").insert({
  "_id": ObjectId("50c010729c76843e06000008"),
  "files_id": ObjectId("50c010729c76843e06000007"),
  "n": NumberInt(0),
  "data": "<Mongo Binary Data>"
});
db.getCollection("fs.chunks").insert({
  "_id": ObjectId("50c07ea59c7684f270000065"),
  "files_id": ObjectId("50c07ea59c7684f270000064"),
  "n": NumberInt(0),
  "data": "<Mongo Binary Data>"
});
db.getCollection("fs.chunks").insert({
  "_id": ObjectId("50c07f319c7684777200007b"),
  "files_id": ObjectId("50c07f319c7684777200007a"),
  "n": NumberInt(0),
  "data": "<Mongo Binary Data>"
});
db.getCollection("fs.chunks").insert({
  "_id": ObjectId("50c147b49c76846004000015"),
  "files_id": ObjectId("50c147b49c76846004000012"),
  "n": NumberInt(2),
  "data": "<Mongo Binary Data>"
});
db.getCollection("fs.chunks").insert({
  "_id": ObjectId("50c07f6b9c7684f2700000a0"),
  "files_id": ObjectId("50c07f6b9c7684f27000009f"),
  "n": NumberInt(0),
  "data": "<Mongo Binary Data>"
});
db.getCollection("fs.chunks").insert({
  "_id": ObjectId("50c07f6b9c7684f2700000a1"),
  "files_id": ObjectId("50c07f6b9c7684f27000009f"),
  "n": NumberInt(1),
  "data": "<Mongo Binary Data>"
});
db.getCollection("fs.chunks").insert({
  "_id": ObjectId("50c07f6b9c7684f2700000a2"),
  "files_id": ObjectId("50c07f6b9c7684f27000009f"),
  "n": NumberInt(2),
  "data": "<Mongo Binary Data>"
});
db.getCollection("fs.chunks").insert({
  "_id": ObjectId("50c07f6b9c7684f2700000a3"),
  "files_id": ObjectId("50c07f6b9c7684f27000009f"),
  "n": NumberInt(3),
  "data": "<Mongo Binary Data>"
});
db.getCollection("fs.chunks").insert({
  "_id": ObjectId("50c07f6b9c7684f2700000a4"),
  "files_id": ObjectId("50c07f6b9c7684f27000009f"),
  "n": NumberInt(4),
  "data": "<Mongo Binary Data>"
});
db.getCollection("fs.chunks").insert({
  "_id": ObjectId("50c07f6b9c7684f2700000a5"),
  "files_id": ObjectId("50c07f6b9c7684f27000009f"),
  "n": NumberInt(5),
  "data": "<Mongo Binary Data>"
});
db.getCollection("fs.chunks").insert({
  "_id": ObjectId("50c07f859c7684860700005c"),
  "files_id": ObjectId("50c07f859c7684860700005b"),
  "n": NumberInt(0),
  "data": "<Mongo Binary Data>"
});
db.getCollection("fs.chunks").insert({
  "_id": ObjectId("50c07f859c7684860700005d"),
  "files_id": ObjectId("50c07f859c7684860700005b"),
  "n": NumberInt(1),
  "data": "<Mongo Binary Data>"
});
db.getCollection("fs.chunks").insert({
  "_id": ObjectId("50c07f869c7684860700005e"),
  "files_id": ObjectId("50c07f859c7684860700005b"),
  "n": NumberInt(2),
  "data": "<Mongo Binary Data>"
});
db.getCollection("fs.chunks").insert({
  "_id": ObjectId("50c07f869c7684860700005f"),
  "files_id": ObjectId("50c07f859c7684860700005b"),
  "n": NumberInt(3),
  "data": "<Mongo Binary Data>"
});
db.getCollection("fs.chunks").insert({
  "_id": ObjectId("50c07f869c76848607000060"),
  "files_id": ObjectId("50c07f859c7684860700005b"),
  "n": NumberInt(4),
  "data": "<Mongo Binary Data>"
});
db.getCollection("fs.chunks").insert({
  "_id": ObjectId("50c07f869c76848607000061"),
  "files_id": ObjectId("50c07f859c7684860700005b"),
  "n": NumberInt(5),
  "data": "<Mongo Binary Data>"
});
db.getCollection("fs.chunks").insert({
  "_id": ObjectId("50c07fe49c76848a07000051"),
  "files_id": ObjectId("50c07fe49c76848a07000050"),
  "n": NumberInt(0),
  "data": "<Mongo Binary Data>"
});
db.getCollection("fs.chunks").insert({
  "_id": ObjectId("50c07fe49c76848a07000052"),
  "files_id": ObjectId("50c07fe49c76848a07000050"),
  "n": NumberInt(1),
  "data": "<Mongo Binary Data>"
});
db.getCollection("fs.chunks").insert({
  "_id": ObjectId("50c07fe49c76848a07000053"),
  "files_id": ObjectId("50c07fe49c76848a07000050"),
  "n": NumberInt(2),
  "data": "<Mongo Binary Data>"
});
db.getCollection("fs.chunks").insert({
  "_id": ObjectId("50c07fe49c76848a07000054"),
  "files_id": ObjectId("50c07fe49c76848a07000050"),
  "n": NumberInt(3),
  "data": "<Mongo Binary Data>"
});
db.getCollection("fs.chunks").insert({
  "_id": ObjectId("50c147b09c7684600400000a"),
  "files_id": ObjectId("50c147b09c76846004000007"),
  "n": NumberInt(2),
  "data": "<Mongo Binary Data>"
});
db.getCollection("fs.chunks").insert({
  "_id": ObjectId("50c07fe49c76848a07000055"),
  "files_id": ObjectId("50c07fe49c76848a07000050"),
  "n": NumberInt(4),
  "data": "<Mongo Binary Data>"
});
db.getCollection("fs.chunks").insert({
  "_id": ObjectId("50c07fe49c76848a07000056"),
  "files_id": ObjectId("50c07fe49c76848a07000050"),
  "n": NumberInt(5),
  "data": "<Mongo Binary Data>"
});
db.getCollection("fs.chunks").insert({
  "_id": ObjectId("50c080179c76849607000031"),
  "files_id": ObjectId("50c080179c76849607000030"),
  "n": NumberInt(0),
  "data": "<Mongo Binary Data>"
});
db.getCollection("fs.chunks").insert({
  "_id": ObjectId("50c080179c76849607000032"),
  "files_id": ObjectId("50c080179c76849607000030"),
  "n": NumberInt(1),
  "data": "<Mongo Binary Data>"
});
db.getCollection("fs.chunks").insert({
  "_id": ObjectId("50c080179c76849607000033"),
  "files_id": ObjectId("50c080179c76849607000030"),
  "n": NumberInt(2),
  "data": "<Mongo Binary Data>"
});
db.getCollection("fs.chunks").insert({
  "_id": ObjectId("50c080179c76849607000034"),
  "files_id": ObjectId("50c080179c76849607000030"),
  "n": NumberInt(3),
  "data": "<Mongo Binary Data>"
});
db.getCollection("fs.chunks").insert({
  "_id": ObjectId("50c080179c76849607000035"),
  "files_id": ObjectId("50c080179c76849607000030"),
  "n": NumberInt(4),
  "data": "<Mongo Binary Data>"
});
db.getCollection("fs.chunks").insert({
  "_id": ObjectId("50c080179c76849607000036"),
  "files_id": ObjectId("50c080179c76849607000030"),
  "n": NumberInt(5),
  "data": "<Mongo Binary Data>"
});
db.getCollection("fs.chunks").insert({
  "_id": ObjectId("50c147b09c76846004000008"),
  "files_id": ObjectId("50c147b09c76846004000007"),
  "n": NumberInt(0),
  "data": "<Mongo Binary Data>"
});
db.getCollection("fs.chunks").insert({
  "_id": ObjectId("50c147b09c76846004000009"),
  "files_id": ObjectId("50c147b09c76846004000007"),
  "n": NumberInt(1),
  "data": "<Mongo Binary Data>"
});
db.getCollection("fs.chunks").insert({
  "_id": ObjectId("50c147b49c76846004000013"),
  "files_id": ObjectId("50c147b49c76846004000012"),
  "n": NumberInt(0),
  "data": "<Mongo Binary Data>"
});
db.getCollection("fs.chunks").insert({
  "_id": ObjectId("50c147b49c76846004000014"),
  "files_id": ObjectId("50c147b49c76846004000012"),
  "n": NumberInt(1),
  "data": "<Mongo Binary Data>"
});

/** fs.files records **/
db.getCollection("fs.files").insert({
  "_id": ObjectId("50bd6a9c9c7684fc0500008e"),
  "metadata": {
    "filename": "logopng"
  },
  "filename": "logopng",
  "uploadDate": ISODate("2012-12-04T03:14:36.273Z"),
  "length": NumberInt(16521),
  "chunkSize": NumberInt(262144),
  "md5": "8082d06757a07924b44b99a29a22c45e"
});
db.getCollection("fs.files").insert({
  "_id": ObjectId("50bd6ada9c7684eb05000058"),
  "metadata": {
    "filename": "logo.png"
  },
  "filename": "logo.png",
  "uploadDate": ISODate("2012-12-04T03:15:38.96Z"),
  "length": NumberInt(16521),
  "chunkSize": NumberInt(262144),
  "md5": "8082d06757a07924b44b99a29a22c45e"
});
db.getCollection("fs.files").insert({
  "_id": ObjectId("50c002159c7684cb5a000007"),
  "metadata": {
    "filename": "logo.png"
  },
  "filename": "logo.png",
  "uploadDate": ISODate("2012-12-06T02:25:25.509Z"),
  "length": NumberInt(16521),
  "chunkSize": NumberInt(262144),
  "md5": "8082d06757a07924b44b99a29a22c45e"
});
db.getCollection("fs.files").insert({
  "_id": ObjectId("50c003889c7684ea5a000025"),
  "metadata": {
    "filename": "logo.png"
  },
  "filename": "logo.png",
  "uploadDate": ISODate("2012-12-06T02:31:36.97Z"),
  "length": NumberInt(16521),
  "chunkSize": NumberInt(262144),
  "md5": "8082d06757a07924b44b99a29a22c45e"
});
db.getCollection("fs.files").insert({
  "_id": ObjectId("50c010729c76843e06000007"),
  "metadata": {
    "filename": "logo.jpg"
  },
  "filename": "logo.jpg",
  "uploadDate": ISODate("2012-12-06T03:26:42.199Z"),
  "length": NumberInt(63009),
  "chunkSize": NumberInt(262144),
  "md5": "7f311c9733e82fa529d16da43776413a"
});
db.getCollection("fs.files").insert({
  "_id": ObjectId("50c07e6f9c76842a73000007"),
  "metadata": {
    "filename": "logo.png"
  },
  "filename": "logo.png",
  "uploadDate": ISODate("2012-12-06T11:15:59.116Z"),
  "length": NumberInt(6055),
  "chunkSize": NumberInt(262144),
  "md5": "b456f300459fa8d5bee472392fb6004c"
});
db.getCollection("fs.files").insert({
  "_id": ObjectId("50c07ea59c7684f270000064"),
  "metadata": {
    "filename": "logo.png"
  },
  "filename": "logo.png",
  "uploadDate": ISODate("2012-12-06T11:16:53.173Z"),
  "length": NumberInt(6055),
  "chunkSize": NumberInt(262144),
  "md5": "b456f300459fa8d5bee472392fb6004c"
});
db.getCollection("fs.files").insert({
  "_id": ObjectId("50c07f319c7684777200007a"),
  "metadata": {
    "filename": "logo.png"
  },
  "filename": "logo.png",
  "uploadDate": ISODate("2012-12-06T11:19:13.92Z"),
  "length": NumberInt(6055),
  "chunkSize": NumberInt(262144),
  "md5": "b456f300459fa8d5bee472392fb6004c"
});
db.getCollection("fs.files").insert({
  "_id": ObjectId("50c07f6b9c7684f27000009f"),
  "metadata": {
    "filename": "logo.jpg"
  },
  "filename": "logo.jpg",
  "uploadDate": ISODate("2012-12-06T11:20:11.418Z"),
  "length": NumberInt(1529081),
  "chunkSize": NumberInt(262144),
  "md5": "94a7f394ad6daa7b98b0870ef4084193"
});
db.getCollection("fs.files").insert({
  "_id": ObjectId("50c07f859c7684860700005b"),
  "metadata": {
    "filename": "logo.jpg"
  },
  "filename": "logo.jpg",
  "uploadDate": ISODate("2012-12-06T11:20:37.965Z"),
  "length": NumberInt(1529081),
  "chunkSize": NumberInt(262144),
  "md5": "94a7f394ad6daa7b98b0870ef4084193"
});
db.getCollection("fs.files").insert({
  "_id": ObjectId("50c07fe49c76848a07000050"),
  "metadata": {
    "filename": "logo.jpg"
  },
  "filename": "logo.jpg",
  "uploadDate": ISODate("2012-12-06T11:22:12.622Z"),
  "length": NumberInt(1529081),
  "chunkSize": NumberInt(262144),
  "md5": "94a7f394ad6daa7b98b0870ef4084193"
});
db.getCollection("fs.files").insert({
  "_id": ObjectId("50c080179c76849607000030"),
  "metadata": {
    "filename": "logo.jpg"
  },
  "filename": "logo.jpg",
  "uploadDate": ISODate("2012-12-06T11:23:03.371Z"),
  "length": NumberInt(1529081),
  "chunkSize": NumberInt(262144),
  "md5": "94a7f394ad6daa7b98b0870ef4084193"
});
db.getCollection("fs.files").insert({
  "_id": ObjectId("50c147b09c76846004000007"),
  "metadata": {
    "filename": "logo.jpg"
  },
  "filename": "logo.jpg",
  "uploadDate": ISODate("2012-12-07T01:34:40.787Z"),
  "length": NumberInt(578410),
  "chunkSize": NumberInt(262144),
  "md5": "81824e1d4fb2b30d907da48b2b74beb2"
});
db.getCollection("fs.files").insert({
  "_id": ObjectId("50c147b49c76846004000012"),
  "metadata": {
    "filename": "logo.jpg"
  },
  "filename": "logo.jpg",
  "uploadDate": ISODate("2012-12-07T01:34:44.353Z"),
  "length": NumberInt(578410),
  "chunkSize": NumberInt(262144),
  "md5": "81824e1d4fb2b30d907da48b2b74beb2"
});

/** system.indexes records **/
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "worktraq.system.users",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "worktraq.tb_country",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "worktraq.tb_company",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "company_id": NumberInt(1)
  },
  "unique": true,
  "ns": "worktraq.tb_company",
  "name": "company_id_key",
  "dropDups": NumberInt(1)
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "worktraq.tb_user",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "user_id": NumberInt(1)
  },
  "ns": "worktraq.tb_user",
  "name": "user_id_1"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "worktraq.tb_module",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "module_pid": NumberInt(1)
  },
  "ns": "worktraq.tb_module",
  "name": "module_pid_1"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "module_id": NumberInt(1)
  },
  "unique": true,
  "ns": "worktraq.tb_module",
  "name": "module_id_key",
  "dropDups": NumberInt(1)
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "worktraq.fs.chunks",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "files_id": NumberInt(1),
    "n": NumberInt(1)
  },
  "unique": true,
  "ns": "worktraq.fs.chunks",
  "dropDups": true,
  "name": "files_id_1_n_1"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "worktraq.fs.files",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "worktraq.tb_location",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "location_id": NumberInt(1)
  },
  "unique": true,
  "ns": "worktraq.tb_location",
  "name": "location_id_key",
  "dropDups": NumberInt(1)
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "country_id": NumberInt(1)
  },
  "unique": true,
  "ns": "worktraq.tb_country",
  "name": "country_id_key",
  "dropDups": NumberInt(1)
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "worktraq.tb_contact",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "location_id": NumberInt(1)
  },
  "ns": "worktraq.tb_contact",
  "name": "location_id_1"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "user_id": NumberInt(1)
  },
  "ns": "worktraq.tb_contact",
  "name": "user_id_1"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "contact_id": NumberInt(1)
  },
  "unique": true,
  "ns": "worktraq.tb_contact",
  "name": "contact_id_key",
  "dropDups": NumberInt(1)
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "company_id": NumberInt(1)
  },
  "ns": "worktraq.tb_location",
  "name": "company_id_1"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "worktraq.tb_city",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "city_id": NumberInt(1)
  },
  "unique": true,
  "ns": "worktraq.tb_city",
  "name": "city_id_key",
  "dropDups": NumberInt(1)
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "worktraq.tb_settings",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "setting_id": NumberInt(1)
  },
  "unique": true,
  "ns": "worktraq.tb_settings",
  "name": "setting_id_key",
  "dropDups": NumberInt(1)
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "setting_name": NumberInt(1)
  },
  "unique": true,
  "ns": "worktraq.tb_settings",
  "name": "setting_name_key",
  "dropDups": NumberInt(1)
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "worktraq.tb_province",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "worktraq.tb_material",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "material_name": NumberInt(1)
  },
  "ns": "worktraq.tb_material",
  "name": "material_name_1"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "material_id": NumberInt(1)
  },
  "unique": true,
  "ns": "worktraq.tb_material",
  "name": "material_id_key",
  "dropDups": NumberInt(1)
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "worktraq.tb_product",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "product_sku": NumberInt(1)
  },
  "ns": "worktraq.tb_product",
  "name": "product_sku_1"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "product_id": NumberInt(1)
  },
  "unique": true,
  "ns": "worktraq.tb_product",
  "name": "product_id_key",
  "dropDups": NumberInt(1)
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "worktraq.tb_taxonomy",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "taxonomy_id": NumberInt(1)
  },
  "unique": true,
  "ns": "worktraq.tb_taxonomy",
  "name": "taxonomy_id_key",
  "dropDups": NumberInt(1)
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "worktraq.tb_color",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "color_name": NumberInt(1)
  },
  "ns": "worktraq.tb_color",
  "name": "color_name_1"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "color_id": NumberInt(1)
  },
  "unique": true,
  "ns": "worktraq.tb_color",
  "name": "color_id_key",
  "dropDups": NumberInt(1)
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "filename": NumberInt(1),
    "uploadDate": NumberInt(1)
  },
  "ns": "worktraq.fs.files",
  "name": "filename_1_uploadDate_1"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "worktraq.tb_support",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "support_id": NumberInt(1)
  },
  "unique": true,
  "ns": "worktraq.tb_support",
  "name": "support_id_key",
  "dropDups": NumberInt(1)
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "worktraq.tb_rule",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "rule_id": NumberInt(1)
  },
  "unique": true,
  "ns": "worktraq.tb_rule",
  "name": "rule_id_key",
  "dropDups": NumberInt(1)
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "province_id": NumberInt(1)
  },
  "unique": true,
  "ns": "worktraq.tb_province",
  "name": "province_id_key",
  "dropDups": NumberInt(1)
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "worktraq.tb_tag",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "tag_id": NumberInt(1)
  },
  "unique": true,
  "ns": "worktraq.tb_tag",
  "name": "tag_id_key",
  "dropDups": NumberInt(1)
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "worktraq.tb_user_log",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "user_id": NumberInt(1)
  },
  "ns": "worktraq.tb_user_log",
  "name": "user_id_1"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "log_id": NumberInt(1)
  },
  "unique": true,
  "ns": "worktraq.tb_user_log",
  "name": "log_id_key",
  "dropDups": NumberInt(1)
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "worktraq.tb_product_images",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "product_images_id": NumberInt(1)
  },
  "unique": true,
  "ns": "worktraq.tb_product_images",
  "name": "product_images_id_key",
  "dropDups": NumberInt(1)
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "worktraq.tb_shipping",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "shipping_id": NumberInt(1)
  },
  "unique": true,
  "ns": "worktraq.tb_shipping",
  "name": "shipping_id_key",
  "dropDups": NumberInt(1)
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "worktraq.tb_order_log",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "log_id": NumberInt(1)
  },
  "unique": true,
  "ns": "worktraq.tb_order_log",
  "name": "log_id_key",
  "dropDups": NumberInt(1)
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "worktraq.tb_order",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "order_id": NumberInt(1)
  },
  "unique": true,
  "ns": "worktraq.tb_order",
  "name": "order_id_key",
  "dropDups": NumberInt(1)
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "worktraq.tb_allocation",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "order_items_id": NumberInt(1)
  },
  "ns": "worktraq.tb_allocation",
  "name": "order_items_id_1"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "order_id": NumberInt(1)
  },
  "ns": "worktraq.tb_allocation",
  "name": "order_id_1"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "location_id": NumberInt(1)
  },
  "ns": "worktraq.tb_allocation",
  "name": "location_id_1"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "location_name": NumberInt(1)
  },
  "ns": "worktraq.tb_allocation",
  "name": "location_name_1"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "location_address": NumberInt(1)
  },
  "ns": "worktraq.tb_allocation",
  "name": "location_address_1"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "allocation_id": NumberInt(1)
  },
  "unique": true,
  "ns": "worktraq.tb_allocation",
  "name": "allocation_id_key",
  "dropDups": NumberInt(1)
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "worktraq.tb_area",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "area_id": NumberInt(1)
  },
  "unique": true,
  "ns": "worktraq.tb_area",
  "name": "area_id_key",
  "dropDups": NumberInt(1)
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "worktraq.tb_order_items",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "order_id": NumberInt(1)
  },
  "ns": "worktraq.tb_order_items",
  "name": "order_id_1"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "product_id": NumberInt(1)
  },
  "ns": "worktraq.tb_order_items",
  "name": "product_id_1"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "order_item_id": NumberInt(1)
  },
  "unique": true,
  "ns": "worktraq.tb_order_items",
  "name": "order_item_id_key",
  "dropDups": NumberInt(1)
});

/** system.users records **/
db.getCollection("system.users").insert({
  "_id": ObjectId("50a0af541a65fa10dcae88b3"),
  "user": "haiht",
  "readOnly": false,
  "pwd": "8ced61e90fab278ce9e7f4f7654e19e8"
});
db.getCollection("system.users").insert({
  "_id": ObjectId("50a462de1a65fa0ea8978b95"),
  "user": "longtt",
  "readOnly": false,
  "pwd": "775521f73fc06220d57fc9226ed0a99b"
});

/** tb_allocation records **/

/** tb_area records **/

/** tb_city records **/
db.getCollection("tb_city").insert({
  "_id": ObjectId("50a6196c3d5e55880d000173"),
  "city_id": NumberInt(1),
  "city_name": "Alberta",
  "city_key": "ab",
  "city_status": NumberInt(0),
  "city_order": NumberInt(1),
  "country_id": NumberInt(15)
});
db.getCollection("tb_city").insert({
  "_id": ObjectId("50a619903d5e55880d000183"),
  "city_id": NumberInt(2),
  "city_name": "British Columbia",
  "city_key": "bc",
  "city_status": NumberInt(0),
  "city_order": NumberInt(2),
  "country_id": NumberInt(15)
});
db.getCollection("tb_city").insert({
  "_id": ObjectId("50a619903d5e55880d000184"),
  "city_id": NumberInt(3),
  "city_name": "Manitoba",
  "city_key": "mb",
  "city_status": NumberInt(0),
  "city_order": NumberInt(3),
  "country_id": NumberInt(15)
});
db.getCollection("tb_city").insert({
  "_id": ObjectId("50a619903d5e55880d000185"),
  "city_id": NumberInt(4),
  "city_name": "New Brunswick",
  "city_key": "nb",
  "city_status": NumberInt(0),
  "city_order": NumberInt(4),
  "country_id": NumberInt(15)
});
db.getCollection("tb_city").insert({
  "_id": ObjectId("50a619903d5e55880d000186"),
  "city_id": NumberInt(5),
  "city_name": "Newfoundland-Labrador",
  "city_key": "nl",
  "city_status": NumberInt(0),
  "city_order": NumberInt(5),
  "country_id": NumberInt(15)
});
db.getCollection("tb_city").insert({
  "_id": ObjectId("50a619903d5e55880d000187"),
  "city_id": NumberInt(6),
  "city_name": "Northwest Territories",
  "city_key": "nt",
  "city_status": NumberInt(0),
  "city_order": NumberInt(6),
  "country_id": NumberInt(15)
});
db.getCollection("tb_city").insert({
  "_id": ObjectId("50a619903d5e55880d000188"),
  "city_id": NumberInt(7),
  "city_name": "Nova Scotia",
  "city_key": "ns",
  "city_status": NumberInt(0),
  "city_order": NumberInt(7),
  "country_id": NumberInt(15)
});
db.getCollection("tb_city").insert({
  "_id": ObjectId("50a619903d5e55880d000189"),
  "city_id": NumberInt(8),
  "city_name": "Nunavut",
  "city_key": "nu",
  "city_status": NumberInt(0),
  "city_order": NumberInt(8),
  "country_id": NumberInt(15)
});
db.getCollection("tb_city").insert({
  "_id": ObjectId("50a619903d5e55880d00018a"),
  "city_id": NumberInt(9),
  "city_name": "Ontario",
  "city_key": "on",
  "city_status": NumberInt(0),
  "city_order": NumberInt(9),
  "country_id": NumberInt(15)
});
db.getCollection("tb_city").insert({
  "_id": ObjectId("50a619903d5e55880d00018b"),
  "city_id": NumberInt(10),
  "city_name": "Prince Edward Island",
  "city_key": "pe",
  "city_status": NumberInt(0),
  "city_order": NumberInt(10),
  "country_id": NumberInt(15)
});
db.getCollection("tb_city").insert({
  "_id": ObjectId("50a619903d5e55880d00018c"),
  "city_id": NumberInt(11),
  "city_name": "Quebec",
  "city_key": "qc",
  "city_status": NumberInt(0),
  "city_order": NumberInt(11),
  "country_id": NumberInt(15)
});
db.getCollection("tb_city").insert({
  "_id": ObjectId("50a619903d5e55880d00018d"),
  "city_id": NumberInt(12),
  "city_name": "Saskatchewan",
  "city_key": "sk",
  "city_status": NumberInt(0),
  "city_order": NumberInt(12),
  "country_id": NumberInt(15)
});
db.getCollection("tb_city").insert({
  "_id": ObjectId("50a619903d5e55880d00018e"),
  "city_id": NumberInt(13),
  "city_name": "Yukon",
  "city_key": "yt",
  "city_status": NumberInt(0),
  "city_order": NumberInt(13),
  "country_id": NumberInt(15)
});
db.getCollection("tb_city").insert({
  "_id": ObjectId("50a619903d5e55880d00018f"),
  "city_id": NumberInt(14),
  "city_name": "Wisconsin",
  "city_key": "wi",
  "city_status": NumberInt(0),
  "city_order": NumberInt(14),
  "country_id": NumberInt(15)
});

/** tb_color records **/
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000007"),
  "color_id": NumberInt(6),
  "color_name": "Beige",
  "color_code": "Beige",
  "color_code_hex": "#F5F5DC",
  "color_order": NumberInt(6),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000009"),
  "color_id": NumberInt(8),
  "color_name": "Black",
  "color_code": "Black",
  "color_code_hex": "#000000",
  "color_order": NumberInt(8),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e55501500000b"),
  "color_id": NumberInt(10),
  "color_name": "Blue",
  "color_code": "Blue",
  "color_code_hex": "#0000FF",
  "color_order": NumberInt(10),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e55501500000d"),
  "color_id": NumberInt(12),
  "color_name": "Brown",
  "color_code": "Brown",
  "color_code_hex": "#A52A2A",
  "color_order": NumberInt(12),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000016"),
  "color_id": NumberInt(21),
  "color_name": "Cyan",
  "color_code": "Cyan",
  "color_code_hex": "#00FFFF",
  "color_order": NumberInt(21),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000036"),
  "color_id": NumberInt(53),
  "color_name": "Grey",
  "color_code": "Grey",
  "color_code_hex": "#808080",
  "color_order": NumberInt(53),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000037"),
  "color_id": NumberInt(54),
  "color_name": "Green",
  "color_code": "Green",
  "color_code_hex": "#008000",
  "color_order": NumberInt(54),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000055"),
  "color_id": NumberInt(84),
  "color_name": "Magenta",
  "color_code": "Magenta",
  "color_code_hex": "#FF00FF",
  "color_order": NumberInt(84),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000067"),
  "color_id": NumberInt(102),
  "color_name": "Olive",
  "color_code": "Olive",
  "color_code_hex": "#808000",
  "color_order": NumberInt(102),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000069"),
  "color_id": NumberInt(104),
  "color_name": "Orange",
  "color_code": "Orange",
  "color_code_hex": "#FFA500",
  "color_order": NumberInt(104),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000076"),
  "color_id": NumberInt(117),
  "color_name": "Purple",
  "color_code": "Purple",
  "color_code_hex": "#800080",
  "color_order": NumberInt(117),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000077"),
  "color_id": NumberInt(118),
  "color_name": "Red",
  "color_code": "Red",
  "color_code_hex": "#FF0000",
  "color_order": NumberInt(118),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000080"),
  "color_id": NumberInt(127),
  "color_name": "Silver",
  "color_code": "Silver",
  "color_code_hex": "#C0C0C0",
  "color_order": NumberInt(127),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000088"),
  "color_id": NumberInt(135),
  "color_name": "Tan",
  "color_code": "Tan",
  "color_code_hex": "#D2B48C",
  "color_order": NumberInt(135),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e55501500008d"),
  "color_id": NumberInt(140),
  "color_name": "Violet",
  "color_code": "Violet",
  "color_code_hex": "#EE82EE",
  "color_order": NumberInt(140),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e55501500008f"),
  "color_id": NumberInt(142),
  "color_name": "White",
  "color_code": "White",
  "color_code_hex": "#FFFFFF",
  "color_order": NumberInt(142),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000091"),
  "color_id": NumberInt(144),
  "color_name": "Yellow",
  "color_code": "Yellow",
  "color_code_hex": "#FFFF00",
  "color_order": NumberInt(144),
  "color_status": NumberInt(0)
});

/** tb_company records **/
db.getCollection("tb_company").insert({
  "_id": ObjectId("50a471e19c76846e2f000001"),
  "bussines_type": NumberInt(2),
  "company_code": "MCS",
  "company_id": NumberInt(10002),
  "company_name": "Mac's Convenience Stores",
  "csr_id": "13",
  "email_sales_rep": "bobl@anvydigital.com",
  "industry": "3",
  "logo_file": "logo.jpg",
  "modules": "",
  "relationship": NumberInt(1),
  "sales_rep": "",
  "sales_rep_id": "5",
  "status": NumberInt(0),
  "website": ""
});
db.getCollection("tb_company").insert({
  "_id": ObjectId("50aee8939c76840506000005"),
  "bussines_type": NumberInt(2),
  "company_code": "VHT",
  "company_id": NumberInt(10004),
  "company_name": "Van Houtte Coffee Services",
  "csr_id": "13",
  "email_sales_rep": "bobl@anvydigital.com",
  "industry": "3",
  "logo_file": "logo.png",
  "modules": "require_approval,",
  "relationship": NumberInt(1),
  "sales_rep": "",
  "sales_rep_id": "5",
  "status": NumberInt(0),
  "website": "http:\/\/www.vanhoutte.com"
});
db.getCollection("tb_company").insert({
  "_id": ObjectId("50c00d0e9c7684075a000069"),
  "bussines_type": NumberInt(2),
  "company_code": "FGL",
  "company_id": NumberInt(10006),
  "company_name": "FGL Sports Ltd.",
  "csr_id": "13",
  "email_sales_rep": "bobl@anvydigital.com",
  "industry": "3",
  "logo_file": "logo.png",
  "modules": "",
  "relationship": NumberInt(1),
  "sales_rep": "",
  "sales_rep_id": "5",
  "status": NumberInt(0),
  "website": "http:\/\/www.fglsports.com"
});
db.getCollection("tb_company").insert({
  "_id": ObjectId("50c954199c76843c0600001c"),
  "bussines_type": NumberInt(2),
  "company_code": "ADG",
  "company_id": NumberInt(10000),
  "company_name": "Anvy Digital",
  "csr_id": "0",
  "email_sales_rep": null,
  "industry": "4",
  "logo_file": "",
  "modules": "",
  "relationship": NumberInt(0),
  "sales_rep_id": "0",
  "status": NumberInt(0),
  "website": "http:\/\/www.anvydigital.com"
});
db.getCollection("tb_company").insert({
  "_id": ObjectId("510790f2bd78648c12000178"),
  "bussines_type": NumberInt(2),
  "company_code": "PFC",
  "company_id": NumberInt(10007),
  "company_name": "Parkland Fuel Corporation",
  "csr_id": "13",
  "email_sales_rep": "bobl@anvydigital.com",
  "industry": "3",
  "logo_file": "logo.jpg",
  "modules": "",
  "relationship": NumberInt(1),
  "sales_rep_id": "5",
  "status": NumberInt(0),
  "website": "http:\/\/"
});

/** tb_contact records **/
db.getCollection("tb_contact").insert({
  "_id": ObjectId("50b472ee9c7684c40600000f"),
  "address_city": "Toronto",
  "address_country": NumberInt(1),
  "address_line_1": "147 Laird Drive",
  "address_line_2": "",
  "address_line_3": "",
  "address_postal": "M4G 4K1",
  "address_province": "",
  "address_type": NumberInt(1),
  "address_unit": "Unit # 300, B3",
  "birth_date": ISODate("1970-01-01T00:00:00.0Z"),
  "contact_id": NumberInt(1),
  "contact_type": "1",
  "direct_phone": "604.555.5555",
  "email": "test@anvyinc.com",
  "fax_number": "604.555.5555",
  "first_name": "Tester #2",
  "home_phone": "604.555.5555",
  "last_name": "FGL User",
  "location_id": NumberInt(10002),
  "middle_name": "",
  "mobile_phone": "604.555.5555",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("50c000599c7684ea05000064"),
  "address_city": "Calgary",
  "address_country": NumberInt(1),
  "address_line_1": "2915 - 10th Avenue NE",
  "address_line_2": "",
  "address_line_3": "",
  "address_postal": "T2A 5L4",
  "address_province": "Alberta",
  "address_type": NumberInt(1),
  "address_unit": "Bay 1",
  "birth_date": ISODate("1970-01-01T00:00:00.0Z"),
  "contact_id": NumberInt(3),
  "contact_type": "1",
  "direct_phone": "403.255.2740",
  "email": "long@anvyinc.com",
  "fax_number": "",
  "first_name": "Test (Gene)",
  "home_phone": "",
  "last_name": "Grimm",
  "location_id": NumberInt(10004),
  "middle_name": "",
  "mobile_phone": "",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("50fe4b939c7684c41200000d"),
  "address_city": "Kelowna",
  "address_country": NumberInt(1),
  "address_line_1": "#105 - 2250 Acland Road",
  "address_line_2": "",
  "address_line_3": "",
  "address_postal": "V1 6N6",
  "address_province": "Alberta",
  "address_type": NumberInt(1),
  "address_unit": "",
  "birth_date": ISODate("1970-01-01T00:00:00.0Z"),
  "contact_id": NumberInt(6),
  "contact_type": "1",
  "direct_phone": "403.255.2740",
  "email": "long.tranthanh@yahoo.com.vn",
  "fax_number": "",
  "first_name": "Steve",
  "home_phone": "",
  "last_name": "Marreck",
  "location_id": NumberInt(10016),
  "middle_name": "",
  "mobile_phone": "",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("50fe53069c76845c40000103"),
  "address_city": "Winipeg",
  "address_country": NumberInt(1),
  "address_line_1": "#7 - 350 Keewatin Street",
  "address_line_2": "",
  "address_line_3": "",
  "address_postal": "R2X 2R9",
  "address_province": "Manitoba",
  "address_type": NumberInt(1),
  "address_unit": "",
  "birth_date": ISODate("1970-01-01T00:00:00.0Z"),
  "contact_id": NumberInt(8),
  "contact_type": "1",
  "direct_phone": "403.555.5555",
  "email": "test@anvyinc.com",
  "fax_number": "",
  "first_name": "Darcy",
  "home_phone": "",
  "last_name": "Sands",
  "location_id": NumberInt(10012),
  "middle_name": "",
  "mobile_phone": "",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("50fe58039c7684fa3e000161"),
  "address_city": "Kelowna",
  "address_country": NumberInt(1),
  "address_line_1": "#105 - 2250 Acland Road",
  "address_line_2": "",
  "address_line_3": "",
  "address_postal": "V1 6N6",
  "address_province": "Alberta",
  "address_type": NumberInt(1),
  "address_unit": "",
  "birth_date": ISODate("2013-01-21T17:00:00.0Z"),
  "contact_id": NumberInt(9),
  "contact_type": "1",
  "direct_phone": "403.555.5555",
  "email": "test@anvyinc.com",
  "fax_number": "",
  "first_name": "Steve",
  "home_phone": "",
  "last_name": "Marreck",
  "location_id": NumberInt(10016),
  "middle_name": "",
  "mobile_phone": "",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("50fe584a9c76840a4200002f"),
  "address_city": "Red Deer",
  "address_country": NumberInt(1),
  "address_line_1": "#2 - 7819 50 Avenue",
  "address_line_2": "",
  "address_line_3": "",
  "address_postal": "T4N 1L1",
  "address_province": "Alberta",
  "address_type": NumberInt(1),
  "address_unit": "",
  "birth_date": ISODate("1970-01-01T00:00:00.0Z"),
  "contact_id": NumberInt(10),
  "contact_type": "1",
  "direct_phone": "403.555.5555",
  "email": "test@anvyinc.com",
  "fax_number": "",
  "first_name": "Rob",
  "home_phone": "",
  "last_name": "Doughty",
  "location_id": NumberInt(10015),
  "middle_name": "",
  "mobile_phone": "",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("50fe59259c76845d4000017b"),
  "address_city": "Lethbridge",
  "address_country": NumberInt(1),
  "address_line_1": "#6 574 - 39th St. N",
  "address_line_2": "",
  "address_line_3": "",
  "address_postal": "T1H 6H2",
  "address_province": "Alberta",
  "address_type": NumberInt(1),
  "address_unit": "",
  "birth_date": ISODate("1970-01-01T00:00:00.0Z"),
  "contact_id": NumberInt(11),
  "contact_type": "1",
  "direct_phone": "403.555.5555",
  "email": "test@anvyinc.com",
  "fax_number": "",
  "first_name": "Bill",
  "home_phone": "",
  "last_name": "Broderick",
  "location_id": NumberInt(10014),
  "middle_name": "",
  "mobile_phone": "",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("50fe59959c768406410000e1"),
  "address_city": "Medicine Hat",
  "address_country": NumberInt(1),
  "address_line_1": "602A Clay Avenue",
  "address_line_2": "",
  "address_line_3": "",
  "address_postal": "T1A 3K2",
  "address_province": "Alberta",
  "address_type": NumberInt(1),
  "address_unit": "",
  "birth_date": ISODate("1970-01-01T00:00:00.0Z"),
  "contact_id": NumberInt(12),
  "contact_type": "1",
  "direct_phone": "403.555.5555",
  "email": "test@anvyinc.com",
  "fax_number": "",
  "first_name": "Deon",
  "home_phone": "",
  "last_name": "Denboer",
  "location_id": NumberInt(10013),
  "middle_name": "",
  "mobile_phone": "",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("50f75a579c76840f0500002a"),
  "address_city": "Calgary",
  "address_country": NumberInt(15),
  "address_line_1": "3016 10th Avenue NE",
  "address_line_2": "",
  "address_line_3": "",
  "address_postal": "T3A 6A3",
  "address_province": "Alberta",
  "address_type": NumberInt(3),
  "address_unit": "Unit 103",
  "birth_date": ISODate("1970-01-01T00:00:00.0Z"),
  "contact_id": NumberInt(5),
  "contact_type": "2",
  "direct_phone": "403.291.2244",
  "email": "bobl@anvydigital.com",
  "fax_number": "",
  "first_name": "Bob",
  "home_phone": "",
  "last_name": "Lush",
  "location_id": NumberInt(10000),
  "middle_name": "",
  "mobile_phone": "",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("50c0154f9c7684fa050000be"),
  "address_city": "Toronto",
  "address_country": NumberInt(1),
  "address_line_1": "05 Milner Avenue, Suite 400",
  "address_line_2": "",
  "address_line_3": "",
  "address_postal": "T2G5A7",
  "address_province": "Wisconsin",
  "address_type": NumberInt(1),
  "address_unit": "3",
  "birth_date": ISODate("2012-12-05T17:00:00.0Z"),
  "contact_id": NumberInt(4),
  "contact_type": "1",
  "direct_phone": "403.717.1400",
  "email": "long@anvyinc.net",
  "fax_number": "403.717.1400",
  "first_name": "FGL Sports",
  "home_phone": "",
  "last_name": "Test FGL",
  "location_id": NumberInt(10003),
  "middle_name": "",
  "mobile_phone": "",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("50fe51b09c7684bc3f000081"),
  "address_city": "Calgary",
  "address_country": NumberInt(1),
  "address_line_1": "2915 - 10th Avenue NE",
  "address_line_2": "",
  "address_line_3": "",
  "address_postal": "T2A 5L4",
  "address_province": "Alberta",
  "address_type": NumberInt(1),
  "address_unit": "Bay 1",
  "birth_date": ISODate("1970-01-01T00:00:00.0Z"),
  "contact_id": NumberInt(7),
  "contact_type": "1",
  "direct_phone": "604.555.5555",
  "email": "test@anvyinc.com",
  "fax_number": "",
  "first_name": "Rick",
  "home_phone": "",
  "last_name": "Riggs",
  "location_id": NumberInt(10011),
  "middle_name": "",
  "mobile_phone": "",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("51062b4cbd7864f4070000c0"),
  "address_city": "Calgary",
  "address_country": NumberInt(1),
  "address_line_1": "3016 10th Avenue NE",
  "address_line_2": "",
  "address_line_3": "",
  "address_postal": "T3A 6A3",
  "address_province": "Alberta",
  "address_type": NumberInt(1),
  "address_unit": "Unit 103",
  "birth_date": ISODate("1970-01-01T00:00:00.0Z"),
  "contact_id": NumberInt(13),
  "contact_type": "3",
  "direct_phone": "403.291.2244",
  "email": "alyssa@anvydigital.com",
  "fax_number": "",
  "first_name": "Alyssa",
  "home_phone": "",
  "last_name": "Hoyrup",
  "location_id": NumberInt(10000),
  "middle_name": "",
  "mobile_phone": "",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("5109ea209c7684703800012d"),
  "address_city": "Victoria",
  "address_country": NumberInt(1),
  "address_line_1": "511 David Street",
  "address_line_2": "",
  "address_line_3": "",
  "address_postal": "V8C 2C7",
  "address_province": "Alberta",
  "address_type": NumberInt(1),
  "address_unit": "Unit F",
  "birth_date": ISODate("1970-01-01T00:00:00.0Z"),
  "contact_id": NumberInt(14),
  "contact_type": "1",
  "direct_phone": "604.555.555",
  "email": "test@anvyinc.com",
  "fax_number": "",
  "first_name": "Bryan",
  "home_phone": "",
  "last_name": "Baxter",
  "location_id": NumberInt(10019),
  "middle_name": "",
  "mobile_phone": "",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510a26fa9c7684103a00021d"),
  "contact_id": NumberInt(15),
  "location_id": NumberInt(10000),
  "contact_type": "1",
  "first_name": "Nguyen",
  "last_name": "Nguyen",
  "middle_name": "",
  "birth_date": ISODate("1970-01-01T00:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "Unit 103",
  "address_line_1": "3016 10th Avenue NE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Calgary",
  "address_province": "Alberta",
  "address_postal": "T3A 6A3",
  "address_country": NumberInt(1),
  "direct_phone": "403.291.2244",
  "mobile_phone": "",
  "fax_number": "",
  "home_phone": "",
  "email": "nguyen@anvydigital.com",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510a383dbd786478020002e6"),
  "address_city": "Cranbrook",
  "address_country": NumberInt(1),
  "address_line_1": "822 - Kootnay St. N",
  "address_line_2": "",
  "address_line_3": "",
  "address_postal": "V1C 3V3",
  "address_province": "Alberta",
  "address_type": NumberInt(1),
  "address_unit": "",
  "birth_date": ISODate("1970-01-01T00:00:00.0Z"),
  "contact_id": NumberInt(16),
  "contact_type": "1",
  "direct_phone": "+84 909992722",
  "email": "info@anvyinc.com",
  "fax_number": "",
  "first_name": "Wayne",
  "home_phone": "",
  "last_name": "Lacey",
  "location_id": NumberInt(10017),
  "middle_name": "",
  "mobile_phone": "",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510a3f9a9c7684165d0001f0"),
  "address_city": "Calgary",
  "address_country": NumberInt(1),
  "address_line_1": "2915 - 10th Avenue NE",
  "address_line_2": "",
  "address_line_3": "",
  "address_postal": "T2A 5L4",
  "address_province": "Alberta",
  "address_type": NumberInt(1),
  "address_unit": "Bay 1",
  "birth_date": ISODate("1970-01-01T00:00:00.0Z"),
  "contact_id": NumberInt(17),
  "contact_type": "1",
  "direct_phone": "403.225.2704",
  "email": "ggrimm@vanhoutte.com",
  "fax_number": "",
  "first_name": "Gene",
  "home_phone": "",
  "last_name": "Grimm",
  "location_id": NumberInt(10004),
  "middle_name": "",
  "mobile_phone": "",
  "user_id": NumberInt(0)
});

/** tb_country records **/
db.getCollection("tb_country").insert({
  "_id": ObjectId("50a30ad93d5e550402000001"),
  "country_id": NumberInt(1),
  "country_name": "United Arab Emirates",
  "country_key": "AE",
  "country_order": NumberInt(0),
  "country_status": NumberInt(0)
});
db.getCollection("tb_country").insert({
  "_id": ObjectId("50a30ad93d5e550402000002"),
  "country_id": NumberInt(2),
  "country_name": "Anbania",
  "country_key": "AL",
  "country_order": NumberInt(0),
  "country_status": NumberInt(0)
});
db.getCollection("tb_country").insert({
  "_id": ObjectId("50a30ad93d5e550402000004"),
  "country_id": NumberInt(4),
  "country_name": "Argentina",
  "country_key": "AR",
  "country_order": NumberInt(0),
  "country_status": NumberInt(0)
});
db.getCollection("tb_country").insert({
  "_id": ObjectId("50a30ad93d5e550402000005"),
  "country_id": NumberInt(5),
  "country_name": "Austria",
  "country_key": "AT",
  "country_order": NumberInt(0),
  "country_status": NumberInt(0)
});
db.getCollection("tb_country").insert({
  "_id": ObjectId("50a30ad93d5e550402000007"),
  "country_id": NumberInt(7),
  "country_name": "Bosnia & Herzegovina",
  "country_key": "BA",
  "country_order": NumberInt(0),
  "country_status": NumberInt(0)
});
db.getCollection("tb_country").insert({
  "_id": ObjectId("50a30ad93d5e550402000008"),
  "country_id": NumberInt(8),
  "country_name": "Belgium",
  "country_key": "BE",
  "country_order": NumberInt(0),
  "country_status": NumberInt(0)
});
db.getCollection("tb_country").insert({
  "_id": ObjectId("50a30ad93d5e55040200000b"),
  "country_id": NumberInt(11),
  "country_name": "Brunei",
  "country_key": "BN",
  "country_order": NumberInt(0),
  "country_status": NumberInt(0)
});
db.getCollection("tb_country").insert({
  "_id": ObjectId("50a30ad93d5e55040200000d"),
  "country_id": NumberInt(13),
  "country_name": "Belarus",
  "country_key": "BY",
  "country_order": NumberInt(0),
  "country_status": NumberInt(0)
});
db.getCollection("tb_country").insert({
  "_id": ObjectId("50a30ad93d5e55040200000f"),
  "country_id": NumberInt(15),
  "country_name": "Canada",
  "country_key": "CA",
  "country_order": NumberInt(0),
  "country_status": NumberInt(0)
});
db.getCollection("tb_country").insert({
  "_id": ObjectId("50a30ad93d5e550402000013"),
  "country_id": NumberInt(19),
  "country_name": "China",
  "country_key": "CN",
  "country_order": NumberInt(0),
  "country_status": NumberInt(0)
});
db.getCollection("tb_country").insert({
  "_id": ObjectId("50a30ad93d5e550402000016"),
  "country_id": NumberInt(22),
  "country_name": "Denmark",
  "country_key": "DK",
  "country_order": NumberInt(0),
  "country_status": NumberInt(0)
});
db.getCollection("tb_country").insert({
  "_id": ObjectId("50a30ad93d5e550402000019"),
  "country_id": NumberInt(25),
  "country_name": "Finland",
  "country_key": "fi",
  "country_order": NumberInt(0),
  "country_status": NumberInt(0)
});
db.getCollection("tb_country").insert({
  "_id": ObjectId("50a30ad93d5e55040200001d"),
  "country_id": NumberInt(29),
  "country_name": "Haiti",
  "country_key": "ht",
  "country_order": NumberInt(0),
  "country_status": NumberInt(0)
});
db.getCollection("tb_country").insert({
  "_id": ObjectId("50a30ad93d5e55040200001f"),
  "country_id": NumberInt(31),
  "country_name": "Indonesia",
  "country_key": "id",
  "country_order": NumberInt(0),
  "country_status": NumberInt(0)
});
db.getCollection("tb_country").insert({
  "_id": ObjectId("50a30ad93d5e550402000020"),
  "country_id": NumberInt(32),
  "country_name": "India",
  "country_key": "in",
  "country_order": NumberInt(0),
  "country_status": NumberInt(0)
});
db.getCollection("tb_country").insert({
  "_id": ObjectId("50a30ad93d5e550402000027"),
  "country_id": NumberInt(39),
  "country_name": "Cambodia",
  "country_key": "kh",
  "country_order": NumberInt(0),
  "country_status": NumberInt(0)
});
db.getCollection("tb_country").insert({
  "_id": ObjectId("50a30ad93d5e550402000028"),
  "country_id": NumberInt(40),
  "country_name": "Korea",
  "country_key": "kr",
  "country_order": NumberInt(0),
  "country_status": NumberInt(0)
});
db.getCollection("tb_country").insert({
  "_id": ObjectId("50a30ad93d5e55040200002a"),
  "country_id": NumberInt(42),
  "country_name": "Lebanon",
  "country_key": "lb",
  "country_order": NumberInt(0),
  "country_status": NumberInt(0)
});
db.getCollection("tb_country").insert({
  "_id": ObjectId("50a30ad93d5e55040200002b"),
  "country_id": NumberInt(43),
  "country_name": "Sri Lanka",
  "country_key": "lk",
  "country_order": NumberInt(0),
  "country_status": NumberInt(0)
});
db.getCollection("tb_country").insert({
  "_id": ObjectId("50a30ad93d5e55040200002c"),
  "country_id": NumberInt(44),
  "country_name": "Luxembourg",
  "country_key": "lu",
  "country_order": NumberInt(0),
  "country_status": NumberInt(0)
});
db.getCollection("tb_country").insert({
  "_id": ObjectId("50a30ad93d5e55040200002d"),
  "country_id": NumberInt(45),
  "country_name": "Montenegro",
  "country_key": "me",
  "country_order": NumberInt(0),
  "country_status": NumberInt(0)
});
db.getCollection("tb_country").insert({
  "_id": ObjectId("50a30ad93d5e55040200002e"),
  "country_id": NumberInt(46),
  "country_name": "Myanma",
  "country_key": "mm",
  "country_order": NumberInt(0),
  "country_status": NumberInt(0)
});
db.getCollection("tb_country").insert({
  "_id": ObjectId("50a30ad93d5e55040200002f"),
  "country_id": NumberInt(47),
  "country_name": "Mauritius",
  "country_key": "mu",
  "country_order": NumberInt(0),
  "country_status": NumberInt(0)
});
db.getCollection("tb_country").insert({
  "_id": ObjectId("50a30ad93d5e550402000030"),
  "country_id": NumberInt(48),
  "country_name": "Mexico",
  "country_key": "mx",
  "country_order": NumberInt(0),
  "country_status": NumberInt(0)
});
db.getCollection("tb_country").insert({
  "_id": ObjectId("50a30ad93d5e550402000031"),
  "country_id": NumberInt(49),
  "country_name": "Malaysia",
  "country_key": "my",
  "country_order": NumberInt(0),
  "country_status": NumberInt(0)
});
db.getCollection("tb_country").insert({
  "_id": ObjectId("50a30ad93d5e550402000032"),
  "country_id": NumberInt(50),
  "country_name": "Netherlands",
  "country_key": "nl",
  "country_order": NumberInt(0),
  "country_status": NumberInt(0)
});
db.getCollection("tb_country").insert({
  "_id": ObjectId("50a30ad93d5e550402000034"),
  "country_id": NumberInt(52),
  "country_name": "New Zealand",
  "country_key": "nz",
  "country_order": NumberInt(0),
  "country_status": NumberInt(0)
});
db.getCollection("tb_country").insert({
  "_id": ObjectId("50a30ad93d5e550402000036"),
  "country_id": NumberInt(54),
  "country_name": "Philippines",
  "country_key": "ph",
  "country_order": NumberInt(0),
  "country_status": NumberInt(0)
});
db.getCollection("tb_country").insert({
  "_id": ObjectId("50a30ad93d5e550402000037"),
  "country_id": NumberInt(55),
  "country_name": "Pakistan",
  "country_key": "pk",
  "country_order": NumberInt(0),
  "country_status": NumberInt(0)
});
db.getCollection("tb_country").insert({
  "_id": ObjectId("50a30ad93d5e550402000038"),
  "country_id": NumberInt(56),
  "country_name": "Poland",
  "country_key": "pl",
  "country_order": NumberInt(0),
  "country_status": NumberInt(0)
});
db.getCollection("tb_country").insert({
  "_id": ObjectId("50a30ad93d5e55040200003b"),
  "country_id": NumberInt(59),
  "country_name": "Serbia",
  "country_key": "rs",
  "country_order": NumberInt(0),
  "country_status": NumberInt(0)
});
db.getCollection("tb_country").insert({
  "_id": ObjectId("50a30ad93d5e55040200003e"),
  "country_id": NumberInt(62),
  "country_name": "Seychelles",
  "country_key": "sc",
  "country_order": NumberInt(0),
  "country_status": NumberInt(0)
});
db.getCollection("tb_country").insert({
  "_id": ObjectId("50a30ad93d5e55040200003f"),
  "country_id": NumberInt(63),
  "country_name": "Sweden",
  "country_key": "se",
  "country_order": NumberInt(0),
  "country_status": NumberInt(0)
});
db.getCollection("tb_country").insert({
  "_id": ObjectId("50a30ad93d5e550402000040"),
  "country_id": NumberInt(64),
  "country_name": "Singapore",
  "country_key": "sg",
  "country_order": NumberInt(0),
  "country_status": NumberInt(0)
});
db.getCollection("tb_country").insert({
  "_id": ObjectId("50a30ad93d5e550402000041"),
  "country_id": NumberInt(65),
  "country_name": "Slovakia",
  "country_key": "sk",
  "country_order": NumberInt(0),
  "country_status": NumberInt(0)
});
db.getCollection("tb_country").insert({
  "_id": ObjectId("50a30ad93d5e550402000042"),
  "country_id": NumberInt(66),
  "country_name": "Thailand",
  "country_key": "th",
  "country_order": NumberInt(0),
  "country_status": NumberInt(0)
});
db.getCollection("tb_country").insert({
  "_id": ObjectId("50a30ad93d5e550402000043"),
  "country_id": NumberInt(67),
  "country_name": "Tunisia",
  "country_key": "tn",
  "country_order": NumberInt(0),
  "country_status": NumberInt(0)
});
db.getCollection("tb_country").insert({
  "_id": ObjectId("50a30ad93d5e550402000045"),
  "country_id": NumberInt(69),
  "country_name": "Trinidad & Tobago",
  "country_key": "tt",
  "country_order": NumberInt(0),
  "country_status": NumberInt(0)
});
db.getCollection("tb_country").insert({
  "_id": ObjectId("50a30ad93d5e550402000046"),
  "country_id": NumberInt(70),
  "country_name": "Taiwan",
  "country_key": "tw",
  "country_order": NumberInt(0),
  "country_status": NumberInt(0)
});
db.getCollection("tb_country").insert({
  "_id": ObjectId("50a30ad93d5e550402000048"),
  "country_id": NumberInt(72),
  "country_name": "United State of America",
  "country_key": "us",
  "country_order": NumberInt(0),
  "country_status": NumberInt(0)
});
db.getCollection("tb_country").insert({
  "_id": ObjectId("50a30ad93d5e55040200004b"),
  "country_id": NumberInt(75),
  "country_name": "South Africa",
  "country_key": "za",
  "country_order": NumberInt(0),
  "country_status": NumberInt(0)
});

/** tb_location records **/
db.getCollection("tb_location").insert({
  "_id": ObjectId("50c1aa809c7684fd060000db"),
  "address_city": "Toronto",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "address_line_1": "05 Milner Avenue, Suite 400",
  "address_line_2": "",
  "address_line_3": "",
  "address_postal": "T2G5A7",
  "address_province": "Wisconsin",
  "address_unit": "3",
  "close_date": ISODate("2013-01-04T17:00:00.0Z"),
  "company_id": NumberInt(10006),
  "location_area": "1568",
  "location_banner": "Sport Check",
  "location_id": NumberLong(10003),
  "location_name": "FGL Sports Ltd #1",
  "location_number": NumberInt(9),
  "location_phone": "403.590.0406",
  "location_region": "0",
  "location_type": NumberInt(1),
  "main_contact": "",
  "open_date": ISODate("2012-12-06T17:00:00.0Z"),
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("50c559989c7684280c00000a"),
  "address_city": "Toronto",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "address_line_1": "147 Laird Drive",
  "address_line_2": "",
  "address_line_3": "",
  "address_postal": "M4G 4K1",
  "address_province": "",
  "address_unit": "Unit # 300, B3",
  "close_date": null,
  "company_id": NumberInt(10006),
  "location_area": "SC",
  "location_banner": "FGL Sports Banners",
  "location_id": NumberLong(10002),
  "location_name": "Leaside",
  "location_number": NumberInt(0),
  "location_phone": "",
  "location_region": "0",
  "location_type": NumberInt(3),
  "main_contact": "",
  "open_date": ISODate("2009-07-31T17:00:00.0Z"),
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("50c954649c7684470600000a"),
  "address_city": "Calgary",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "address_line_1": "3016 10th Avenue NE",
  "address_line_2": "",
  "address_line_3": "",
  "address_postal": "T3A 6A3",
  "address_province": "Alberta",
  "address_unit": "Unit 103",
  "close_date": null,
  "company_id": NumberInt(10000),
  "location_area": "1568",
  "location_banner": "",
  "location_id": NumberLong(10000),
  "location_name": "Anvy Digital Calgary",
  "location_number": NumberInt(1),
  "location_phone": "403.291.2244",
  "location_region": "0",
  "location_type": NumberInt(1),
  "main_contact": NumberInt(5),
  "open_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("50fe4b7b9c7684fd3e000077"),
  "address_city": "Regina",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "address_line_1": "1331 Hamilton Street",
  "address_line_2": "",
  "address_line_3": "",
  "address_postal": "S4R 2B6",
  "address_province": "Alberta",
  "address_unit": "",
  "close_date": null,
  "company_id": NumberInt(10004),
  "location_banner": "",
  "location_fax": "",
  "location_id": NumberInt(10005),
  "location_name": "Regina",
  "location_number": NumberInt(2),
  "location_phone": "",
  "location_region": "SK",
  "location_type": NumberInt(3),
  "open_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("50fe4c499c7684fc3e000074"),
  "address_city": "Saskatoon",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "address_line_1": "3235B Miners Avenue",
  "address_line_2": "",
  "address_line_3": "",
  "address_postal": "S7K 7Z1",
  "address_province": "Alberta",
  "address_unit": "",
  "close_date": null,
  "company_id": NumberInt(10004),
  "location_banner": "",
  "location_fax": "",
  "location_id": NumberInt(10006),
  "location_name": "Saskatoon",
  "location_number": NumberInt(3),
  "location_phone": "",
  "location_region": "SK",
  "location_type": NumberInt(3),
  "open_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("50fe4cdd9c76845c40000051"),
  "address_city": "Grand Prarie",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "address_line_1": "11217 - 91 Avenue",
  "address_line_2": "",
  "address_line_3": "",
  "address_postal": "T8V 5Z3",
  "address_province": "Alberta",
  "address_unit": "",
  "close_date": null,
  "company_id": NumberInt(10004),
  "location_banner": "",
  "location_fax": "",
  "location_id": NumberInt(10007),
  "location_name": "Grand Prarie",
  "location_number": NumberInt(4),
  "location_phone": "403.555.5555",
  "location_region": "",
  "location_type": NumberInt(3),
  "open_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("5108e438bd7864401100000e"),
  "address_city": "Cranbrook",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "address_line_1": "822 - Kootnay St. N",
  "address_line_2": "",
  "address_line_3": "",
  "address_postal": "V1C 3V3",
  "address_province": "Alberta",
  "address_unit": "",
  "close_date": null,
  "company_id": NumberInt(10004),
  "location_banner": "",
  "location_fax": "",
  "location_id": NumberInt(10017),
  "location_name": "Cranbrook",
  "location_number": NumberInt(19),
  "location_phone": "403.555.5555",
  "location_region": "BC",
  "location_type": NumberInt(3),
  "main_contact": NumberInt(16),
  "open_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("5109e8899c7684703800010f"),
  "address_city": "Thunder Bay",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "address_line_1": "977 Alloy Drive",
  "address_line_2": "",
  "address_line_3": "",
  "address_postal": "P7B 5Z8",
  "address_province": "Alberta",
  "address_unit": "",
  "close_date": null,
  "company_id": NumberInt(10004),
  "location_banner": "",
  "location_fax": "",
  "location_id": NumberInt(10018),
  "location_name": "Thunder Bay",
  "location_number": NumberInt(18),
  "location_phone": "",
  "location_region": "ON",
  "location_type": NumberInt(3),
  "open_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a3e309c7684393a000355"),
  "location_id": NumberInt(10021),
  "location_name": "Kamloops",
  "company_id": NumberInt(10004),
  "location_type": NumberInt(3),
  "location_region": "BC",
  "location_banner": "",
  "location_number": NumberInt(9),
  "location_phone": "604.555.5555",
  "location_fax": "",
  "address_unit": "Bay 5",
  "address_line_1": "1121 - 12 Street",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Kamloops",
  "address_province": "Alberta",
  "address_postal": "V2B 8A7",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": null,
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("50e3ba7f9c7684d10400000d"),
  "address_city": "Calgary",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "address_line_1": "2915 - 10th Avenue NE",
  "address_line_2": "",
  "address_line_3": "",
  "address_postal": "T2A 5L4",
  "address_province": "Alberta",
  "address_unit": "Bay 1",
  "close_date": null,
  "company_id": NumberInt(10004),
  "location_banner": "",
  "location_fax": "",
  "location_id": NumberLong(10004),
  "location_name": "Calgary",
  "location_number": NumberInt(1),
  "location_phone": "",
  "location_region": "AB",
  "location_type": NumberInt(3),
  "main_contact": NumberInt(17),
  "open_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("50c559219c7684060c00000a"),
  "address_city": "Cornerbrook",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "address_line_1": "54 Maple Valley Road",
  "address_line_2": "",
  "address_line_3": "",
  "address_postal": "A2H 6L8",
  "address_province": "",
  "address_unit": "Unit # M-02A",
  "close_date": null,
  "company_id": NumberInt(10006),
  "location_area": "SC",
  "location_banner": "Sport Check #2",
  "location_id": NumberLong(10001),
  "location_name": "Corner Brook Plaza",
  "location_number": NumberInt(201),
  "location_phone": "403.590.0406",
  "location_region": "0",
  "location_type": NumberInt(3),
  "main_contact": "",
  "open_date": ISODate("2002-12-03T17:00:00.0Z"),
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("50fe4d3a9c76845c40000082"),
  "location_id": NumberInt(10008),
  "location_name": "Edmonton",
  "company_id": NumberInt(10004),
  "location_type": NumberInt(3),
  "location_region": "AB",
  "location_banner": "",
  "location_number": NumberInt(5),
  "location_phone": "",
  "address_unit": "",
  "address_line_1": "7620 Yellowhead Trail",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Edmonton",
  "address_province": "Alberta",
  "address_postal": "T5B 1G3",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": null,
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("50fe4db29c7684e14000000e"),
  "location_id": NumberInt(10009),
  "location_name": "Nanaimo",
  "company_id": NumberInt(10004),
  "location_type": NumberInt(3),
  "location_region": "",
  "location_banner": "",
  "location_number": NumberInt(6),
  "location_phone": "",
  "address_unit": "",
  "address_line_1": "425-D Madsen Road",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Nanaimo",
  "address_province": "British Columbia",
  "address_postal": "V9S 5V3",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": null,
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("50fe4e449c7684863e0000b4"),
  "location_id": NumberInt(10010),
  "location_name": "Brandon",
  "company_id": NumberInt(10004),
  "location_type": NumberInt(3),
  "location_region": "MB",
  "location_banner": "",
  "location_number": NumberInt(7),
  "location_phone": "",
  "address_unit": "Unit 2",
  "address_line_1": "1451 Richmond Avenue East",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Brandon",
  "address_province": "Manitoba",
  "address_postal": "R7A 7A3",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": null,
  "close_date": null,
  "status": NumberInt(1)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("50fe4ebc9c7684fa3e0000b1"),
  "address_city": "Richmond",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "address_line_1": "9 Burbridge Street",
  "address_line_2": "",
  "address_line_3": "",
  "address_postal": "V3K 7B2",
  "address_province": "Alberta",
  "address_unit": "Unit 120",
  "close_date": null,
  "company_id": NumberInt(10004),
  "location_banner": "",
  "location_fax": "",
  "location_id": NumberInt(10011),
  "location_name": "Coquitlam",
  "location_number": NumberInt(8),
  "location_phone": "403.555.5555",
  "location_region": "BC",
  "location_type": NumberInt(3),
  "open_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("50fe511f9c7684fd3e0000de"),
  "address_city": "Winipeg",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "address_line_1": "#7 - 350 Keewatin Street",
  "address_line_2": "",
  "address_line_3": "",
  "address_postal": "R2X 2R9",
  "address_province": "Manitoba",
  "address_unit": "",
  "close_date": null,
  "company_id": NumberInt(10004),
  "location_banner": "",
  "location_id": NumberInt(10012),
  "location_name": "Winipeg",
  "location_number": NumberInt(13),
  "location_phone": "",
  "location_region": "MB",
  "location_type": NumberInt(3),
  "main_contact": NumberInt(8),
  "open_date": null,
  "status": NumberInt(1)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("50fe543a9c7684bc3f0000cb"),
  "address_city": "Medicine Hat",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "address_line_1": "602A Clay Avenue",
  "address_line_2": "",
  "address_line_3": "",
  "address_postal": "T1A 3K2",
  "address_province": "Alberta",
  "address_unit": "",
  "close_date": null,
  "company_id": NumberInt(10004),
  "location_banner": "",
  "location_id": NumberInt(10013),
  "location_name": "Medicine Hat",
  "location_number": NumberInt(10),
  "location_phone": "403.555.555",
  "location_region": "",
  "location_type": NumberInt(3),
  "main_contact": NumberInt(12),
  "open_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("50fe54d39c76840641000095"),
  "address_city": "Lethbridge",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "address_line_1": "#6 574 - 39th St. N",
  "address_line_2": "",
  "address_line_3": "",
  "address_postal": "T1H 6H2",
  "address_province": "Alberta",
  "address_unit": "",
  "close_date": null,
  "company_id": NumberInt(10004),
  "location_banner": "",
  "location_id": NumberInt(10014),
  "location_name": "Lethbridge",
  "location_number": NumberInt(11),
  "location_phone": "",
  "location_region": "AB",
  "location_type": NumberInt(3),
  "main_contact": NumberInt(11),
  "open_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("50fe556e9c7684863e000187"),
  "address_city": "Red Deer",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "address_line_1": "#2 - 7819 50 Avenue",
  "address_line_2": "",
  "address_line_3": "",
  "address_postal": "T4N 1L1",
  "address_province": "Alberta",
  "address_unit": "",
  "close_date": null,
  "company_id": NumberInt(10004),
  "location_banner": "",
  "location_id": NumberInt(10015),
  "location_name": "Red Deer",
  "location_number": NumberInt(12),
  "location_phone": "",
  "location_region": "",
  "location_type": NumberInt(3),
  "main_contact": NumberInt(10),
  "open_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("50fe55e69c7684fa3e000143"),
  "address_city": "Kelowna",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "address_line_1": "#105 - 2250 Acland Road",
  "address_line_2": "",
  "address_line_3": "",
  "address_postal": "V1 6N6",
  "address_province": "Alberta",
  "address_unit": "",
  "close_date": null,
  "company_id": NumberInt(10004),
  "location_banner": "",
  "location_id": NumberInt(10016),
  "location_name": "Kelowna",
  "location_number": NumberInt(15),
  "location_phone": "",
  "location_region": "",
  "location_type": NumberInt(3),
  "main_contact": NumberInt(9),
  "open_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("5109e8f49c7684bb5800003e"),
  "address_city": "Victoria",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "address_line_1": "511 David Street",
  "address_line_2": "",
  "address_line_3": "",
  "address_postal": "V8C 2C7",
  "address_province": "Alberta",
  "address_unit": "Unit F",
  "close_date": null,
  "company_id": NumberInt(10004),
  "location_banner": "",
  "location_fax": "",
  "location_id": NumberInt(10019),
  "location_name": "Victoria",
  "location_number": NumberInt(17),
  "location_phone": "",
  "location_region": "BC",
  "location_type": NumberInt(3),
  "main_contact": NumberInt(14),
  "open_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a3cb69c768418620000c4"),
  "location_id": NumberInt(10020),
  "location_name": "Prince George",
  "company_id": NumberInt(10004),
  "location_type": NumberInt(3),
  "location_region": "BC",
  "location_banner": "",
  "location_number": NumberInt(14),
  "location_phone": "403.555.5555",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "1722 S. Ogilivie Street",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Prince George",
  "address_province": "British Columbia",
  "address_postal": "V2N 1W9",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": null,
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a3e9c9c76847a620000a1"),
  "location_id": NumberInt(10022),
  "location_name": "Penticton",
  "company_id": NumberInt(10004),
  "location_type": NumberInt(3),
  "location_region": "BC",
  "location_banner": "",
  "location_number": NumberInt(16),
  "location_phone": "604.555.5555",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "106 - 1219 Commercial Way",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Penticton",
  "address_province": "Alberta",
  "address_postal": "V2A 3H4",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": null,
  "close_date": null,
  "status": NumberInt(0)
});

/** tb_material records **/
db.getCollection("tb_material").insert({
  "_id": ObjectId("50b2cdff9c7684850300002c"),
  "material_id": NumberInt(2),
  "material_name": "Sintra",
  "material_description": ""
});
db.getCollection("tb_material").insert({
  "_id": ObjectId("50b2ce039c7684850300003e"),
  "material_id": NumberInt(3),
  "material_name": "Canvas",
  "material_description": ""
});
db.getCollection("tb_material").insert({
  "_id": ObjectId("50b2ce079c76848503000050"),
  "material_id": NumberInt(4),
  "material_name": "Dibond",
  "material_description": ""
});
db.getCollection("tb_material").insert({
  "_id": ObjectId("50b2ce0b9c76848503000062"),
  "material_id": NumberInt(5),
  "material_name": "Styrene",
  "material_description": ""
});
db.getCollection("tb_material").insert({
  "_id": ObjectId("50b2ce179c7684fb05000007"),
  "material_id": NumberInt(6),
  "material_name": "Anti-curl Vinyl",
  "material_description": ""
});
db.getCollection("tb_material").insert({
  "_id": ObjectId("50b2ce239c7684f405000024"),
  "material_id": NumberInt(7),
  "material_name": "Coroplast",
  "material_description": ""
});
db.getCollection("tb_material").insert({
  "_id": ObjectId("50b2ce2c9c7684f405000048"),
  "material_id": NumberInt(9),
  "material_name": "Foamcore",
  "material_description": ""
});
db.getCollection("tb_material").insert({
  "_id": ObjectId("50b2ce479c7684f305000067"),
  "material_id": NumberInt(12),
  "material_name": "Crezone",
  "material_description": ""
});
db.getCollection("tb_material").insert({
  "_id": ObjectId("50b2ce4b9c7684f305000079"),
  "material_id": NumberInt(13),
  "material_name": "Removable Vinyl",
  "material_description": ""
});
db.getCollection("tb_material").insert({
  "_id": ObjectId("50b2ce509c7684f30500008b"),
  "material_id": NumberInt(14),
  "material_name": "Vinyl Matte Lam",
  "material_description": ""
});
db.getCollection("tb_material").insert({
  "_id": ObjectId("50b2ce569c7684ed05000039"),
  "material_id": NumberInt(15),
  "material_name": "Laminate Decals",
  "material_description": ""
});
db.getCollection("tb_material").insert({
  "_id": ObjectId("50b2ce5a9c7684ed0500004b"),
  "material_id": NumberInt(16),
  "material_name": "Tradeshow Graphic",
  "material_description": ""
});
db.getCollection("tb_material").insert({
  "_id": ObjectId("50b2ce389c7684f105000034"),
  "description": "",
  "material_description": "",
  "material_id": NumberInt(11),
  "material_name": "Gatorboard"
});
db.getCollection("tb_material").insert({
  "_id": ObjectId("50b2ce609c76848203000018"),
  "description": "",
  "material_description": "",
  "material_id": NumberInt(17),
  "material_name": "Backlit Film"
});
db.getCollection("tb_material").insert({
  "_id": ObjectId("50b2ce339c7684f105000022"),
  "description": "",
  "material_description": "",
  "material_id": NumberInt(10),
  "material_name": "Image-Tex"
});
db.getCollection("tb_material").insert({
  "_id": ObjectId("50b2ce289c7684f405000036"),
  "description": "",
  "material_description": "",
  "material_id": NumberInt(8),
  "material_name": "Adhesive Vinyl"
});
db.getCollection("tb_material").insert({
  "_id": ObjectId("50b983b09c76842206000041"),
  "material_id": NumberInt(19),
  "material_name": "Decorative Vinyl",
  "description": ""
});
db.getCollection("tb_material").insert({
  "_id": ObjectId("50b2ce659c7684f60500004e"),
  "description": "",
  "material_description": "",
  "material_id": NumberInt(18),
  "material_name": "Hi-Tac Vinyl"
});
db.getCollection("tb_material").insert({
  "_id": ObjectId("50b2cdd49c7684f90500001b"),
  "description": "",
  "material_description": "",
  "material_id": NumberInt(1),
  "material_name": "Acrylic - Clear"
});

/** tb_module records **/
db.getCollection("tb_module").insert({
  "_id": ObjectId("50a9a9219c76842f0600007d"),
  "module_category": NumberInt(0),
  "module_description": "",
  "module_dir": "user",
  "module_id": NumberInt(3),
  "module_index": "index.php",
  "module_key": "user",
  "module_locked": NumberInt(0),
  "module_order": NumberInt(0),
  "module_pid": NumberInt(0),
  "module_root": "admin",
  "module_text": "User",
  "module_time": ISODate("2012-11-19T03:38:59.0Z"),
  "module_type": NumberInt(0)
});
db.getCollection("tb_module").insert({
  "_id": ObjectId("50aa03053d5e55180c00028f"),
  "module_id": NumberInt(8),
  "module_pid": NumberInt(0),
  "module_text": "Product",
  "module_key": "product",
  "module_type": NumberInt(0),
  "module_root": "admin",
  "module_dir": "product",
  "module_order": NumberInt(0),
  "module_index": "index.php",
  "module_locked": NumberInt(0),
  "module_time": ISODate("2012-11-19T09:59:33.0Z"),
  "module_category": NumberInt(0),
  "module_description": ""
});
db.getCollection("tb_module").insert({
  "_id": ObjectId("50ab18089c768413060000cc"),
  "module_category": NumberInt(0),
  "module_description": "",
  "module_dir": "System",
  "module_id": NumberInt(10),
  "module_index": "index.php",
  "module_key": "system",
  "module_locked": NumberInt(0),
  "module_order": NumberInt(0),
  "module_pid": NumberInt(0),
  "module_root": "admin",
  "module_text": "System",
  "module_time": ISODate("2012-11-20T05:41:50.0Z"),
  "module_type": NumberInt(0)
});
db.getCollection("tb_module").insert({
  "_id": ObjectId("50a99fa99c768421060000b8"),
  "module_id": NumberInt(1),
  "module_pid": NumberInt(0),
  "module_text": "Company",
  "module_key": "company",
  "module_type": NumberInt(0),
  "module_root": "admin",
  "module_dir": "company",
  "module_order": NumberInt(0),
  "module_index": "index.php",
  "module_locked": NumberInt(0),
  "module_time": ISODate("2012-11-19T02:55:37.0Z"),
  "module_category": NumberInt(0),
  "module_description": ""
});
db.getCollection("tb_module").insert({
  "_id": ObjectId("50c29a859c7684bb03000005"),
  "module_id": NumberInt(18),
  "module_pid": NumberInt(0),
  "module_text": "Order",
  "module_key": "order",
  "module_type": NumberInt(0),
  "module_root": "admin",
  "module_dir": "order",
  "module_order": NumberInt(0),
  "module_index": "index.php",
  "module_locked": NumberInt(0),
  "module_time": ISODate("2012-12-08T01:40:21.0Z"),
  "module_category": NumberInt(0),
  "module_description": ""
});
db.getCollection("tb_module").insert({
  "_id": ObjectId("50c29abc9c7684b903000005"),
  "module_category": NumberInt(0),
  "module_description": "",
  "module_dir": "shipping",
  "module_id": NumberInt(20),
  "module_index": "index.php",
  "module_key": "order\/shipping",
  "module_locked": NumberInt(0),
  "module_menu": "manage_shipping",
  "module_order": NumberInt(0),
  "module_pid": NumberInt(18),
  "module_root": "admin",
  "module_text": "Shipping",
  "module_time": ISODate("2012-12-13T10:01:20.0Z"),
  "module_type": NumberInt(0)
});
db.getCollection("tb_module").insert({
  "_id": ObjectId("50c29aa29c7684ef05000005"),
  "module_category": NumberInt(0),
  "module_description": "",
  "module_dir": "order",
  "module_id": NumberInt(19),
  "module_index": "index.php",
  "module_key": "order\/order",
  "module_locked": NumberInt(0),
  "module_menu": "manage_order",
  "module_order": NumberInt(0),
  "module_pid": NumberInt(18),
  "module_root": "admin",
  "module_text": "Order",
  "module_time": ISODate("2012-12-13T10:01:33.0Z"),
  "module_type": NumberInt(0)
});
db.getCollection("tb_module").insert({
  "_id": ObjectId("50b473aa3d5e552408000162"),
  "module_category": NumberInt(0),
  "module_description": "",
  "module_dir": "product\/products",
  "module_id": NumberInt(16),
  "module_index": "index.php",
  "module_key": "product\/products",
  "module_locked": NumberInt(0),
  "module_menu": "manage_product",
  "module_order": NumberInt(0),
  "module_pid": NumberInt(8),
  "module_root": "admin",
  "module_text": "Products",
  "module_time": ISODate("2012-12-13T10:02:03.0Z"),
  "module_type": NumberInt(0)
});
db.getCollection("tb_module").insert({
  "_id": ObjectId("50b2e6859c76843406000004"),
  "module_category": NumberInt(0),
  "module_description": "",
  "module_dir": "log",
  "module_id": NumberInt(15),
  "module_index": "index.php",
  "module_key": "system\/log",
  "module_locked": NumberInt(0),
  "module_menu": "manage_log",
  "module_order": NumberInt(0),
  "module_pid": NumberInt(10),
  "module_root": "admin",
  "module_text": "Log",
  "module_time": ISODate("2012-12-13T10:02:18.0Z"),
  "module_type": NumberInt(0)
});
db.getCollection("tb_module").insert({
  "_id": ObjectId("50b0491a9c76841e0600000c"),
  "module_category": NumberInt(0),
  "module_description": "",
  "module_dir": "support",
  "module_id": NumberInt(13),
  "module_index": "index.php",
  "module_key": "system\/support",
  "module_locked": NumberInt(0),
  "module_menu": "manage_support",
  "module_order": NumberInt(0),
  "module_pid": NumberInt(10),
  "module_root": "admin",
  "module_text": "Support",
  "module_time": ISODate("2012-12-13T10:02:27.0Z"),
  "module_type": NumberInt(0)
});
db.getCollection("tb_module").insert({
  "_id": ObjectId("50b049009c7684130600010c"),
  "module_category": NumberInt(0),
  "module_description": "",
  "module_dir": "color",
  "module_id": NumberInt(12),
  "module_index": "index.php",
  "module_key": "system\/color",
  "module_locked": NumberInt(0),
  "module_menu": "manage_color",
  "module_order": NumberInt(0),
  "module_pid": NumberInt(10),
  "module_root": "admin",
  "module_text": "Color",
  "module_time": ISODate("2012-12-13T10:02:36.0Z"),
  "module_type": NumberInt(0)
});
db.getCollection("tb_module").insert({
  "_id": ObjectId("50ab18389c76844706000079"),
  "module_category": NumberInt(0),
  "module_description": "",
  "module_dir": "country",
  "module_id": NumberInt(11),
  "module_index": "index.php",
  "module_key": "system\/country",
  "module_locked": NumberInt(0),
  "module_menu": "manage_country",
  "module_order": NumberInt(0),
  "module_pid": NumberInt(10),
  "module_root": "admin",
  "module_text": "Country",
  "module_time": ISODate("2012-12-13T10:02:48.0Z"),
  "module_type": NumberInt(0)
});
db.getCollection("tb_module").insert({
  "_id": ObjectId("50a9af729c76847a0600000d"),
  "module_category": NumberInt(0),
  "module_description": "",
  "module_dir": "location",
  "module_id": NumberInt(7),
  "module_index": "index.php",
  "module_key": "company\/location",
  "module_locked": NumberInt(0),
  "module_menu": "manage_location",
  "module_order": NumberInt(0),
  "module_pid": NumberInt(1),
  "module_root": "admin",
  "module_text": "Location",
  "module_time": ISODate("2012-12-13T10:03:02.0Z"),
  "module_type": NumberInt(0)
});
db.getCollection("tb_module").insert({
  "_id": ObjectId("50a9a9419c76845806000004"),
  "module_category": NumberInt(0),
  "module_description": "",
  "module_dir": "contact",
  "module_id": NumberInt(5),
  "module_index": "index.php",
  "module_key": "user\/contact",
  "module_locked": NumberInt(0),
  "module_menu": "manage_contact",
  "module_order": NumberInt(0),
  "module_pid": NumberInt(3),
  "module_root": "admin",
  "module_text": "Contact",
  "module_time": ISODate("2012-12-13T10:03:15.0Z"),
  "module_type": NumberInt(0)
});
db.getCollection("tb_module").insert({
  "_id": ObjectId("50a9a9309c76842d0600004d"),
  "module_category": NumberInt(0),
  "module_description": "",
  "module_dir": "user",
  "module_id": NumberInt(4),
  "module_index": "index.php",
  "module_key": "user\/user",
  "module_locked": NumberInt(0),
  "module_menu": "manage_user",
  "module_order": NumberInt(0),
  "module_pid": NumberInt(3),
  "module_root": "admin",
  "module_text": "User",
  "module_time": ISODate("2012-12-13T10:03:24.0Z"),
  "module_type": NumberInt(0)
});
db.getCollection("tb_module").insert({
  "_id": ObjectId("50a99fbc9c76842206000004"),
  "module_category": NumberInt(0),
  "module_description": "",
  "module_dir": "company",
  "module_id": NumberInt(2),
  "module_index": "index.php",
  "module_key": "company\/company",
  "module_locked": NumberInt(0),
  "module_menu": "manage_company",
  "module_order": NumberInt(0),
  "module_pid": NumberInt(1),
  "module_root": "admin",
  "module_text": "Company",
  "module_time": ISODate("2012-12-13T10:03:36.0Z"),
  "module_type": NumberInt(0)
});
db.getCollection("tb_module").insert({
  "_id": ObjectId("50c6e4499c76846606000024"),
  "module_category": NumberInt(0),
  "module_description": "",
  "module_dir": "roles",
  "module_id": NumberInt(22),
  "module_index": "index.php",
  "module_key": "user\/function-for-company",
  "module_locked": NumberInt(0),
  "module_menu": "module_rule",
  "module_order": NumberInt(0),
  "module_pid": NumberInt(3),
  "module_root": "admin",
  "module_rules": [
    
  ],
  "module_text": "Function for company",
  "module_time": ISODate("2013-01-26T02:01:19.0Z"),
  "module_type": NumberInt(0)
});
db.getCollection("tb_module").insert({
  "_id": ObjectId("50c2f3e39c76840c07000022"),
  "module_category": NumberInt(0),
  "module_description": "",
  "module_dir": "product\/materials",
  "module_id": NumberInt(21),
  "module_index": "index.php",
  "module_key": "product\/material",
  "module_locked": NumberInt(0),
  "module_menu": "manage_material",
  "module_order": NumberInt(0),
  "module_pid": NumberInt(8),
  "module_root": "admin",
  "module_text": "Material",
  "module_time": ISODate("2012-12-13T10:12:31.0Z"),
  "module_type": NumberInt(0)
});
db.getCollection("tb_module").insert({
  "_id": ObjectId("50ce8eba9c76849c06000005"),
  "module_category": NumberInt(0),
  "module_description": "",
  "module_dir": "product\/packages",
  "module_id": NumberInt(23),
  "module_index": "index.php",
  "module_key": "product\/packages",
  "module_locked": NumberInt(0),
  "module_menu": "manage_packages",
  "module_order": NumberInt(0),
  "module_pid": NumberInt(8),
  "module_root": "admin",
  "module_text": "Packages",
  "module_time": ISODate("2012-12-17T03:19:10.0Z"),
  "module_type": NumberInt(0)
});
db.getCollection("tb_module").insert({
  "_id": ObjectId("50ce927a9c7684a20600000e"),
  "module_id": NumberInt(24),
  "module_pid": NumberInt(8),
  "module_text": "Signage Layout",
  "module_key": "product\/signage-layout",
  "module_type": NumberInt(0),
  "module_root": "admin",
  "module_dir": "product\/signage_layout",
  "module_order": NumberInt(0),
  "module_index": "index.php",
  "module_locked": NumberInt(0),
  "module_time": ISODate("2012-12-17T03:33:14.0Z"),
  "module_category": NumberInt(0),
  "module_description": "",
  "module_menu": "signage_layout"
});
db.getCollection("tb_module").insert({
  "_id": ObjectId("50e3f07c9c7684d906000015"),
  "module_id": NumberInt(25),
  "module_pid": NumberInt(10),
  "module_text": "Province",
  "module_key": "system\/province",
  "module_type": NumberInt(0),
  "module_root": "admin",
  "module_dir": "province",
  "module_order": NumberInt(0),
  "module_index": "index.php",
  "module_locked": NumberInt(0),
  "module_time": ISODate("2013-01-02T08:31:56.0Z"),
  "module_category": NumberInt(0),
  "module_description": "",
  "module_menu": "manage_province"
});
db.getCollection("tb_module").insert({
  "_id": ObjectId("50e4f97f9c7684cb37000005"),
  "module_category": NumberInt(0),
  "module_description": "",
  "module_dir": "product\/tags",
  "module_id": NumberInt(26),
  "module_index": "index.php",
  "module_key": "product\/tags",
  "module_locked": NumberInt(0),
  "module_menu": "product_tags",
  "module_order": NumberInt(0),
  "module_pid": NumberInt(8),
  "module_root": "admin",
  "module_text": "Tags",
  "module_time": ISODate("2013-01-03T03:23:23.0Z"),
  "module_type": NumberInt(0)
});
db.getCollection("tb_module").insert({
  "_id": ObjectId("50efdf0b9c7684f546000005"),
  "module_id": NumberInt(27),
  "module_pid": NumberInt(1),
  "module_text": "Areas",
  "module_key": "company\/areas",
  "module_type": NumberInt(0),
  "module_root": "admin",
  "module_dir": "area",
  "module_order": NumberInt(0),
  "module_index": "index.php",
  "module_locked": NumberInt(0),
  "module_time": ISODate("2013-01-11T09:44:43.0Z"),
  "module_category": NumberInt(0),
  "module_description": "",
  "module_menu": "areas"
});
db.getCollection("tb_module").insert({
  "_id": ObjectId("51025bd49c76847949000012"),
  "module_category": NumberInt(0),
  "module_description": "",
  "module_dir": "order",
  "module_id": NumberInt(28),
  "module_index": "index.php",
  "module_key": "order",
  "module_locked": NumberInt(0),
  "module_menu": "customer_order",
  "module_order": NumberInt(0),
  "module_pid": NumberInt(0),
  "module_root": "office",
  "module_rules": [
    {
      "key": "view",
      "description": "View company orders",
      "status": NumberInt(0)
    },
    {
      "key": "search",
      "description": "Search company orders",
      "status": NumberInt(0)
    },
    {
      "key": "create",
      "description": "Create new orders",
      "status": NumberInt(0)
    },
    {
      "key": "edit",
      "description": "Edit orders",
      "status": NumberInt(0)
    },
    {
      "key": "delete",
      "description": "Delete unsubmitted orders",
      "status": NumberInt(0)
    },
    {
      "key": "allocate",
      "description": "Allocate to different locations",
      "status": NumberInt(0)
    },
    {
      "key": "reorder",
      "description": "Can reorder",
      "status": NumberInt(0)
    },
    {
      "key": "submit",
      "description": "Can submit orders",
      "status": NumberInt(0)
    },
    {
      "key": "approve",
      "description": "Can approve orders",
      "status": NumberInt(0)
    },
    {
      "key": "cancel",
      "description": "Can cancel orders",
      "status": NumberInt(0)
    },
    {
      "key": "mail",
      "description": "",
      "status": NumberInt(0)
    },
    {
      "key": "customize",
      "description": "",
      "status": NumberInt(0)
    },
    {
      "key": "grant",
      "description": "",
      "status": NumberInt(0)
    }
  ],
  "module_text": "Order",
  "module_time": ISODate("2013-01-29T11:13:48.0Z"),
  "module_type": NumberInt(3)
});

/** tb_order records **/
db.getCollection("tb_order").insert({
  "_id": ObjectId("5107b21b9c76849d0400006b"),
  "anvy_id": "ANVY-006-001",
  "billing_contact": "",
  "company_id": NumberInt(10004),
  "date_created": ISODate("2013-01-29T11:27:23.0Z"),
  "date_required": ISODate("2013-01-30T17:00:00.0Z"),
  "delivery_method": NumberInt(0),
  "description": "Fair Trade Logo - 15\" x 15\"",
  "dispatch": NumberInt(0),
  "gross_order_amount": NumberInt(0),
  "location_id": NumberInt(10004),
  "net_order_amount": NumberInt(0),
  "notes": "",
  "order_id": NumberInt(1),
  "order_ref": "Test # 1",
  "order_type": NumberInt(0),
  "po_number": "Test PO#1",
  "raw_id": "006-001",
  "sale_rep": "Test # 1",
  "shipping_contact": NumberInt(3),
  "source": NumberInt(0),
  "status": NumberInt(1),
  "tax_1": NumberInt(0),
  "tax_2": NumberInt(0),
  "tax_3": NumberInt(0),
  "term": NumberInt(0),
  "total_discount": NumberInt(0),
  "total_order_amount": 32,
  "user_name": "demo_vht"
});
db.getCollection("tb_order").insert({
  "_id": ObjectId("5108e1df9c7684c732000041"),
  "anvy_id": "ANVY-006-001",
  "billing_contact": "",
  "company_id": NumberInt(10004),
  "date_created": ISODate("2013-01-30T09:03:27.0Z"),
  "date_required": ISODate("2013-01-30T17:00:00.0Z"),
  "delivery_method": NumberInt(0),
  "description": "",
  "dispatch": NumberInt(0),
  "gross_order_amount": NumberInt(0),
  "location_id": NumberInt(10004),
  "net_order_amount": NumberInt(0),
  "notes": "",
  "order_id": NumberInt(2),
  "order_ref": "Test #2",
  "order_type": NumberInt(0),
  "po_number": "PO#: 002",
  "raw_id": "006-001",
  "sale_rep": "Test #2",
  "shipping_contact": NumberInt(3),
  "source": NumberInt(0),
  "status": NumberInt(3),
  "tax_1": NumberInt(0),
  "tax_2": NumberInt(0),
  "tax_3": NumberInt(0),
  "term": NumberInt(0),
  "total_discount": NumberInt(0),
  "total_order_amount": 96,
  "user_name": "demo_vht"
});
db.getCollection("tb_order").insert({
  "_id": ObjectId("5108e5329c76840632000104"),
  "anvy_id": "ANVY-006-001",
  "billing_contact": "",
  "company_id": NumberInt(10004),
  "date_created": ISODate("2013-01-30T09:17:38.0Z"),
  "date_required": ISODate("2013-01-29T17:00:00.0Z"),
  "delivery_method": NumberInt(0),
  "description": "",
  "dispatch": NumberInt(0),
  "gross_order_amount": NumberInt(0),
  "location_id": NumberInt(10015),
  "net_order_amount": NumberInt(0),
  "notes": "",
  "order_id": NumberInt(3),
  "order_ref": "Test #3",
  "order_type": NumberInt(0),
  "po_number": "PO#: 003",
  "raw_id": "006-001",
  "sale_rep": "Test #3",
  "shipping_contact": NumberInt(10),
  "source": NumberInt(0),
  "status": NumberInt(2),
  "tax_1": NumberInt(0),
  "tax_2": NumberInt(0),
  "tax_3": NumberInt(0),
  "term": NumberInt(0),
  "total_discount": NumberInt(0),
  "total_order_amount": 128,
  "user_name": "demo_vht1"
});
db.getCollection("tb_order").insert({
  "_id": ObjectId("5108e8cdbd7864201200022f"),
  "anvy_id": "ANVY-006-001",
  "billing_contact": "",
  "company_id": NumberInt(10004),
  "date_created": ISODate("2013-01-30T09:33:01.0Z"),
  "date_required": ISODate("2013-01-29T17:00:00.0Z"),
  "delivery_method": NumberInt(0),
  "description": "",
  "dispatch": NumberInt(0),
  "gross_order_amount": NumberInt(0),
  "location_id": NumberInt(10015),
  "net_order_amount": NumberInt(0),
  "notes": "",
  "order_id": NumberInt(4),
  "order_ref": "1807",
  "order_type": NumberInt(0),
  "po_number": "Check Send Email",
  "raw_id": "006-001",
  "sale_rep": "1807",
  "shipping_contact": NumberInt(10),
  "source": NumberInt(0),
  "status": NumberInt(3),
  "tax_1": NumberInt(0),
  "tax_2": NumberInt(0),
  "tax_3": NumberInt(0),
  "term": NumberInt(0),
  "total_discount": NumberInt(0),
  "total_order_amount": 96,
  "user_name": "demo_vht1"
});
db.getCollection("tb_order").insert({
  "_id": ObjectId("5108ed8cbd7864b012000071"),
  "anvy_id": "ANVY-006-001",
  "billing_contact": "",
  "company_id": NumberInt(10004),
  "date_created": ISODate("2013-01-30T09:53:16.0Z"),
  "date_required": ISODate("2013-01-29T17:00:00.0Z"),
  "delivery_method": NumberInt(0),
  "description": "",
  "dispatch": NumberInt(0),
  "gross_order_amount": NumberInt(0),
  "location_id": NumberInt(10015),
  "net_order_amount": NumberInt(0),
  "notes": "",
  "order_id": NumberInt(5),
  "order_ref": "123456789098",
  "order_type": NumberInt(0),
  "po_number": "01254",
  "raw_id": "006-001",
  "sale_rep": "123456789098",
  "shipping_contact": NumberInt(10),
  "source": NumberInt(0),
  "status": NumberInt(3),
  "tax_1": NumberInt(0),
  "tax_2": NumberInt(0),
  "tax_3": NumberInt(0),
  "term": NumberInt(0),
  "total_discount": NumberInt(0),
  "total_order_amount": 128,
  "user_name": "demo_vht1"
});
db.getCollection("tb_order").insert({
  "_id": ObjectId("5108ef75bd7864b0120001b7"),
  "anvy_id": "ANVY-006-001",
  "billing_contact": "",
  "company_id": NumberInt(10004),
  "date_created": ISODate("2013-01-30T10:01:25.0Z"),
  "date_required": ISODate("2013-01-29T17:00:00.0Z"),
  "delivery_method": NumberInt(0),
  "description": "",
  "dispatch": NumberInt(0),
  "gross_order_amount": NumberInt(0),
  "location_id": NumberInt(10015),
  "net_order_amount": NumberInt(0),
  "notes": "",
  "order_id": NumberInt(6),
  "order_ref": "checkalocate",
  "order_type": NumberInt(0),
  "po_number": "Check Allocation",
  "raw_id": "006-001",
  "sale_rep": "checkalocate",
  "shipping_contact": NumberInt(10),
  "source": NumberInt(0),
  "status": NumberInt(3),
  "tax_1": NumberInt(0),
  "tax_2": NumberInt(0),
  "tax_3": NumberInt(0),
  "term": NumberInt(0),
  "total_discount": NumberInt(0),
  "total_order_amount": 32,
  "user_name": "demo_vht1"
});
db.getCollection("tb_order").insert({
  "_id": ObjectId("5108f003bd7864d4050000c9"),
  "anvy_id": "ANVY-006-001",
  "billing_contact": "",
  "company_id": NumberInt(10004),
  "date_created": ISODate("2013-01-30T10:03:47.0Z"),
  "date_required": ISODate("2013-01-29T17:00:00.0Z"),
  "delivery_method": NumberInt(0),
  "description": "",
  "dispatch": NumberInt(0),
  "gross_order_amount": NumberInt(0),
  "location_id": NumberInt(10015),
  "net_order_amount": NumberInt(0),
  "notes": "",
  "order_id": NumberInt(7),
  "order_ref": "1245",
  "order_type": NumberInt(0),
  "po_number": "check allocation cont",
  "raw_id": "006-001",
  "sale_rep": "1245",
  "shipping_contact": NumberInt(10),
  "source": NumberInt(0),
  "status": NumberInt(3),
  "tax_1": NumberInt(0),
  "tax_2": NumberInt(0),
  "tax_3": NumberInt(0),
  "term": NumberInt(0),
  "total_discount": NumberInt(0),
  "total_order_amount": 32,
  "user_name": "demo_vht1"
});
db.getCollection("tb_order").insert({
  "_id": ObjectId("5108f219bd78643402000057"),
  "anvy_id": "ANVY-006-001",
  "billing_contact": "",
  "company_id": NumberInt(10004),
  "date_created": ISODate("2013-01-30T10:12:41.0Z"),
  "date_required": ISODate("2013-01-29T17:00:00.0Z"),
  "delivery_method": NumberInt(0),
  "description": "2",
  "dispatch": NumberInt(0),
  "gross_order_amount": NumberInt(0),
  "location_id": NumberInt(10015),
  "net_order_amount": NumberInt(0),
  "notes": "",
  "order_id": NumberInt(8),
  "order_ref": "2",
  "order_type": NumberInt(0),
  "po_number": "check allocation cont 2",
  "raw_id": "006-001",
  "sale_rep": "2",
  "shipping_contact": NumberInt(10),
  "source": NumberInt(0),
  "status": NumberInt(3),
  "tax_1": NumberInt(0),
  "tax_2": NumberInt(0),
  "tax_3": NumberInt(0),
  "term": NumberInt(0),
  "total_discount": NumberInt(0),
  "total_order_amount": 32,
  "user_name": "demo_vht1"
});
db.getCollection("tb_order").insert({
  "_id": ObjectId("5108f2f0bd786434020000c0"),
  "anvy_id": "ANVY-006-001",
  "billing_contact": "",
  "company_id": NumberInt(10004),
  "date_created": ISODate("2013-01-30T10:16:16.0Z"),
  "date_required": ISODate("2013-01-29T17:00:00.0Z"),
  "delivery_method": NumberInt(0),
  "description": "",
  "dispatch": NumberInt(0),
  "gross_order_amount": NumberInt(0),
  "location_id": NumberInt(10015),
  "net_order_amount": NumberInt(0),
  "notes": "",
  "order_id": NumberInt(9),
  "order_ref": "3",
  "order_type": NumberInt(0),
  "po_number": "check allocation cont 3",
  "raw_id": "006-001",
  "sale_rep": "3",
  "shipping_contact": NumberInt(10),
  "source": NumberInt(0),
  "status": NumberInt(3),
  "tax_1": NumberInt(0),
  "tax_2": NumberInt(0),
  "tax_3": NumberInt(0),
  "term": NumberInt(0),
  "total_discount": NumberInt(0),
  "total_order_amount": 160,
  "user_name": "demo_vht1"
});
db.getCollection("tb_order").insert({
  "_id": ObjectId("5108f46bbd78643402000142"),
  "anvy_id": "ANVY-006-001",
  "billing_contact": "",
  "company_id": NumberInt(10004),
  "date_created": ISODate("2013-01-30T10:22:35.0Z"),
  "date_required": ISODate("2013-01-29T17:00:00.0Z"),
  "delivery_method": NumberInt(0),
  "description": "",
  "dispatch": NumberInt(0),
  "gross_order_amount": NumberInt(0),
  "location_id": NumberInt(10015),
  "net_order_amount": NumberInt(0),
  "notes": "",
  "order_id": NumberInt(10),
  "order_ref": "123456789098",
  "order_type": NumberInt(0),
  "po_number": "check allocation cont 4",
  "raw_id": "006-001",
  "sale_rep": "123456789098",
  "shipping_contact": NumberInt(10),
  "source": NumberInt(0),
  "status": NumberInt(3),
  "tax_1": NumberInt(0),
  "tax_2": NumberInt(0),
  "tax_3": NumberInt(0),
  "term": NumberInt(0),
  "total_discount": NumberInt(0),
  "total_order_amount": 160,
  "user_name": "demo_vht1"
});
db.getCollection("tb_order").insert({
  "_id": ObjectId("510a21969c7684393a000137"),
  "anvy_id": "ANVY-006-001",
  "billing_contact": "",
  "company_id": NumberInt(10004),
  "date_created": ISODate("2013-01-31T07:47:34.0Z"),
  "date_required": ISODate("2013-01-30T17:00:00.0Z"),
  "delivery_method": NumberInt(0),
  "description": "",
  "dispatch": NumberInt(0),
  "gross_order_amount": NumberInt(0),
  "location_id": NumberInt(10015),
  "net_order_amount": NumberInt(0),
  "notes": "",
  "order_id": NumberInt(11),
  "order_ref": "Test Pending",
  "order_type": NumberInt(0),
  "po_number": "Test Pending",
  "raw_id": "006-001",
  "sale_rep": "Test Pending",
  "shipping_contact": NumberInt(10),
  "source": NumberInt(0),
  "status": NumberInt(3),
  "tax_1": NumberInt(0),
  "tax_2": NumberInt(0),
  "tax_3": NumberInt(0),
  "term": NumberInt(0),
  "total_discount": NumberInt(0),
  "total_order_amount": 96,
  "user_name": "demo_vht1"
});
db.getCollection("tb_order").insert({
  "_id": ObjectId("510a21f89c7684bc58000183"),
  "anvy_id": "ANVY-006-001",
  "billing_contact": "",
  "company_id": NumberInt(10004),
  "date_created": ISODate("2013-01-31T07:49:12.0Z"),
  "date_required": ISODate("2013-01-30T17:00:00.0Z"),
  "delivery_method": NumberInt(0),
  "description": "",
  "dispatch": NumberInt(0),
  "gross_order_amount": NumberInt(0),
  "location_id": NumberInt(10015),
  "net_order_amount": NumberInt(0),
  "notes": "",
  "order_id": NumberInt(12),
  "order_ref": "l;dl;d",
  "order_type": NumberInt(0),
  "po_number": "telks",
  "raw_id": "006-001",
  "sale_rep": "l;dl;d",
  "shipping_contact": NumberInt(10),
  "source": NumberInt(0),
  "status": NumberInt(3),
  "tax_1": NumberInt(0),
  "tax_2": NumberInt(0),
  "tax_3": NumberInt(0),
  "term": NumberInt(0),
  "total_discount": NumberInt(0),
  "total_order_amount": 128,
  "user_name": "demo_vht1"
});
db.getCollection("tb_order").insert({
  "_id": ObjectId("510a22579c7684103a00019b"),
  "anvy_id": "ANVY-006-001",
  "billing_contact": "",
  "company_id": NumberInt(10004),
  "date_created": ISODate("2013-01-31T07:50:47.0Z"),
  "date_required": ISODate("2013-01-30T17:00:00.0Z"),
  "delivery_method": NumberInt(0),
  "description": "",
  "dispatch": NumberInt(0),
  "gross_order_amount": NumberInt(0),
  "location_id": NumberInt(10004),
  "net_order_amount": NumberInt(0),
  "notes": "",
  "order_id": NumberInt(13),
  "order_ref": "Test Pending",
  "order_type": NumberInt(0),
  "po_number": "Test $5",
  "raw_id": "006-001",
  "sale_rep": "Test Pending",
  "shipping_contact": NumberInt(3),
  "source": NumberInt(0),
  "status": NumberInt(3),
  "tax_1": NumberInt(0),
  "tax_2": NumberInt(0),
  "tax_3": NumberInt(0),
  "term": NumberInt(0),
  "total_discount": NumberInt(0),
  "total_order_amount": 96,
  "user_name": "demo_vht"
});
db.getCollection("tb_order").insert({
  "_id": ObjectId("510a276e9c76849454000207"),
  "anvy_id": "ANVY-006-001",
  "billing_contact": "",
  "company_id": NumberInt(10004),
  "date_created": ISODate("2013-01-31T08:12:30.0Z"),
  "date_required": ISODate("2013-01-30T17:00:00.0Z"),
  "delivery_method": NumberInt(0),
  "description": "",
  "dispatch": NumberInt(0),
  "gross_order_amount": NumberInt(0),
  "location_id": NumberInt(10004),
  "net_order_amount": NumberInt(0),
  "notes": "",
  "order_id": NumberInt(14),
  "order_ref": "Test",
  "order_type": NumberInt(0),
  "po_number": "PO Pending #1",
  "raw_id": "006-001",
  "sale_rep": "Test",
  "shipping_contact": NumberInt(3),
  "source": NumberInt(0),
  "status": NumberInt(3),
  "tax_1": NumberInt(0),
  "tax_2": NumberInt(0),
  "tax_3": NumberInt(0),
  "term": NumberInt(0),
  "total_discount": NumberInt(0),
  "total_order_amount": 128,
  "user_name": "demo_vht"
});
db.getCollection("tb_order").insert({
  "_id": ObjectId("510a28569c7684103a00024f"),
  "anvy_id": "ANVY-006-001",
  "billing_contact": "",
  "company_id": NumberInt(10004),
  "date_created": ISODate("2013-01-31T08:16:22.0Z"),
  "date_required": ISODate("2013-01-30T17:00:00.0Z"),
  "delivery_method": NumberInt(0),
  "description": "Test",
  "dispatch": NumberInt(0),
  "gross_order_amount": NumberInt(0),
  "location_id": NumberInt(10015),
  "net_order_amount": NumberInt(0),
  "notes": "",
  "order_id": NumberInt(15),
  "order_ref": "Test Pending #2",
  "order_type": NumberInt(0),
  "po_number": "Test Pending #2",
  "raw_id": "006-001",
  "sale_rep": "Test Pending #2",
  "shipping_contact": NumberInt(10),
  "source": NumberInt(0),
  "status": NumberInt(3),
  "tax_1": NumberInt(0),
  "tax_2": NumberInt(0),
  "tax_3": NumberInt(0),
  "term": NumberInt(0),
  "total_discount": NumberInt(0),
  "total_order_amount": 128,
  "user_name": "demo_vht1"
});
db.getCollection("tb_order").insert({
  "_id": ObjectId("510a2b559c7684bb580001f5"),
  "anvy_id": "ANVY-006-001",
  "billing_contact": "",
  "company_id": NumberInt(10004),
  "date_created": ISODate("2013-01-31T08:29:09.0Z"),
  "date_required": ISODate("2013-01-30T17:00:00.0Z"),
  "delivery_method": NumberInt(0),
  "description": "",
  "dispatch": NumberInt(0),
  "gross_order_amount": NumberInt(0),
  "location_id": NumberInt(10015),
  "net_order_amount": NumberInt(0),
  "notes": "",
  "order_id": NumberInt(16),
  "order_ref": "Red Deer Order#3",
  "order_type": NumberInt(0),
  "po_number": "Test Pending #3",
  "raw_id": "006-001",
  "sale_rep": "Red Deer Order#3",
  "shipping_contact": NumberInt(10),
  "source": NumberInt(0),
  "status": NumberInt(2),
  "tax_1": NumberInt(0),
  "tax_2": NumberInt(0),
  "tax_3": NumberInt(0),
  "term": NumberInt(0),
  "total_discount": NumberInt(0),
  "total_order_amount": 160,
  "user_name": "demo_vht1"
});
db.getCollection("tb_order").insert({
  "_id": ObjectId("510a2cf59c76841b6200000d"),
  "anvy_id": "ANVY-006-001",
  "billing_contact": "",
  "company_id": NumberInt(10004),
  "date_created": ISODate("2013-01-31T08:36:05.0Z"),
  "date_required": ISODate("2013-01-30T17:00:00.0Z"),
  "delivery_method": NumberInt(0),
  "description": "",
  "dispatch": NumberInt(0),
  "gross_order_amount": NumberInt(0),
  "location_id": NumberInt(10019),
  "net_order_amount": NumberInt(0),
  "notes": "",
  "order_id": NumberInt(17),
  "order_ref": "Victoria Order #4",
  "order_type": NumberInt(0),
  "po_number": "Test Pending #4",
  "raw_id": "006-001",
  "sale_rep": "Victoria Order #4",
  "shipping_contact": NumberInt(14),
  "source": NumberInt(0),
  "status": NumberInt(2),
  "tax_1": NumberInt(0),
  "tax_2": NumberInt(0),
  "tax_3": NumberInt(0),
  "term": NumberInt(0),
  "total_discount": NumberInt(0),
  "total_order_amount": 96,
  "user_name": "bryan.baxter"
});
db.getCollection("tb_order").insert({
  "_id": ObjectId("510a31339c7684005b0001e1"),
  "anvy_id": "ANVY-006-001",
  "billing_contact": "",
  "company_id": NumberInt(10004),
  "date_created": ISODate("2013-01-31T08:54:11.0Z"),
  "date_required": ISODate("2013-01-30T17:00:00.0Z"),
  "delivery_method": NumberInt(0),
  "description": "",
  "dispatch": NumberInt(0),
  "gross_order_amount": NumberInt(0),
  "location_id": NumberInt(10004),
  "net_order_amount": NumberInt(0),
  "notes": "",
  "order_id": NumberInt(18),
  "order_ref": "Calgary Orders",
  "order_type": NumberInt(0),
  "po_number": "Test Pending #5",
  "raw_id": "006-001",
  "sale_rep": "Calgary Orders",
  "shipping_contact": NumberInt(3),
  "source": NumberInt(0),
  "status": NumberInt(3),
  "tax_1": NumberInt(0),
  "tax_2": NumberInt(0),
  "tax_3": NumberInt(0),
  "term": NumberInt(0),
  "total_discount": NumberInt(0),
  "total_order_amount": 128,
  "user_name": "demo_vht"
});
db.getCollection("tb_order").insert({
  "_id": ObjectId("510a316c9c76841b6200007c"),
  "anvy_id": "ANVY-006-001",
  "billing_contact": "",
  "company_id": NumberInt(10004),
  "date_created": ISODate("2013-01-31T08:55:08.0Z"),
  "date_required": ISODate("2013-01-30T17:00:00.0Z"),
  "delivery_method": NumberInt(0),
  "description": "",
  "dispatch": NumberInt(0),
  "gross_order_amount": NumberInt(0),
  "location_id": NumberInt(10004),
  "net_order_amount": NumberInt(0),
  "notes": "",
  "order_id": NumberInt(19),
  "order_ref": "Calgary Orders",
  "order_type": NumberInt(0),
  "po_number": "Test Pending #6",
  "raw_id": "006-001",
  "sale_rep": "Calgary Orders",
  "shipping_contact": NumberInt(3),
  "source": NumberInt(0),
  "status": NumberInt(3),
  "tax_1": NumberInt(0),
  "tax_2": NumberInt(0),
  "tax_3": NumberInt(0),
  "term": NumberInt(0),
  "total_discount": NumberInt(0),
  "total_order_amount": 64,
  "user_name": "demo_vht"
});

/** tb_order_items records **/
db.getCollection("tb_order_items").insert({
  "_id": ObjectId("5107b21b9c76849d0400006c"),
  "order_item_id": NumberInt(1),
  "order_id": NumberInt(1),
  "product_id": NumberInt(44),
  "package_type": NumberInt(0),
  "company_id": NumberInt(10004),
  "location_id": NumberInt(10004),
  "product_code": "VHT-Logo-FT",
  "product_description": "Laminated contour-cut Fair Trade logo",
  "quantity": NumberInt(1),
  "description": "",
  "customization_information": "",
  "width": 15,
  "length": 15,
  "unit": "in",
  "product_size_option": NumberInt(1),
  "current_size_option": NumberInt(1),
  "graphic_file": "resources\/VHT\/products\/44\/FT_logo.jpg",
  "graphic_id": NumberInt(0),
  "product_image_option": NumberInt(0),
  "current_image_option": NumberInt(0),
  "custom_image_path": "",
  "original_price": NumberInt(0),
  "discount_price": NumberInt(0),
  "current_price": 32,
  "unit_price": NumberInt(0),
  "status": NumberInt(0),
  "discount_type": NumberInt(0),
  "discount_per_unit": NumberInt(0),
  "net_price": NumberInt(0),
  "extended_amount": NumberInt(0),
  "material_id": NumberInt(2),
  "material_name": "Sintra",
  "material_color": "White",
  "material_thickness_value": 0.3,
  "material_thickness_unit": "cm",
  "total_price": 32,
  "product_text_option": NumberInt(0),
  "current_text_option": NumberInt(0),
  "text": [
    
  ],
  "allocation": [
    {
      "location_id": null,
      "location_name": null,
      "location_address": " - ",
      "location_quantity": NumberInt(1),
      "location_price": 32,
      "product_id": NumberInt(44),
      "product_image": "resources\/VHT\/products\/44\/FT_logo.jpg",
      "product_name": "VHT-Logo-FT<br>Laminated contour-cut Fair Trade logo<br>Sintra (15 &times; 15 in) 0.3 cm",
      "tracking_url": "",
      "tracking_number": "",
      "tracking_company": "",
      "date_shipping": ISODate("2013-01-29T11:26:37.0Z"),
      "shipping_status": NumberInt(0)
    }
  ]
});
db.getCollection("tb_order_items").insert({
  "_id": ObjectId("5108e1df9c7684c732000042"),
  "order_item_id": NumberInt(2),
  "order_id": NumberInt(2),
  "product_id": NumberInt(44),
  "package_type": NumberInt(0),
  "company_id": NumberInt(10004),
  "location_id": NumberInt(10004),
  "product_code": "VHT-Logo-FT",
  "product_description": "Laminated contour-cut Fair Trade logo",
  "quantity": NumberInt(3),
  "description": "",
  "customization_information": "",
  "width": 12,
  "length": 12,
  "unit": "cm",
  "product_size_option": NumberInt(1),
  "current_size_option": NumberInt(0),
  "graphic_file": "resources\/VHT\/products\/44\/FT_logo.jpg",
  "graphic_id": NumberInt(0),
  "product_image_option": NumberInt(0),
  "current_image_option": NumberInt(0),
  "custom_image_path": "",
  "original_price": NumberInt(0),
  "discount_price": NumberInt(0),
  "current_price": 32,
  "unit_price": NumberInt(0),
  "status": NumberInt(0),
  "discount_type": NumberInt(0),
  "discount_per_unit": NumberInt(0),
  "net_price": NumberInt(0),
  "extended_amount": NumberInt(0),
  "material_id": NumberInt(2),
  "material_name": "Sintra",
  "material_color": "White",
  "material_thickness_value": 0.3,
  "material_thickness_unit": "cm",
  "total_price": 96,
  "product_text_option": NumberInt(0),
  "current_text_option": NumberInt(0),
  "text": [
    
  ],
  "allocation": [
    {
      "location_id": 10004,
      "location_name": "Calgary",
      "location_address": "T2A 5L4 - 2915 - 10th Avenue NE",
      "location_quantity": NumberInt(3),
      "location_price": 32,
      "product_id": NumberInt(44),
      "product_image": "resources\/VHT\/products\/44\/FT_logo.jpg",
      "product_name": "VHT-Logo-FT<br>Laminated contour-cut Fair Trade logo<br>Sintra (12 &times; 12 cm) 0.3 cm",
      "tracking_url": "",
      "tracking_number": "",
      "tracking_company": "",
      "date_shipping": ISODate("2013-01-30T09:03:00.0Z"),
      "shipping_status": NumberInt(0)
    }
  ]
});
db.getCollection("tb_order_items").insert({
  "_id": ObjectId("5108e5329c76840632000105"),
  "order_item_id": NumberInt(3),
  "order_id": NumberInt(3),
  "product_id": NumberInt(43),
  "package_type": NumberInt(0),
  "company_id": NumberInt(10004),
  "location_id": NumberInt(10015),
  "product_code": "VHT-Logo-BM",
  "product_description": "Laminated contour-cut Blue Mountain logo",
  "quantity": NumberInt(4),
  "description": "",
  "customization_information": "",
  "width": 22,
  "length": 16,
  "unit": "cm",
  "product_size_option": NumberInt(1),
  "current_size_option": NumberInt(0),
  "graphic_file": "resources\/VHT\/products\/43\/BM_logo.jpg",
  "graphic_id": NumberInt(0),
  "product_image_option": NumberInt(0),
  "current_image_option": NumberInt(0),
  "custom_image_path": "",
  "original_price": NumberInt(0),
  "discount_price": NumberInt(0),
  "current_price": 32,
  "unit_price": NumberInt(0),
  "status": NumberInt(0),
  "discount_type": NumberInt(0),
  "discount_per_unit": NumberInt(0),
  "net_price": NumberInt(0),
  "extended_amount": NumberInt(0),
  "material_id": NumberInt(2),
  "material_name": "Sintra",
  "material_color": "White",
  "material_thickness_value": 0.3,
  "material_thickness_unit": "cm",
  "total_price": 128,
  "product_text_option": NumberInt(0),
  "current_text_option": NumberInt(0),
  "text": [
    
  ],
  "allocation": [
    {
      "location_id": NumberInt(10015),
      "location_name": "Red Deer",
      "location_address": "T4N 1L1 - #2 - 7819 50 Avenue",
      "location_quantity": NumberInt(4),
      "location_price": 32,
      "product_id": NumberInt(43),
      "product_image": "resources\/VHT\/products\/43\/BM_logo.jpg",
      "product_name": "VHT-Logo-BM<br>Laminated contour-cut Blue Mountain logo<br>Sintra (22 &times; 16 cm) 0.3 cm",
      "tracking_url": "",
      "tracking_number": "",
      "tracking_company": "",
      "date_shipping": ISODate("2013-01-30T09:17:13.0Z"),
      "shipping_status": NumberInt(0)
    }
  ]
});
db.getCollection("tb_order_items").insert({
  "_id": ObjectId("5108e8cdbd78642012000230"),
  "order_item_id": NumberInt(4),
  "order_id": NumberInt(4),
  "product_id": NumberInt(44),
  "package_type": NumberInt(0),
  "company_id": NumberInt(10004),
  "location_id": NumberInt(10015),
  "product_code": "VHT-Logo-FT",
  "product_description": "Laminated contour-cut Fair Trade logo",
  "quantity": NumberInt(3),
  "description": "",
  "customization_information": "",
  "width": 12,
  "length": 12,
  "unit": "cm",
  "product_size_option": NumberInt(1),
  "current_size_option": NumberInt(0),
  "graphic_file": "resources\/VHT\/products\/44\/FT_logo.jpg",
  "graphic_id": NumberInt(0),
  "product_image_option": NumberInt(0),
  "current_image_option": NumberInt(0),
  "custom_image_path": "",
  "original_price": NumberInt(0),
  "discount_price": NumberInt(0),
  "current_price": 32,
  "unit_price": NumberInt(0),
  "status": NumberInt(0),
  "discount_type": NumberInt(0),
  "discount_per_unit": NumberInt(0),
  "net_price": NumberInt(0),
  "extended_amount": NumberInt(0),
  "material_id": NumberInt(2),
  "material_name": "Sintra",
  "material_color": "White",
  "material_thickness_value": 0.3,
  "material_thickness_unit": "cm",
  "total_price": 96,
  "product_text_option": NumberInt(0),
  "current_text_option": NumberInt(0),
  "text": [
    
  ],
  "allocation": [
    {
      "location_id": null,
      "location_name": null,
      "location_address": " - ",
      "location_quantity": NumberInt(3),
      "location_price": 32,
      "product_id": NumberInt(44),
      "product_image": "resources\/VHT\/products\/44\/FT_logo.jpg",
      "product_name": "VHT-Logo-FT<br>Laminated contour-cut Fair Trade logo<br>Sintra (12 &times; 12 cm) 0.3 cm",
      "tracking_url": "",
      "tracking_number": "",
      "tracking_company": "",
      "date_shipping": ISODate("2013-01-30T09:32:50.0Z"),
      "shipping_status": NumberInt(0)
    }
  ]
});
db.getCollection("tb_order_items").insert({
  "_id": ObjectId("5108ed8cbd7864b012000072"),
  "order_item_id": NumberInt(5),
  "order_id": NumberInt(5),
  "product_id": NumberInt(43),
  "package_type": NumberInt(0),
  "company_id": NumberInt(10004),
  "location_id": NumberInt(10015),
  "product_code": "VHT-Logo-BM",
  "product_description": "Laminated contour-cut Blue Mountain logo",
  "quantity": NumberInt(4),
  "description": "",
  "customization_information": "",
  "width": 22,
  "length": 16,
  "unit": "cm",
  "product_size_option": NumberInt(1),
  "current_size_option": NumberInt(0),
  "graphic_file": "resources\/VHT\/products\/43\/BM_logo.jpg",
  "graphic_id": NumberInt(0),
  "product_image_option": NumberInt(0),
  "current_image_option": NumberInt(0),
  "custom_image_path": "",
  "original_price": NumberInt(0),
  "discount_price": NumberInt(0),
  "current_price": 32,
  "unit_price": NumberInt(0),
  "status": NumberInt(0),
  "discount_type": NumberInt(0),
  "discount_per_unit": NumberInt(0),
  "net_price": NumberInt(0),
  "extended_amount": NumberInt(0),
  "material_id": NumberInt(2),
  "material_name": "Sintra",
  "material_color": "White",
  "material_thickness_value": 0.3,
  "material_thickness_unit": "cm",
  "total_price": 128,
  "product_text_option": NumberInt(0),
  "current_text_option": NumberInt(0),
  "text": [
    
  ],
  "allocation": [
    {
      "location_id": null,
      "location_name": null,
      "location_address": " - ",
      "location_quantity": NumberInt(4),
      "location_price": 32,
      "product_id": NumberInt(43),
      "product_image": "resources\/VHT\/products\/43\/BM_logo.jpg",
      "product_name": "VHT-Logo-BM<br>Laminated contour-cut Blue Mountain logo<br>Sintra (22 &times; 16 cm) 0.3 cm",
      "tracking_url": "",
      "tracking_number": "",
      "tracking_company": "",
      "date_shipping": ISODate("2013-01-30T09:52:50.0Z"),
      "shipping_status": NumberInt(0)
    }
  ]
});
db.getCollection("tb_order_items").insert({
  "_id": ObjectId("5108ef75bd7864b0120001b8"),
  "order_item_id": NumberInt(6),
  "order_id": NumberInt(6),
  "product_id": NumberInt(44),
  "package_type": NumberInt(0),
  "company_id": NumberInt(10004),
  "location_id": NumberInt(10015),
  "product_code": "VHT-Logo-FT",
  "product_description": "Laminated contour-cut Fair Trade logo",
  "quantity": NumberInt(1),
  "description": "",
  "customization_information": "",
  "width": 12,
  "length": 12,
  "unit": "cm",
  "product_size_option": NumberInt(1),
  "current_size_option": NumberInt(0),
  "graphic_file": "resources\/VHT\/products\/44\/FT_logo.jpg",
  "graphic_id": NumberInt(0),
  "product_image_option": NumberInt(0),
  "current_image_option": NumberInt(0),
  "custom_image_path": "",
  "original_price": NumberInt(0),
  "discount_price": NumberInt(0),
  "current_price": 32,
  "unit_price": NumberInt(0),
  "status": NumberInt(0),
  "discount_type": NumberInt(0),
  "discount_per_unit": NumberInt(0),
  "net_price": NumberInt(0),
  "extended_amount": NumberInt(0),
  "material_id": NumberInt(2),
  "material_name": "Sintra",
  "material_color": "White",
  "material_thickness_value": 0.3,
  "material_thickness_unit": "cm",
  "total_price": 32,
  "product_text_option": NumberInt(0),
  "current_text_option": NumberInt(0),
  "text": [
    
  ],
  "allocation": [
    {
      "location_id": NumberInt(10015),
      "location_name": "Red Deer",
      "location_address": "T4N 1L1 - #2 - 7819 50 Avenue",
      "location_quantity": NumberInt(1),
      "location_price": 32,
      "product_id": NumberInt(44),
      "product_image": "resources\/VHT\/products\/44\/FT_logo.jpg",
      "product_name": "VHT-Logo-FT<br>Laminated contour-cut Fair Trade logo<br>Sintra (12 &times; 12 cm) 0.3 cm",
      "tracking_url": "",
      "tracking_number": "",
      "tracking_company": "",
      "date_shipping": ISODate("2013-01-30T10:01:03.0Z"),
      "shipping_status": NumberInt(0)
    }
  ]
});
db.getCollection("tb_order_items").insert({
  "_id": ObjectId("5108f003bd7864d4050000ca"),
  "order_item_id": NumberInt(7),
  "order_id": NumberInt(7),
  "product_id": NumberInt(41),
  "package_type": NumberInt(0),
  "company_id": NumberInt(10004),
  "location_id": NumberInt(10015),
  "product_code": "VHT-Logo-VH",
  "product_description": "Van Houtte Logo",
  "quantity": NumberInt(1),
  "description": "",
  "customization_information": "",
  "width": 24,
  "length": 16,
  "unit": "in",
  "product_size_option": NumberInt(0),
  "current_size_option": NumberInt(0),
  "graphic_file": "resources\/VHT\/products\/41\/200_VH_logo.jpg",
  "graphic_id": NumberInt(0),
  "product_image_option": NumberInt(0),
  "current_image_option": NumberInt(0),
  "custom_image_path": "",
  "original_price": NumberInt(0),
  "discount_price": NumberInt(0),
  "current_price": 32,
  "unit_price": NumberInt(0),
  "status": NumberInt(0),
  "discount_type": NumberInt(0),
  "discount_per_unit": NumberInt(0),
  "net_price": NumberInt(0),
  "extended_amount": NumberInt(0),
  "material_id": NumberInt(2),
  "material_name": "Sintra",
  "material_color": "White",
  "material_thickness_value": 0.3,
  "material_thickness_unit": "cm",
  "total_price": 32,
  "product_text_option": NumberInt(0),
  "current_text_option": NumberInt(0),
  "text": [
    
  ],
  "allocation": [
    {
      "location_id": NumberInt(10015),
      "location_name": "Red Deer",
      "location_address": "T4N 1L1 - #2 - 7819 50 Avenue",
      "location_quantity": NumberInt(1),
      "location_price": 32,
      "product_id": NumberInt(41),
      "product_image": "resources\/VHT\/products\/41\/200_VH_logo.jpg",
      "product_name": "VHT-Logo-VH<br>Van Houtte Logo<br>Sintra (24 &times; 16 in) 0.3 cm",
      "tracking_url": "",
      "tracking_number": "",
      "tracking_company": "",
      "date_shipping": ISODate("2013-01-30T10:03:33.0Z"),
      "shipping_status": NumberInt(0)
    }
  ]
});
db.getCollection("tb_order_items").insert({
  "_id": ObjectId("5108f219bd78643402000058"),
  "order_item_id": NumberInt(8),
  "order_id": NumberInt(8),
  "product_id": NumberInt(44),
  "package_type": NumberInt(0),
  "company_id": NumberInt(10004),
  "location_id": NumberInt(10015),
  "product_code": "VHT-Logo-FT",
  "product_description": "Laminated contour-cut Fair Trade logo",
  "quantity": NumberInt(1),
  "description": "",
  "customization_information": "",
  "width": 12,
  "length": 12,
  "unit": "cm",
  "product_size_option": NumberInt(1),
  "current_size_option": NumberInt(0),
  "graphic_file": "resources\/VHT\/products\/44\/FT_logo.jpg",
  "graphic_id": NumberInt(0),
  "product_image_option": NumberInt(0),
  "current_image_option": NumberInt(0),
  "custom_image_path": "",
  "original_price": NumberInt(0),
  "discount_price": NumberInt(0),
  "current_price": 32,
  "unit_price": NumberInt(0),
  "status": NumberInt(0),
  "discount_type": NumberInt(0),
  "discount_per_unit": NumberInt(0),
  "net_price": NumberInt(0),
  "extended_amount": NumberInt(0),
  "material_id": NumberInt(2),
  "material_name": "Sintra",
  "material_color": "White",
  "material_thickness_value": 0.3,
  "material_thickness_unit": "cm",
  "total_price": 32,
  "product_text_option": NumberInt(0),
  "current_text_option": NumberInt(0),
  "text": [
    
  ],
  "allocation": [
    {
      "location_id": NumberInt(10015),
      "location_name": "Red Deer",
      "location_address": "T4N 1L1 - #2 - 7819 50 Avenue",
      "location_quantity": NumberInt(1),
      "location_price": 32,
      "product_id": NumberInt(44),
      "product_image": "resources\/VHT\/products\/44\/FT_logo.jpg",
      "product_name": "VHT-Logo-FT<br>Laminated contour-cut Fair Trade logo<br>Sintra (12 &times; 12 cm) 0.3 cm",
      "tracking_url": "",
      "tracking_number": "",
      "tracking_company": "",
      "date_shipping": ISODate("2013-01-30T10:12:34.0Z"),
      "shipping_status": NumberInt(0)
    }
  ]
});
db.getCollection("tb_order_items").insert({
  "_id": ObjectId("5108f2f0bd786434020000c1"),
  "order_item_id": NumberInt(9),
  "order_id": NumberInt(9),
  "product_id": NumberInt(42),
  "package_type": NumberInt(0),
  "company_id": NumberInt(10004),
  "location_id": NumberInt(10015),
  "product_code": "VHT-Logo-OE",
  "product_description": "Laminated Orient Express Logo",
  "quantity": NumberInt(5),
  "description": "",
  "customization_information": "",
  "width": 22,
  "length": 9,
  "unit": "cm",
  "product_size_option": NumberInt(0),
  "current_size_option": NumberInt(0),
  "graphic_file": "resources\/VHT\/products\/42\/OE_logo.jpg",
  "graphic_id": NumberInt(0),
  "product_image_option": NumberInt(0),
  "current_image_option": NumberInt(0),
  "custom_image_path": "",
  "original_price": NumberInt(0),
  "discount_price": NumberInt(0),
  "current_price": 32,
  "unit_price": NumberInt(0),
  "status": NumberInt(0),
  "discount_type": NumberInt(0),
  "discount_per_unit": NumberInt(0),
  "net_price": NumberInt(0),
  "extended_amount": NumberInt(0),
  "material_id": NumberInt(2),
  "material_name": "Sintra",
  "material_color": "White",
  "material_thickness_value": 0.3,
  "material_thickness_unit": "cm",
  "total_price": 160,
  "product_text_option": NumberInt(1),
  "current_text_option": NumberInt(1),
  "text": [
    
  ],
  "allocation": [
    {
      "location_id": NumberInt(10015),
      "location_name": "Red Deer",
      "location_address": "#2 - 7819 50 Avenue<br>Red Deer Alberta T4N 1L1 ",
      "location_quantity": NumberInt(5),
      "location_price": 32,
      "product_id": NumberInt(42),
      "product_image": "resources\/VHT\/products\/42\/OE_logo.jpg",
      "product_name": "VHT-Logo-OE<br>Laminated Orient Express Logo<br>Sintra (22 &times; 9 cm) 0.3 cm",
      "tracking_url": "",
      "tracking_number": "",
      "tracking_company": "",
      "date_shipping": ISODate("2013-01-30T10:16:04.0Z"),
      "shipping_status": NumberInt(0)
    }
  ]
});
db.getCollection("tb_order_items").insert({
  "_id": ObjectId("5108f46bbd78643402000143"),
  "order_item_id": NumberInt(10),
  "order_id": NumberInt(10),
  "product_id": NumberInt(42),
  "package_type": NumberInt(0),
  "company_id": NumberInt(10004),
  "location_id": NumberInt(10015),
  "product_code": "VHT-Logo-OE",
  "product_description": "Laminated Orient Express Logo",
  "quantity": NumberInt(5),
  "description": "",
  "customization_information": "",
  "width": 22,
  "length": 9,
  "unit": "cm",
  "product_size_option": NumberInt(0),
  "current_size_option": NumberInt(0),
  "graphic_file": "resources\/VHT\/products\/42\/OE_logo.jpg",
  "graphic_id": NumberInt(0),
  "product_image_option": NumberInt(0),
  "current_image_option": NumberInt(0),
  "custom_image_path": "",
  "original_price": NumberInt(0),
  "discount_price": NumberInt(0),
  "current_price": 32,
  "unit_price": NumberInt(0),
  "status": NumberInt(0),
  "discount_type": NumberInt(0),
  "discount_per_unit": NumberInt(0),
  "net_price": NumberInt(0),
  "extended_amount": NumberInt(0),
  "material_id": NumberInt(2),
  "material_name": "Sintra",
  "material_color": "White",
  "material_thickness_value": 0.3,
  "material_thickness_unit": "cm",
  "total_price": 160,
  "product_text_option": NumberInt(1),
  "current_text_option": NumberInt(1),
  "text": [
    
  ],
  "allocation": [
    {
      "location_id": NumberInt(10015),
      "location_name": "Red Deer",
      "location_address": "#2 - 7819 50 Avenue<br>Red Deer Alberta T4N 1L1 ",
      "location_quantity": NumberInt(5),
      "location_price": 32,
      "product_id": NumberInt(42),
      "product_image": "resources\/VHT\/products\/42\/OE_logo.jpg",
      "product_name": "VHT-Logo-OE<br>Laminated Orient Express Logo<br>Sintra (22 &times; 9 cm) 0.3 cm",
      "tracking_url": "",
      "tracking_number": "",
      "tracking_company": "",
      "date_shipping": null,
      "shipping_status": NumberInt(0)
    }
  ]
});
db.getCollection("tb_order_items").insert({
  "_id": ObjectId("510a21969c7684393a000138"),
  "order_item_id": NumberInt(11),
  "order_id": NumberInt(11),
  "product_id": NumberInt(42),
  "package_type": NumberInt(0),
  "company_id": NumberInt(10004),
  "location_id": NumberInt(10015),
  "product_code": "VHT-Logo-OE",
  "product_description": "Laminated Orient Express Logo",
  "quantity": NumberInt(3),
  "description": "",
  "customization_information": "",
  "width": 22,
  "length": 9,
  "unit": "cm",
  "product_size_option": NumberInt(0),
  "current_size_option": NumberInt(0),
  "graphic_file": "resources\/VHT\/products\/42\/OE_logo.jpg",
  "graphic_id": NumberInt(0),
  "product_image_option": NumberInt(0),
  "current_image_option": NumberInt(0),
  "custom_image_path": "",
  "original_price": NumberInt(0),
  "discount_price": NumberInt(0),
  "current_price": 32,
  "unit_price": NumberInt(0),
  "status": NumberInt(0),
  "discount_type": NumberInt(0),
  "discount_per_unit": NumberInt(0),
  "net_price": NumberInt(0),
  "extended_amount": NumberInt(0),
  "material_id": NumberInt(2),
  "material_name": "Sintra",
  "material_color": "White",
  "material_thickness_value": 0.3,
  "material_thickness_unit": "cm",
  "total_price": 96,
  "product_text_option": NumberInt(1),
  "current_text_option": NumberInt(1),
  "text": [
    
  ],
  "allocation": [
    {
      "location_id": NumberInt(10015),
      "location_name": "Red Deer",
      "location_address": "#2 - 7819 50 Avenue<br>Red Deer Alberta T4N 1L1 ",
      "location_quantity": NumberInt(3),
      "location_price": 32,
      "product_id": NumberInt(42),
      "product_image": "resources\/VHT\/products\/42\/OE_logo.jpg",
      "product_name": "VHT-Logo-OE<br>Laminated Orient Express Logo<br>Sintra (22 &times; 9 cm) 0.3 cm",
      "tracking_url": "",
      "tracking_number": "",
      "tracking_company": "",
      "date_shipping": null,
      "shipping_status": NumberInt(0)
    }
  ]
});
db.getCollection("tb_order_items").insert({
  "_id": ObjectId("510a21f89c7684bc58000184"),
  "order_item_id": NumberInt(12),
  "order_id": NumberInt(12),
  "product_id": NumberInt(44),
  "package_type": NumberInt(0),
  "company_id": NumberInt(10004),
  "location_id": NumberInt(10015),
  "product_code": "VHT-Logo-FT",
  "product_description": "Laminated contour-cut Fair Trade logo",
  "quantity": NumberInt(4),
  "description": "",
  "customization_information": "",
  "width": 12,
  "length": 12,
  "unit": "cm",
  "product_size_option": NumberInt(1),
  "current_size_option": NumberInt(0),
  "graphic_file": "resources\/VHT\/products\/44\/FT_logo.jpg",
  "graphic_id": NumberInt(0),
  "product_image_option": NumberInt(0),
  "current_image_option": NumberInt(0),
  "custom_image_path": "",
  "original_price": NumberInt(0),
  "discount_price": NumberInt(0),
  "current_price": 32,
  "unit_price": NumberInt(0),
  "status": NumberInt(0),
  "discount_type": NumberInt(0),
  "discount_per_unit": NumberInt(0),
  "net_price": NumberInt(0),
  "extended_amount": NumberInt(0),
  "material_id": NumberInt(2),
  "material_name": "Sintra",
  "material_color": "White",
  "material_thickness_value": 0.3,
  "material_thickness_unit": "cm",
  "total_price": 128,
  "product_text_option": NumberInt(0),
  "current_text_option": NumberInt(0),
  "text": [
    
  ],
  "allocation": [
    {
      "location_id": NumberInt(10015),
      "location_name": "Red Deer",
      "location_address": "#2 - 7819 50 Avenue<br>Red Deer Alberta T4N 1L1 ",
      "location_quantity": NumberInt(4),
      "location_price": 32,
      "product_id": NumberInt(44),
      "product_image": "resources\/VHT\/products\/44\/FT_logo.jpg",
      "product_name": "VHT-Logo-FT<br>Laminated contour-cut Fair Trade logo<br>Sintra (12 &times; 12 cm) 0.3 cm",
      "tracking_url": "",
      "tracking_number": "",
      "tracking_company": "",
      "date_shipping": null,
      "shipping_status": NumberInt(0)
    }
  ]
});
db.getCollection("tb_order_items").insert({
  "_id": ObjectId("510a22579c7684103a00019c"),
  "order_item_id": NumberInt(13),
  "order_id": NumberInt(13),
  "product_id": NumberInt(44),
  "package_type": NumberInt(0),
  "company_id": NumberInt(10004),
  "location_id": NumberInt(10004),
  "product_code": "VHT-Logo-FT",
  "product_description": "Laminated contour-cut Fair Trade logo",
  "quantity": NumberInt(3),
  "description": "",
  "customization_information": "",
  "width": 12,
  "length": 12,
  "unit": "cm",
  "product_size_option": NumberInt(1),
  "current_size_option": NumberInt(0),
  "graphic_file": "resources\/VHT\/products\/44\/FT_logo.jpg",
  "graphic_id": NumberInt(0),
  "product_image_option": NumberInt(0),
  "current_image_option": NumberInt(0),
  "custom_image_path": "",
  "original_price": NumberInt(0),
  "discount_price": NumberInt(0),
  "current_price": 32,
  "unit_price": NumberInt(0),
  "status": NumberInt(0),
  "discount_type": NumberInt(0),
  "discount_per_unit": NumberInt(0),
  "net_price": NumberInt(0),
  "extended_amount": NumberInt(0),
  "material_id": NumberInt(2),
  "material_name": "Sintra",
  "material_color": "White",
  "material_thickness_value": 0.3,
  "material_thickness_unit": "cm",
  "total_price": 96,
  "product_text_option": NumberInt(0),
  "current_text_option": NumberInt(0),
  "text": [
    
  ],
  "allocation": [
    {
      "location_id": 10004,
      "location_name": "Calgary",
      "location_address": "Bay 1 2915 - 10th Avenue NE<br>Calgary Alberta T2A 5L4 ",
      "location_quantity": NumberInt(3),
      "location_price": 32,
      "product_id": NumberInt(44),
      "product_image": "resources\/VHT\/products\/44\/FT_logo.jpg",
      "product_name": "VHT-Logo-FT<br>Laminated contour-cut Fair Trade logo<br>Sintra (12 &times; 12 cm) 0.3 cm",
      "tracking_url": "",
      "tracking_number": "",
      "tracking_company": "",
      "date_shipping": null,
      "shipping_status": NumberInt(0)
    }
  ]
});
db.getCollection("tb_order_items").insert({
  "_id": ObjectId("510a276e9c76849454000208"),
  "order_item_id": NumberInt(14),
  "order_id": NumberInt(14),
  "product_id": NumberInt(44),
  "package_type": NumberInt(0),
  "company_id": NumberInt(10004),
  "location_id": NumberInt(10004),
  "product_code": "VHT-Logo-FT",
  "product_description": "Laminated contour-cut Fair Trade logo",
  "quantity": NumberInt(4),
  "description": "",
  "customization_information": "",
  "width": 12,
  "length": 12,
  "unit": "cm",
  "product_size_option": NumberInt(1),
  "current_size_option": NumberInt(0),
  "graphic_file": "resources\/VHT\/products\/44\/FT_logo.jpg",
  "graphic_id": NumberInt(0),
  "product_image_option": NumberInt(0),
  "current_image_option": NumberInt(0),
  "custom_image_path": "",
  "original_price": NumberInt(0),
  "discount_price": NumberInt(0),
  "current_price": 32,
  "unit_price": NumberInt(0),
  "status": NumberInt(0),
  "discount_type": NumberInt(0),
  "discount_per_unit": NumberInt(0),
  "net_price": NumberInt(0),
  "extended_amount": NumberInt(0),
  "material_id": NumberInt(2),
  "material_name": "Sintra",
  "material_color": "White",
  "material_thickness_value": 0.3,
  "material_thickness_unit": "cm",
  "total_price": 128,
  "product_text_option": NumberInt(0),
  "current_text_option": NumberInt(0),
  "text": [
    
  ],
  "allocation": [
    {
      "location_id": 10004,
      "location_name": "Calgary",
      "location_address": "Bay 1 2915 - 10th Avenue NE<br>Calgary Alberta T2A 5L4 ",
      "location_quantity": NumberInt(4),
      "location_price": 32,
      "product_id": NumberInt(44),
      "product_image": "resources\/VHT\/products\/44\/FT_logo.jpg",
      "product_name": "VHT-Logo-FT<br>Laminated contour-cut Fair Trade logo<br>Sintra (12 &times; 12 cm) 0.3 cm",
      "tracking_url": "",
      "tracking_number": "",
      "tracking_company": "",
      "date_shipping": null,
      "shipping_status": NumberInt(0)
    }
  ]
});
db.getCollection("tb_order_items").insert({
  "_id": ObjectId("510a28569c7684103a000250"),
  "order_item_id": NumberInt(15),
  "order_id": NumberInt(15),
  "product_id": NumberInt(44),
  "package_type": NumberInt(0),
  "company_id": NumberInt(10004),
  "location_id": NumberInt(10015),
  "product_code": "VHT-Logo-FT",
  "product_description": "Laminated contour-cut Fair Trade logo",
  "quantity": NumberInt(4),
  "description": "",
  "customization_information": "",
  "width": 12,
  "length": 12,
  "unit": "cm",
  "product_size_option": NumberInt(1),
  "current_size_option": NumberInt(0),
  "graphic_file": "resources\/VHT\/products\/44\/FT_logo.jpg",
  "graphic_id": NumberInt(0),
  "product_image_option": NumberInt(0),
  "current_image_option": NumberInt(0),
  "custom_image_path": "",
  "original_price": NumberInt(0),
  "discount_price": NumberInt(0),
  "current_price": 32,
  "unit_price": NumberInt(0),
  "status": NumberInt(0),
  "discount_type": NumberInt(0),
  "discount_per_unit": NumberInt(0),
  "net_price": NumberInt(0),
  "extended_amount": NumberInt(0),
  "material_id": NumberInt(2),
  "material_name": "Sintra",
  "material_color": "White",
  "material_thickness_value": 0.3,
  "material_thickness_unit": "cm",
  "total_price": 128,
  "product_text_option": NumberInt(0),
  "current_text_option": NumberInt(0),
  "text": [
    
  ],
  "allocation": [
    {
      "location_id": NumberInt(10015),
      "location_name": "Red Deer",
      "location_address": "#2 - 7819 50 Avenue<br>Red Deer Alberta T4N 1L1 ",
      "location_quantity": NumberInt(4),
      "location_price": 32,
      "product_id": NumberInt(44),
      "product_image": "resources\/VHT\/products\/44\/FT_logo.jpg",
      "product_name": "VHT-Logo-FT<br>Laminated contour-cut Fair Trade logo<br>Sintra (12 &times; 12 cm) 0.3 cm",
      "tracking_url": "",
      "tracking_number": "",
      "tracking_company": "",
      "date_shipping": null,
      "shipping_status": NumberInt(0)
    }
  ]
});
db.getCollection("tb_order_items").insert({
  "_id": ObjectId("510a2b559c7684bb580001f6"),
  "order_item_id": NumberInt(16),
  "order_id": NumberInt(16),
  "product_id": NumberInt(41),
  "package_type": NumberInt(0),
  "company_id": NumberInt(10004),
  "location_id": NumberInt(10015),
  "product_code": "VHT-Logo-VH",
  "product_description": "Van Houtte Logo",
  "quantity": NumberInt(5),
  "description": "",
  "customization_information": "",
  "width": 24,
  "length": 16,
  "unit": "in",
  "product_size_option": NumberInt(0),
  "current_size_option": NumberInt(0),
  "graphic_file": "resources\/VHT\/products\/41\/200_VH_logo.jpg",
  "graphic_id": NumberInt(0),
  "product_image_option": NumberInt(0),
  "current_image_option": NumberInt(0),
  "custom_image_path": "",
  "original_price": NumberInt(0),
  "discount_price": NumberInt(0),
  "current_price": 32,
  "unit_price": NumberInt(0),
  "status": NumberInt(0),
  "discount_type": NumberInt(0),
  "discount_per_unit": NumberInt(0),
  "net_price": NumberInt(0),
  "extended_amount": NumberInt(0),
  "material_id": NumberInt(2),
  "material_name": "Sintra",
  "material_color": "White",
  "material_thickness_value": 0.3,
  "material_thickness_unit": "cm",
  "total_price": 160,
  "product_text_option": NumberInt(0),
  "current_text_option": NumberInt(0),
  "text": [
    
  ],
  "allocation": [
    {
      "location_id": NumberInt(10015),
      "location_name": "Red Deer",
      "location_address": "#2 - 7819 50 Avenue<br>Red Deer Alberta T4N 1L1 ",
      "location_quantity": NumberInt(5),
      "location_price": 32,
      "product_id": NumberInt(41),
      "product_image": "resources\/VHT\/products\/41\/200_VH_logo.jpg",
      "product_name": "VHT-Logo-VH<br>Van Houtte Logo<br>Sintra (24 &times; 16 in) 0.3 cm",
      "tracking_url": "",
      "tracking_number": "",
      "tracking_company": "",
      "date_shipping": null,
      "shipping_status": NumberInt(0)
    }
  ]
});
db.getCollection("tb_order_items").insert({
  "_id": ObjectId("510a2cf59c76841b6200000e"),
  "order_item_id": NumberInt(17),
  "order_id": NumberInt(17),
  "product_id": NumberInt(41),
  "package_type": NumberInt(0),
  "company_id": NumberInt(10004),
  "location_id": NumberInt(10019),
  "product_code": "VHT-Logo-VH",
  "product_description": "Van Houtte Logo",
  "quantity": NumberInt(3),
  "description": "",
  "customization_information": "",
  "width": 24,
  "length": 16,
  "unit": "in",
  "product_size_option": NumberInt(0),
  "current_size_option": NumberInt(0),
  "graphic_file": "resources\/VHT\/products\/41\/200_VH_logo.jpg",
  "graphic_id": NumberInt(0),
  "product_image_option": NumberInt(0),
  "current_image_option": NumberInt(0),
  "custom_image_path": "",
  "original_price": NumberInt(0),
  "discount_price": NumberInt(0),
  "current_price": 32,
  "unit_price": NumberInt(0),
  "status": NumberInt(0),
  "discount_type": NumberInt(0),
  "discount_per_unit": NumberInt(0),
  "net_price": NumberInt(0),
  "extended_amount": NumberInt(0),
  "material_id": NumberInt(2),
  "material_name": "Sintra",
  "material_color": "White",
  "material_thickness_value": 0.3,
  "material_thickness_unit": "cm",
  "total_price": 96,
  "product_text_option": NumberInt(0),
  "current_text_option": NumberInt(0),
  "text": [
    
  ],
  "allocation": [
    {
      "location_id": NumberInt(10019),
      "location_name": "Victoria",
      "location_address": "Unit F 511 David Street<br>Victoria Alberta V8C 2C7 ",
      "location_quantity": NumberInt(3),
      "location_price": 32,
      "product_id": NumberInt(41),
      "product_image": "resources\/VHT\/products\/41\/200_VH_logo.jpg",
      "product_name": "VHT-Logo-VH<br>Van Houtte Logo<br>Sintra (24 &times; 16 in) 0.3 cm",
      "tracking_url": "",
      "tracking_number": "",
      "tracking_company": "",
      "date_shipping": null,
      "shipping_status": NumberInt(0)
    }
  ]
});
db.getCollection("tb_order_items").insert({
  "_id": ObjectId("510a31339c7684005b0001e2"),
  "order_item_id": NumberInt(18),
  "order_id": NumberInt(18),
  "product_id": NumberInt(41),
  "package_type": NumberInt(0),
  "company_id": NumberInt(10004),
  "location_id": NumberInt(10004),
  "product_code": "VHT-Logo-VH",
  "product_description": "Van Houtte Logo",
  "quantity": NumberInt(4),
  "description": "",
  "customization_information": "",
  "width": 24,
  "length": 16,
  "unit": "in",
  "product_size_option": NumberInt(0),
  "current_size_option": NumberInt(0),
  "graphic_file": "resources\/VHT\/products\/41\/200_VH_logo.jpg",
  "graphic_id": NumberInt(0),
  "product_image_option": NumberInt(0),
  "current_image_option": NumberInt(0),
  "custom_image_path": "",
  "original_price": NumberInt(0),
  "discount_price": NumberInt(0),
  "current_price": 32,
  "unit_price": NumberInt(0),
  "status": NumberInt(0),
  "discount_type": NumberInt(0),
  "discount_per_unit": NumberInt(0),
  "net_price": NumberInt(0),
  "extended_amount": NumberInt(0),
  "material_id": NumberInt(2),
  "material_name": "Sintra",
  "material_color": "White",
  "material_thickness_value": 0.3,
  "material_thickness_unit": "cm",
  "total_price": 128,
  "product_text_option": NumberInt(0),
  "current_text_option": NumberInt(0),
  "text": [
    
  ],
  "allocation": [
    {
      "location_id": 10004,
      "location_name": "Calgary",
      "location_address": "Bay 1 2915 - 10th Avenue NE<br>Calgary Alberta T2A 5L4 ",
      "location_quantity": NumberInt(4),
      "location_price": 32,
      "product_id": NumberInt(41),
      "product_image": "resources\/VHT\/products\/41\/200_VH_logo.jpg",
      "product_name": "VHT-Logo-VH<br>Van Houtte Logo<br>Sintra (24 &times; 16 in) 0.3 cm",
      "tracking_url": "",
      "tracking_number": "",
      "tracking_company": "",
      "date_shipping": null,
      "shipping_status": NumberInt(0)
    }
  ]
});
db.getCollection("tb_order_items").insert({
  "_id": ObjectId("510a316c9c76841b6200007d"),
  "order_item_id": NumberInt(19),
  "order_id": NumberInt(19),
  "product_id": NumberInt(41),
  "package_type": NumberInt(0),
  "company_id": NumberInt(10004),
  "location_id": NumberInt(10004),
  "product_code": "VHT-Logo-VH",
  "product_description": "Van Houtte Logo",
  "quantity": NumberInt(2),
  "description": "",
  "customization_information": "",
  "width": 24,
  "length": 16,
  "unit": "in",
  "product_size_option": NumberInt(0),
  "current_size_option": NumberInt(0),
  "graphic_file": "resources\/VHT\/products\/41\/200_VH_logo.jpg",
  "graphic_id": NumberInt(0),
  "product_image_option": NumberInt(0),
  "current_image_option": NumberInt(0),
  "custom_image_path": "",
  "original_price": NumberInt(0),
  "discount_price": NumberInt(0),
  "current_price": 32,
  "unit_price": NumberInt(0),
  "status": NumberInt(0),
  "discount_type": NumberInt(0),
  "discount_per_unit": NumberInt(0),
  "net_price": NumberInt(0),
  "extended_amount": NumberInt(0),
  "material_id": NumberInt(2),
  "material_name": "Sintra",
  "material_color": "White",
  "material_thickness_value": 0.3,
  "material_thickness_unit": "cm",
  "total_price": 64,
  "product_text_option": NumberInt(0),
  "current_text_option": NumberInt(0),
  "text": [
    
  ],
  "allocation": [
    {
      "location_id": 10004,
      "location_name": "Calgary",
      "location_address": "Bay 1 2915 - 10th Avenue NE<br>Calgary Alberta T2A 5L4 ",
      "location_quantity": NumberInt(2),
      "location_price": 32,
      "product_id": NumberInt(41),
      "product_image": "resources\/VHT\/products\/41\/200_VH_logo.jpg",
      "product_name": "VHT-Logo-VH<br>Van Houtte Logo<br>Sintra (24 &times; 16 in) 0.3 cm",
      "tracking_url": "",
      "tracking_number": "",
      "tracking_company": "",
      "date_shipping": null,
      "shipping_status": NumberInt(0)
    }
  ]
});

/** tb_order_log records **/
db.getCollection("tb_order_log").insert({
  "_id": ObjectId("510608739c7684d30a00000f"),
  "log_id": NumberInt(1),
  "user_name": "demo_fgl",
  "log_ip": "192.168.0.103",
  "log_url": "\/WorkTraq\/order\/update",
  "log_time": ISODate("2013-01-28T05:11:15.0Z"),
  "log_action": "Submit new Order",
  "log_result": NumberInt(0),
  "log_desc": " - Submit order - New order is created!",
  "order_id": NumberInt(1),
  "is_mail": NumberInt(1),
  "mail_send": false,
  "user_mail": "long@anvyinc.net",
  "order_status": NumberInt(3),
  "po_number": "Test final",
  "company_id": NumberInt(10006),
  "location_id": NumberInt(10000)
});
db.getCollection("tb_order_log").insert({
  "_id": ObjectId("51060c659c7684630a00000f"),
  "log_id": NumberInt(2),
  "user_name": "demo_fgl",
  "log_ip": "192.168.0.103",
  "log_url": "\/WorkTraq\/order\/update",
  "log_time": ISODate("2013-01-28T05:28:05.0Z"),
  "log_action": "Submit new Order",
  "log_result": NumberInt(0),
  "log_desc": " - Submit order - New order is created!",
  "order_id": NumberInt(2),
  "is_mail": NumberInt(1),
  "mail_send": false,
  "user_mail": "long@anvyinc.net",
  "order_status": NumberInt(3),
  "po_number": "Final Yet ?",
  "company_id": NumberInt(10006),
  "location_id": NumberInt(10000)
});
db.getCollection("tb_order_log").insert({
  "_id": ObjectId("51060d3f9c7684f60c0000a6"),
  "log_id": NumberInt(3),
  "user_name": "demo_fgl",
  "log_ip": "192.168.0.103",
  "log_url": "\/WorkTraq\/order\/update",
  "log_time": ISODate("2013-01-28T05:31:43.0Z"),
  "log_action": "Submit new Order",
  "log_result": NumberInt(0),
  "log_desc": " - Submit order - New order is created!",
  "order_id": NumberInt(3),
  "is_mail": NumberInt(1),
  "mail_send": false,
  "user_mail": "long@anvyinc.net",
  "order_status": NumberInt(3),
  "po_number": "Check Send Email",
  "company_id": NumberInt(10006),
  "location_id": NumberInt(10000)
});
db.getCollection("tb_order_log").insert({
  "_id": ObjectId("51060f57bd7864b411000189"),
  "log_id": NumberInt(4),
  "user_name": "demo_fgl",
  "log_ip": "127.0.0.1",
  "log_url": "\/order\/update",
  "log_time": ISODate("2013-01-28T05:40:39.0Z"),
  "log_action": "Submit new Order",
  "log_result": NumberInt(0),
  "log_desc": " - Submit order - New order is created!",
  "order_id": NumberInt(4),
  "is_mail": NumberInt(1),
  "mail_send": false,
  "user_mail": "long@anvyinc.net",
  "order_status": NumberInt(3),
  "po_number": "Check Send Email ",
  "company_id": NumberInt(10006),
  "location_id": NumberInt(10000)
});
db.getCollection("tb_order_log").insert({
  "_id": ObjectId("510619b99c76843e0f000021"),
  "log_id": NumberInt(5),
  "user_name": "demo_vht",
  "log_ip": "192.168.0.103",
  "log_url": "\/WorkTraq\/order\/update",
  "log_time": ISODate("2013-01-28T06:24:57.0Z"),
  "log_action": "Submit new Order",
  "log_result": NumberInt(0),
  "log_desc": " - Submit order  - New order is created!",
  "order_id": NumberInt(5),
  "is_mail": NumberInt(1),
  "mail_send": true,
  "user_mail": "long@anvyinc.net",
  "order_status": NumberInt(3),
  "po_number": "Test Van Hottge",
  "company_id": NumberInt(10004),
  "location_id": NumberInt(10004)
});
db.getCollection("tb_order_log").insert({
  "_id": ObjectId("510630dd9c7684a213000017"),
  "log_id": NumberInt(6),
  "user_name": "demo_vht1",
  "log_ip": "192.168.0.102",
  "log_url": "\/WorkTraq\/order\/update",
  "log_time": ISODate("2013-01-28T08:03:41.0Z"),
  "log_action": "Save new Order Only",
  "log_result": NumberInt(0),
  "log_desc": " - Save order only - New order is created!",
  "order_id": NumberInt(6),
  "is_mail": NumberInt(0),
  "mail_send": NumberInt(0),
  "user_mail": "test@anvyinc.com",
  "order_status": NumberInt(1),
  "po_number": "PO Test2801- 01",
  "company_id": NumberInt(10004),
  "location_id": NumberInt(10015)
});
db.getCollection("tb_order_log").insert({
  "_id": ObjectId("5106342d9c76843613000080"),
  "log_id": NumberInt(7),
  "user_name": "demo_vht1",
  "log_ip": "192.168.0.102",
  "log_url": "\/WorkTraq\/order\/update",
  "log_time": ISODate("2013-01-28T08:17:49.0Z"),
  "log_action": "Update order",
  "log_result": NumberInt(0),
  "log_desc": " - Submit order",
  "order_id": NumberInt(6),
  "is_mail": NumberInt(1),
  "mail_send": true,
  "user_mail": "test@anvyinc.com",
  "order_status": NumberInt(3),
  "po_number": "PO Test2801- 01",
  "company_id": NumberInt(10004),
  "location_id": NumberInt(10015)
});
db.getCollection("tb_order_log").insert({
  "_id": ObjectId("5107b21b9c76849d0400006d"),
  "log_id": NumberInt(8),
  "user_name": "demo_vht",
  "log_ip": "192.168.0.103",
  "log_url": "\/WorkTraq\/order\/update",
  "log_time": ISODate("2013-01-29T11:27:23.0Z"),
  "log_action": "Save new Order Only",
  "log_result": NumberInt(0),
  "log_desc": " - Save order only - New order is created!",
  "order_id": NumberInt(1),
  "is_mail": NumberInt(0),
  "mail_send": NumberInt(0),
  "user_mail": "long@anvyinc.com",
  "order_status": NumberInt(1),
  "po_number": "Test PO#1",
  "company_id": NumberInt(10004),
  "location_id": NumberInt(10004)
});
db.getCollection("tb_order_log").insert({
  "_id": ObjectId("5107b23b9c76841305000045"),
  "log_id": NumberInt(9),
  "user_name": "demo_vht",
  "log_ip": "192.168.0.103",
  "log_url": "\/WorkTraq\/order\/update",
  "log_time": ISODate("2013-01-29T11:27:55.0Z"),
  "log_action": "Update order",
  "log_result": NumberInt(0),
  "log_desc": " - Submit order but require approve",
  "order_id": NumberInt(1),
  "is_mail": NumberInt(1),
  "mail_send": true,
  "user_mail": "long@anvyinc.com",
  "order_status": NumberInt(2),
  "po_number": "Test PO#1",
  "company_id": NumberInt(10004),
  "location_id": NumberInt(10004)
});
db.getCollection("tb_order_log").insert({
  "_id": ObjectId("5108e1df9c7684c732000043"),
  "log_id": NumberInt(10),
  "user_name": "demo_vht",
  "log_ip": "192.168.0.103",
  "log_url": "\/WorkTraq\/order\/update",
  "log_time": ISODate("2013-01-30T09:03:27.0Z"),
  "log_action": "Submit new Order",
  "log_result": NumberInt(0),
  "log_desc": " - Submit order - New order is created!",
  "order_id": NumberInt(2),
  "is_mail": NumberInt(1),
  "mail_send": true,
  "user_mail": "long@anvyinc.com",
  "order_status": NumberInt(3),
  "po_number": "PO#: 002",
  "company_id": NumberInt(10004),
  "location_id": NumberInt(10004)
});
db.getCollection("tb_order_log").insert({
  "_id": ObjectId("5108e5329c76840632000106"),
  "log_id": NumberInt(11),
  "user_name": "demo_vht1",
  "log_ip": "192.168.0.103",
  "log_url": "\/WorkTraq\/order\/update",
  "log_time": ISODate("2013-01-30T09:17:38.0Z"),
  "log_action": "Save new Order Only",
  "log_result": NumberInt(0),
  "log_desc": " - Save order only - New order is created!",
  "order_id": NumberInt(3),
  "is_mail": NumberInt(0),
  "mail_send": NumberInt(0),
  "user_mail": "test@anvyinc.com",
  "order_status": NumberInt(1),
  "po_number": "PO#: 003",
  "company_id": NumberInt(10004),
  "location_id": NumberInt(10015)
});
db.getCollection("tb_order_log").insert({
  "_id": ObjectId("5108e6999c7684063200011f"),
  "log_id": NumberInt(12),
  "user_name": "demo_vht1",
  "log_ip": "192.168.0.103",
  "log_url": "\/WorkTraq\/order\/update",
  "log_time": ISODate("2013-01-30T09:23:37.0Z"),
  "log_action": "Update order",
  "log_result": NumberInt(0),
  "log_desc": " - Save order only",
  "order_id": NumberInt(3),
  "is_mail": NumberInt(0),
  "mail_send": NumberInt(0),
  "user_mail": "test@anvyinc.com",
  "order_status": NumberInt(1),
  "po_number": "PO#: 003",
  "company_id": NumberInt(10004),
  "location_id": NumberInt(10015)
});
db.getCollection("tb_order_log").insert({
  "_id": ObjectId("5108e6a59c768481050001b5"),
  "log_id": NumberInt(13),
  "user_name": "demo_vht1",
  "log_ip": "192.168.0.103",
  "log_url": "\/WorkTraq\/order\/update",
  "log_time": ISODate("2013-01-30T09:23:49.0Z"),
  "log_action": "Update order",
  "log_result": NumberInt(0),
  "log_desc": " - Submit order",
  "order_id": NumberInt(3),
  "is_mail": NumberInt(1),
  "mail_send": true,
  "user_mail": "test@anvyinc.com",
  "order_status": NumberInt(3),
  "po_number": "PO#: 003",
  "company_id": NumberInt(10004),
  "location_id": NumberInt(10015)
});
db.getCollection("tb_order_log").insert({
  "_id": ObjectId("5108e8cdbd78642012000231"),
  "log_id": NumberInt(14),
  "user_name": "demo_vht1",
  "log_ip": "127.0.0.1",
  "log_url": "\/order\/update",
  "log_time": ISODate("2013-01-30T09:33:01.0Z"),
  "log_action": "Submit new Order",
  "log_result": NumberInt(0),
  "log_desc": " - Submit order - New order is created!",
  "order_id": NumberInt(4),
  "is_mail": NumberInt(1),
  "mail_send": false,
  "user_mail": "test@anvyinc.com",
  "order_status": NumberInt(3),
  "po_number": "Check Send Email",
  "company_id": NumberInt(10004),
  "location_id": NumberInt(10015)
});
db.getCollection("tb_order_log").insert({
  "_id": ObjectId("5108ed8cbd7864b012000073"),
  "log_id": NumberInt(15),
  "user_name": "demo_vht1",
  "log_ip": "127.0.0.1",
  "log_url": "\/order\/update",
  "log_time": ISODate("2013-01-30T09:53:16.0Z"),
  "log_action": "Submit new Order",
  "log_result": NumberInt(0),
  "log_desc": " - Submit order - New order is created!",
  "order_id": NumberInt(5),
  "is_mail": NumberInt(1),
  "mail_send": false,
  "user_mail": "test@anvyinc.com",
  "order_status": NumberInt(3),
  "po_number": "01254",
  "company_id": NumberInt(10004),
  "location_id": NumberInt(10015)
});
db.getCollection("tb_order_log").insert({
  "_id": ObjectId("5108ef75bd7864b0120001b9"),
  "log_id": NumberInt(16),
  "user_name": "demo_vht1",
  "log_ip": "127.0.0.1",
  "log_url": "\/order\/update",
  "log_time": ISODate("2013-01-30T10:01:25.0Z"),
  "log_action": "Submit new Order",
  "log_result": NumberInt(0),
  "log_desc": " - Submit order - New order is created!",
  "order_id": NumberInt(6),
  "is_mail": NumberInt(1),
  "mail_send": false,
  "user_mail": "test@anvyinc.com",
  "order_status": NumberInt(3),
  "po_number": "Check Allocation",
  "company_id": NumberInt(10004),
  "location_id": NumberInt(10015)
});
db.getCollection("tb_order_log").insert({
  "_id": ObjectId("5108f003bd7864d4050000cb"),
  "log_id": NumberInt(17),
  "user_name": "demo_vht1",
  "log_ip": "127.0.0.1",
  "log_url": "\/order\/update",
  "log_time": ISODate("2013-01-30T10:03:47.0Z"),
  "log_action": "Submit new Order",
  "log_result": NumberInt(0),
  "log_desc": " - Submit order - New order is created!",
  "order_id": NumberInt(7),
  "is_mail": NumberInt(1),
  "mail_send": false,
  "user_mail": "test@anvyinc.com",
  "order_status": NumberInt(3),
  "po_number": "check allocation cont",
  "company_id": NumberInt(10004),
  "location_id": NumberInt(10015)
});
db.getCollection("tb_order_log").insert({
  "_id": ObjectId("5108f180bd7864d405000180"),
  "log_id": NumberInt(18),
  "user_name": "demo_vht1",
  "log_ip": "127.0.0.1",
  "log_url": "\/order\/update",
  "log_time": ISODate("2013-01-30T10:10:08.0Z"),
  "log_action": "Save new Order Only",
  "log_result": NumberInt(1),
  "log_desc": " - Save order onlyThat PO Number has been in other order: #7 - Order Ref: 1245 - Create: 30-Jan-2013 - by: demo_vht1. For that, this order's status will not submitted",
  "order_id": NumberInt(7),
  "is_mail": NumberInt(0),
  "mail_send": NumberInt(0),
  "user_mail": "test@anvyinc.com",
  "order_status": NumberInt(1),
  "po_number": "check allocation cont",
  "company_id": NumberInt(10004),
  "location_id": NumberInt(10015)
});
db.getCollection("tb_order_log").insert({
  "_id": ObjectId("5108f219bd78643402000059"),
  "log_id": NumberInt(19),
  "user_name": "demo_vht1",
  "log_ip": "127.0.0.1",
  "log_url": "\/order\/update",
  "log_time": ISODate("2013-01-30T10:12:41.0Z"),
  "log_action": "Submit new Order",
  "log_result": NumberInt(0),
  "log_desc": " - Submit order - New order is created!",
  "order_id": NumberInt(8),
  "is_mail": NumberInt(1),
  "mail_send": false,
  "user_mail": "test@anvyinc.com",
  "order_status": NumberInt(3),
  "po_number": "check allocation cont 2",
  "company_id": NumberInt(10004),
  "location_id": NumberInt(10015)
});
db.getCollection("tb_order_log").insert({
  "_id": ObjectId("5108f2f0bd786434020000c2"),
  "log_id": NumberInt(20),
  "user_name": "demo_vht1",
  "log_ip": "127.0.0.1",
  "log_url": "\/order\/update",
  "log_time": ISODate("2013-01-30T10:16:16.0Z"),
  "log_action": "Submit new Order",
  "log_result": NumberInt(0),
  "log_desc": " - Submit order - New order is created!",
  "order_id": NumberInt(9),
  "is_mail": NumberInt(1),
  "mail_send": false,
  "user_mail": "test@anvyinc.com",
  "order_status": NumberInt(3),
  "po_number": "check allocation cont 3",
  "company_id": NumberInt(10004),
  "location_id": NumberInt(10015)
});
db.getCollection("tb_order_log").insert({
  "_id": ObjectId("5108f46bbd78643402000144"),
  "log_id": NumberInt(21),
  "user_name": "demo_vht1",
  "log_ip": "127.0.0.1",
  "log_url": "\/order\/update",
  "log_time": ISODate("2013-01-30T10:22:35.0Z"),
  "log_action": "Submit new Order",
  "log_result": NumberInt(0),
  "log_desc": " - Submit order - New order is created!",
  "order_id": NumberInt(10),
  "is_mail": NumberInt(1),
  "mail_send": false,
  "user_mail": "test@anvyinc.com",
  "order_status": NumberInt(3),
  "po_number": "check allocation cont 4",
  "company_id": NumberInt(10004),
  "location_id": NumberInt(10015)
});
db.getCollection("tb_order_log").insert({
  "_id": ObjectId("510a21159c768470380001f8"),
  "log_id": NumberInt(22),
  "user_name": "demo_vht1",
  "log_ip": "192.168.0.103",
  "log_url": "\/WorkTraq\/order\/update",
  "log_time": ISODate("2013-01-31T07:45:25.0Z"),
  "log_action": "Update order",
  "log_result": NumberInt(0),
  "log_desc": " - Save order only",
  "order_id": NumberInt(10),
  "is_mail": NumberInt(0),
  "mail_send": NumberInt(0),
  "user_mail": "test@anvyinc.com",
  "order_status": NumberInt(1),
  "po_number": "check allocation cont 4",
  "company_id": NumberInt(10004),
  "location_id": NumberInt(10015)
});
db.getCollection("tb_order_log").insert({
  "_id": ObjectId("510a211f9c76847038000222"),
  "log_id": NumberInt(23),
  "user_name": "demo_vht1",
  "log_ip": "192.168.0.103",
  "log_url": "\/WorkTraq\/order\/update",
  "log_time": ISODate("2013-01-31T07:45:35.0Z"),
  "log_action": "Update order",
  "log_result": NumberInt(0),
  "log_desc": " - Submit order",
  "order_id": NumberInt(10),
  "is_mail": NumberInt(1),
  "mail_send": true,
  "user_mail": "test@anvyinc.com",
  "order_status": NumberInt(3),
  "po_number": "check allocation cont 4",
  "company_id": NumberInt(10004),
  "location_id": NumberInt(10015)
});
db.getCollection("tb_order_log").insert({
  "_id": ObjectId("510a21969c7684393a000139"),
  "log_id": NumberInt(24),
  "user_name": "demo_vht1",
  "log_ip": "192.168.0.103",
  "log_url": "\/WorkTraq\/order\/update",
  "log_time": ISODate("2013-01-31T07:47:34.0Z"),
  "log_action": "Submit new Order",
  "log_result": NumberInt(0),
  "log_desc": " - Submit order  - New order is created!",
  "order_id": NumberInt(11),
  "is_mail": NumberInt(1),
  "mail_send": true,
  "user_mail": "test@anvyinc.com",
  "order_status": NumberInt(3),
  "po_number": "Test Pending",
  "company_id": NumberInt(10004),
  "location_id": NumberInt(10015)
});
db.getCollection("tb_order_log").insert({
  "_id": ObjectId("510a21f89c7684bc58000185"),
  "log_id": NumberInt(25),
  "user_name": "demo_vht1",
  "log_ip": "192.168.0.103",
  "log_url": "\/WorkTraq\/order\/update",
  "log_time": ISODate("2013-01-31T07:49:12.0Z"),
  "log_action": "Submit new Order",
  "log_result": NumberInt(0),
  "log_desc": " - Submit order  - New order is created!",
  "order_id": NumberInt(12),
  "is_mail": NumberInt(1),
  "mail_send": true,
  "user_mail": "test@anvyinc.com",
  "order_status": NumberInt(3),
  "po_number": "telks",
  "company_id": NumberInt(10004),
  "location_id": NumberInt(10015)
});
db.getCollection("tb_order_log").insert({
  "_id": ObjectId("510a22579c7684103a00019d"),
  "log_id": NumberInt(26),
  "user_name": "demo_vht",
  "log_ip": "192.168.0.103",
  "log_url": "\/WorkTraq\/order\/update",
  "log_time": ISODate("2013-01-31T07:50:47.0Z"),
  "log_action": "Submit new Order",
  "log_result": NumberInt(0),
  "log_desc": " - Submit order - New order is created!",
  "order_id": NumberInt(13),
  "is_mail": NumberInt(1),
  "mail_send": true,
  "user_mail": "long@anvyinc.com",
  "order_status": NumberInt(3),
  "po_number": "Test $5",
  "company_id": NumberInt(10004),
  "location_id": NumberInt(10004)
});
db.getCollection("tb_order_log").insert({
  "_id": ObjectId("510a276e9c76849454000209"),
  "log_id": NumberInt(27),
  "user_name": "demo_vht",
  "log_ip": "192.168.0.107",
  "log_url": "\/WorkTraq\/order\/update",
  "log_time": ISODate("2013-01-31T08:12:30.0Z"),
  "log_action": "Submit Pending new Order",
  "log_result": NumberInt(0),
  "log_desc": " - Submit order but require approve - New order is created!",
  "order_id": NumberInt(14),
  "is_mail": NumberInt(1),
  "mail_send": true,
  "user_mail": "long@anvyinc.com",
  "order_status": NumberInt(2),
  "po_number": "PO Pending #1",
  "company_id": NumberInt(10004),
  "location_id": NumberInt(10004)
});
db.getCollection("tb_order_log").insert({
  "_id": ObjectId("510a28569c7684103a000251"),
  "log_id": NumberInt(28),
  "user_name": "demo_vht1",
  "log_ip": "192.168.0.103",
  "log_url": "\/WorkTraq\/order\/update",
  "log_time": ISODate("2013-01-31T08:16:22.0Z"),
  "log_action": "Save new Order Only",
  "log_result": NumberInt(0),
  "log_desc": " - Save order only - New order is created!",
  "order_id": NumberInt(15),
  "is_mail": NumberInt(0),
  "mail_send": NumberInt(0),
  "user_mail": "test@anvyinc.com",
  "order_status": NumberInt(1),
  "po_number": "Test Pending #2",
  "company_id": NumberInt(10004),
  "location_id": NumberInt(10015)
});
db.getCollection("tb_order_log").insert({
  "_id": ObjectId("510a285e9c7684103a00027b"),
  "log_id": NumberInt(29),
  "user_name": "demo_vht1",
  "log_ip": "192.168.0.103",
  "log_url": "\/WorkTraq\/order\/update",
  "log_time": ISODate("2013-01-31T08:16:30.0Z"),
  "log_action": "Update order",
  "log_result": NumberInt(0),
  "log_desc": " - Submit order but require approve",
  "order_id": NumberInt(15),
  "is_mail": NumberInt(1),
  "mail_send": true,
  "user_mail": "test@anvyinc.com",
  "order_status": NumberInt(2),
  "po_number": "Test Pending #2",
  "company_id": NumberInt(10004),
  "location_id": NumberInt(10015)
});
db.getCollection("tb_order_log").insert({
  "_id": ObjectId("510a2b559c7684bb580001f7"),
  "log_id": NumberInt(30),
  "user_name": "demo_vht1",
  "log_ip": "192.168.0.103",
  "log_url": "\/WorkTraq\/order\/update",
  "log_time": ISODate("2013-01-31T08:29:09.0Z"),
  "log_action": "Submit Pending new Order",
  "log_result": NumberInt(0),
  "log_desc": " - Submit order but require approve - New order is created!",
  "order_id": NumberInt(16),
  "is_mail": NumberInt(1),
  "mail_send": true,
  "user_mail": "test@anvyinc.com",
  "order_status": NumberInt(2),
  "po_number": "Test Pending #3",
  "company_id": NumberInt(10004),
  "location_id": NumberInt(10015)
});
db.getCollection("tb_order_log").insert({
  "_id": ObjectId("510a2cf59c76841b6200000f"),
  "log_id": NumberInt(31),
  "user_name": "bryan.baxter",
  "log_ip": "192.168.0.103",
  "log_url": "\/WorkTraq\/order\/update",
  "log_time": ISODate("2013-01-31T08:36:05.0Z"),
  "log_action": "Save new Order Only",
  "log_result": NumberInt(0),
  "log_desc": " - Save order only - New order is created!",
  "order_id": NumberInt(17),
  "is_mail": NumberInt(0),
  "mail_send": NumberInt(0),
  "user_mail": "test@anvyinc.com",
  "order_status": NumberInt(1),
  "po_number": "Test Pending #4",
  "company_id": NumberInt(10004),
  "location_id": NumberInt(10019)
});
db.getCollection("tb_order_log").insert({
  "_id": ObjectId("510a2cfb9c76841b62000039"),
  "log_id": NumberInt(32),
  "user_name": "bryan.baxter",
  "log_ip": "192.168.0.103",
  "log_url": "\/WorkTraq\/order\/update",
  "log_time": ISODate("2013-01-31T08:36:11.0Z"),
  "log_action": "Update order",
  "log_result": NumberInt(0),
  "log_desc": " - Submit order but require approve",
  "order_id": NumberInt(17),
  "is_mail": NumberInt(1),
  "mail_send": true,
  "user_mail": "test@anvyinc.com",
  "order_status": NumberInt(2),
  "po_number": "Test Pending #4",
  "company_id": NumberInt(10004),
  "location_id": NumberInt(10019)
});
db.getCollection("tb_order_log").insert({
  "_id": ObjectId("510a2e539c76841662000056"),
  "log_id": NumberInt(33),
  "user_name": "demo_vht",
  "log_ip": "192.168.0.103",
  "log_url": "\/WorkTraq\/order\/update",
  "log_time": ISODate("2013-01-31T08:41:55.0Z"),
  "log_action": "Update order",
  "log_result": NumberInt(0),
  "log_desc": " - Submit order",
  "order_id": NumberInt(14),
  "is_mail": NumberInt(1),
  "mail_send": true,
  "user_mail": "long@anvyinc.com",
  "order_status": NumberInt(3),
  "po_number": "PO Pending #1",
  "company_id": NumberInt(10004),
  "location_id": NumberInt(10004)
});
db.getCollection("tb_order_log").insert({
  "_id": ObjectId("510a2e929c7684c25d000188"),
  "log_id": NumberInt(34),
  "user_name": "demo_vht",
  "log_ip": "192.168.0.103",
  "log_url": "\/WorkTraq\/order\/update",
  "log_time": ISODate("2013-01-31T08:42:58.0Z"),
  "log_action": "Update order",
  "log_result": NumberInt(0),
  "log_desc": " - Submit order",
  "order_id": NumberInt(15),
  "is_mail": NumberInt(1),
  "mail_send": true,
  "user_mail": "long@anvyinc.com",
  "order_status": NumberInt(3),
  "po_number": "Test Pending #2",
  "company_id": NumberInt(10004),
  "location_id": NumberInt(10015)
});
db.getCollection("tb_order_log").insert({
  "_id": ObjectId("510a31339c7684005b0001e3"),
  "log_id": NumberInt(35),
  "user_name": "demo_vht",
  "log_ip": "192.168.0.103",
  "log_url": "\/WorkTraq\/order\/update",
  "log_time": ISODate("2013-01-31T08:54:11.0Z"),
  "log_action": "Save new Order Only",
  "log_result": NumberInt(0),
  "log_desc": " - Save order only - New order is created!",
  "order_id": NumberInt(18),
  "is_mail": NumberInt(0),
  "mail_send": NumberInt(0),
  "user_mail": "long@anvyinc.com",
  "order_status": NumberInt(1),
  "po_number": "Test Pending #5",
  "company_id": NumberInt(10004),
  "location_id": NumberInt(10004)
});
db.getCollection("tb_order_log").insert({
  "_id": ObjectId("510a31399c7684005b00020d"),
  "log_id": NumberInt(36),
  "user_name": "demo_vht",
  "log_ip": "192.168.0.103",
  "log_url": "\/WorkTraq\/order\/update",
  "log_time": ISODate("2013-01-31T08:54:17.0Z"),
  "log_action": "Update order",
  "log_result": NumberInt(0),
  "log_desc": " - Submit order",
  "order_id": NumberInt(18),
  "is_mail": NumberInt(1),
  "mail_send": true,
  "user_mail": "long@anvyinc.com",
  "order_status": NumberInt(3),
  "po_number": "Test Pending #5",
  "company_id": NumberInt(10004),
  "location_id": NumberInt(10004)
});
db.getCollection("tb_order_log").insert({
  "_id": ObjectId("510a316c9c76841b6200007e"),
  "log_id": NumberInt(37),
  "user_name": "demo_vht",
  "log_ip": "192.168.0.103",
  "log_url": "\/WorkTraq\/order\/update",
  "log_time": ISODate("2013-01-31T08:55:08.0Z"),
  "log_action": "Submit new Order",
  "log_result": NumberInt(0),
  "log_desc": " - Submit order - New order is created!",
  "order_id": NumberInt(19),
  "is_mail": NumberInt(1),
  "mail_send": true,
  "user_mail": "long@anvyinc.com",
  "order_status": NumberInt(3),
  "po_number": "Test Pending #6",
  "company_id": NumberInt(10004),
  "location_id": NumberInt(10004)
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
  "product_detail": "Angie Bannerstand",
  "product_id": NumberInt(45),
  "product_note": "",
  "product_sku": "VHT-Angie850",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/VHT\/products\/45\/",
  "short_description": "Angie Bannerstand",
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
  "long_description": "ADAGIO Standard 5-Line Menuboard",
  "map_content": [
    
  ],
  "material": [
    {
      "id": NumberInt(2),
      "name": "Sintra",
      "color": "White",
      "width": 22.5,
      "length": NumberInt(9),
      "thick": 0.3,
      "uthick": "cm",
      "usize": "in",
      "price": NumberInt(45),
      "size": NumberInt(0),
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(5),
      "name": "Styrene",
      "color": "Black",
      "width": 22.5,
      "length": NumberInt(9),
      "thick": 0.02,
      "uthick": "in",
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
  "product_detail": "Standard 5-Line Adagio menuboard.\r\nMaterial option: 020 Styrene or 3mm Sintra\r\nMounting included: doubled-sided tape \r\nPrice kit: not included, must be ordered separately",
  "product_id": NumberInt(15),
  "product_note": "",
  "product_sku": "VHT - 0005",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/VHT\/products\/15\/",
  "short_description": "ADAGIO Standard 5-Line Menuboard",
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
  "sold_by": NumberInt(0),
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

/** tb_product_images records **/
db.getCollection("tb_product_images").insert({
  "_id": ObjectId("50ea9dca9c7684a50700004d"),
  "product_images_id": NumberInt(1),
  "product_id": NumberInt(39),
  "company_id": NumberInt(10006),
  "location_id": NumberInt(10000),
  "map_content": [
    
  ],
  "map_images": [
    
  ],
  "product_image": "Penguins.jpg",
  "low_res_image": "200_Penguins.jpg",
  "image_size": NumberInt(777835),
  "image_type": NumberInt(0),
  "image_width": NumberInt(1024),
  "image_height": NumberInt(768),
  "saved_dir": "resources\/FGL\/products\/39\/",
  "status": NumberInt(0),
  "hot_spot": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0),
  "date_created": ISODate("2013-01-07T10:04:58.0Z")
});
db.getCollection("tb_product_images").insert({
  "_id": ObjectId("50ea9dca9c7684a50700005d"),
  "company_id": NumberInt(10006),
  "date_created": ISODate("2013-01-07T10:04:58.0Z"),
  "hot_spot": NumberInt(1),
  "image_height": NumberInt(768),
  "image_size": NumberInt(620888),
  "image_type": NumberInt(0),
  "image_width": NumberInt(1024),
  "location_area": "",
  "location_id": NumberInt(10000),
  "low_res_image": "200_Tulips - Copy.jpg",
  "map_content": [
    {
      "product_id": NumberInt(37),
      "product_image": "resources\/FGL\/products\/200_SCF11_252_Snowboard_45x28_Sims_02.jpg",
      "product_name": "FGL-SNOWBPOP-011",
      "product_url": "catalogue\/37\/info",
      "map_shape": "poly",
      "map_coords": "83,153,180,68,228,165,118,224,113,222",
      "map_key": "OV"
    },
    {
      "product_id": NumberInt(36),
      "product_image": "resources\/FGL\/products\/200_SCF11_252_Snowboard_45x28_Sims_01.jpg",
      "product_name": "FGL-SNOWBPOP-010",
      "product_url": "catalogue\/36\/info",
      "map_shape": "circle",
      "map_coords": "663,250,86",
      "map_key": "LT"
    },
    {
      "product_id": NumberInt(35),
      "product_image": "resources\/FGL\/products\/200_SCF11_252_Snowboard_45x28_Ride_02.jpg",
      "product_name": "FGL-SNOWBPOP-009",
      "product_url": "catalogue\/35\/info",
      "map_shape": "rect",
      "map_coords": "142,292,334,371",
      "map_key": "VR"
    }
  ],
  "map_images": {
    "image": "resources\/FGL\/products\/39\/800_Tulips - Copy.jpg",
    "image1": "resources\/FGL\/products\/39\/map1_800_Tulips - Copy.jpg",
    "image2": "resources\/FGL\/products\/39\/map2_800_Tulips - Copy.jpg"
  },
  "product_id": NumberInt(39),
  "product_image": "Tulips - Copy.jpg",
  "product_images_id": NumberInt(2),
  "saved_dir": "resources\/FGL\/products\/39\/",
  "status": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0)
});
db.getCollection("tb_product_images").insert({
  "_id": ObjectId("50f4b6a09c76848806000087"),
  "product_images_id": NumberInt(3),
  "product_id": NumberInt(0),
  "company_id": NumberInt(10006),
  "location_id": NumberInt(10000),
  "area_id": NumberInt(1),
  "location_area": "",
  "map_content": [
    
  ],
  "map_images": [
    
  ],
  "product_image": "department-footware-1.jpg",
  "low_res_image": "200_department-footware-1.jpg",
  "image_size": NumberInt(1896740),
  "image_type": NumberInt(2),
  "image_width": NumberInt(3264),
  "image_height": NumberInt(2448),
  "saved_dir": "resources\/FGL\/signage_layout\/1\/",
  "status": NumberInt(0),
  "hot_spot": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0),
  "date_created": ISODate("2013-01-15T01:53:36.0Z")
});
db.getCollection("tb_product_images").insert({
  "_id": ObjectId("50f4b6a59c76844d0500003f"),
  "area_id": NumberInt(1),
  "company_id": NumberInt(10006),
  "date_created": ISODate("2013-01-15T01:53:41.0Z"),
  "hot_spot": NumberInt(1),
  "image_height": NumberInt(2448),
  "image_size": NumberInt(1805470),
  "image_type": NumberInt(2),
  "image_width": NumberInt(3264),
  "location_area": "",
  "location_id": NumberInt(10000),
  "low_res_image": "200_department-footware-2.jpg",
  "map_content": [
    {
      "product_id": NumberInt(40),
      "product_image": "resources\/FGL\/products\/200_SCF11_252_Snowboard_45x28_Ride_01.jpg",
      "product_name": "FGL-SNOWBPOP-008",
      "product_url": "catalogue\/40\/info",
      "map_shape": "rect",
      "map_coords": "0,0,0,0",
      "map_key": "BWL"
    },
    {
      "product_id": NumberInt(37),
      "product_image": "resources\/FGL\/products\/200_SCF11_252_Snowboard_45x28_Sims_02.jpg",
      "product_name": "FGL-SNOWBPOP-011",
      "product_url": "catalogue\/37\/info",
      "map_shape": "rect",
      "map_coords": "436,205,638,368",
      "map_key": "IVU"
    },
    {
      "product_id": NumberInt(36),
      "product_image": "resources\/FGL\/products\/200_SCF11_252_Snowboard_45x28_Sims_01.jpg",
      "product_name": "FGL-SNOWBPOP-010",
      "product_url": "catalogue\/36\/info",
      "map_shape": "rect",
      "map_coords": "80,202,295,388",
      "map_key": "UWQ"
    }
  ],
  "map_images": {
    "image": "resources\/FGL\/signage_layout\/1\/800_department-footware-2.jpg",
    "image1": "resources\/FGL\/signage_layout\/1\/map1_800_department-footware-2.jpg",
    "image2": "resources\/FGL\/signage_layout\/1\/map2_800_department-footware-2.jpg"
  },
  "product_id": NumberInt(0),
  "product_image": "department-footware-2.jpg",
  "product_images_id": NumberInt(4),
  "saved_dir": "resources\/FGL\/signage_layout\/1\/",
  "status": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0)
});
db.getCollection("tb_product_images").insert({
  "_id": ObjectId("50f6228d9c76840f07000020"),
  "product_images_id": NumberInt(5),
  "product_id": NumberInt(40),
  "company_id": NumberInt(10006),
  "location_id": NumberInt(1000006),
  "area_id": NumberInt(0),
  "location_area": "",
  "map_content": [
    
  ],
  "map_images": [
    
  ],
  "product_image": "thumbnail_sc05.jpg",
  "low_res_image": "thumbnail_sc05.jpg",
  "image_size": NumberInt(8956),
  "image_type": NumberInt(0),
  "image_width": NumberInt(148),
  "image_height": NumberInt(114),
  "saved_dir": "resources\/FGL\/products\/40\/",
  "status": NumberInt(0),
  "hot_spot": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0),
  "date_created": ISODate("2013-01-16T03:46:21.0Z")
});
db.getCollection("tb_product_images").insert({
  "_id": ObjectId("50f623369c7684050700002f"),
  "product_images_id": NumberInt(6),
  "product_id": NumberInt(40),
  "company_id": NumberInt(10006),
  "location_id": NumberInt(1000006),
  "area_id": NumberInt(0),
  "location_area": "",
  "map_content": [
    
  ],
  "map_images": [
    
  ],
  "product_image": "SCF11_252_Ski_45x28_Atomic_01.jpg",
  "low_res_image": "SCF11_252_Ski_45x28_Atomic_01.jpg",
  "image_size": NumberInt(6331),
  "image_type": NumberInt(0),
  "image_width": NumberInt(148),
  "image_height": NumberInt(92),
  "saved_dir": "resources\/FGL\/products\/40\/",
  "status": NumberInt(0),
  "hot_spot": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0),
  "date_created": ISODate("2013-01-16T03:49:10.0Z")
});
db.getCollection("tb_product_images").insert({
  "_id": ObjectId("50f634fb9c7684660700002f"),
  "product_images_id": NumberInt(7),
  "product_id": NumberInt(40),
  "company_id": NumberInt(10006),
  "location_id": NumberInt(1000006),
  "area_id": NumberInt(0),
  "location_area": "",
  "map_content": [
    
  ],
  "map_images": [
    
  ],
  "product_image": "SCF11_252_Ski_45x28_Atomic_02.jpg",
  "low_res_image": "SCF11_252_Ski_45x28_Atomic_02.jpg",
  "image_size": NumberInt(5721),
  "image_type": NumberInt(0),
  "image_width": NumberInt(148),
  "image_height": NumberInt(92),
  "saved_dir": "resources\/FGL\/products\/40\/",
  "status": NumberInt(0),
  "hot_spot": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0),
  "date_created": ISODate("2013-01-16T05:04:59.0Z")
});

/** tb_province records **/
db.getCollection("tb_province").insert({
  "_id": ObjectId("50aa00e03d5e55180c000224"),
  "province_id": NumberInt(1),
  "province_name": "Alberta",
  "province_key": "AB",
  "province_status": NumberInt(0),
  "province_order": NumberInt(1),
  "country_id": NumberInt(15)
});
db.getCollection("tb_province").insert({
  "_id": ObjectId("50aa00e03d5e55180c000225"),
  "province_id": NumberInt(2),
  "province_name": "British Columbia",
  "province_key": "BC",
  "province_status": NumberInt(0),
  "province_order": NumberInt(2),
  "country_id": NumberInt(15)
});
db.getCollection("tb_province").insert({
  "_id": ObjectId("50aa00e03d5e55180c000226"),
  "province_id": NumberInt(3),
  "province_name": "Manitoba",
  "province_key": "MB",
  "province_status": NumberInt(0),
  "province_order": NumberInt(3),
  "country_id": NumberInt(15)
});
db.getCollection("tb_province").insert({
  "_id": ObjectId("50aa00e03d5e55180c000227"),
  "province_id": NumberInt(4),
  "province_name": "New Brunswick",
  "province_key": "NB",
  "province_status": NumberInt(0),
  "province_order": NumberInt(4),
  "country_id": NumberInt(15)
});
db.getCollection("tb_province").insert({
  "_id": ObjectId("50aa00e03d5e55180c000228"),
  "province_id": NumberInt(5),
  "province_name": "Newfoundland-Labrador",
  "province_key": "NL",
  "province_status": NumberInt(0),
  "province_order": NumberInt(5),
  "country_id": NumberInt(15)
});
db.getCollection("tb_province").insert({
  "_id": ObjectId("50aa00e03d5e55180c000229"),
  "province_id": NumberInt(6),
  "province_name": "Northwest Territories",
  "province_key": "NT",
  "province_status": NumberInt(0),
  "province_order": NumberInt(6),
  "country_id": NumberInt(15)
});
db.getCollection("tb_province").insert({
  "_id": ObjectId("50aa00e03d5e55180c00022a"),
  "province_id": NumberInt(7),
  "province_name": "Nova Scotia",
  "province_key": "NS",
  "province_status": NumberInt(0),
  "province_order": NumberInt(7),
  "country_id": NumberInt(15)
});
db.getCollection("tb_province").insert({
  "_id": ObjectId("50aa00e03d5e55180c00022b"),
  "province_id": NumberInt(8),
  "province_name": "Nunavut",
  "province_key": "NU",
  "province_status": NumberInt(0),
  "province_order": NumberInt(8),
  "country_id": NumberInt(15)
});
db.getCollection("tb_province").insert({
  "_id": ObjectId("50aa00e03d5e55180c00022c"),
  "province_id": NumberInt(9),
  "province_name": "Ontario",
  "province_key": "ON",
  "province_status": NumberInt(0),
  "province_order": NumberInt(9),
  "country_id": NumberInt(15)
});
db.getCollection("tb_province").insert({
  "_id": ObjectId("50aa00e03d5e55180c00022d"),
  "country_id": NumberInt(15),
  "province_id": NumberInt(10),
  "province_key": "PEI",
  "province_name": "Prince Edward Island",
  "province_order": NumberInt(10),
  "province_status": NumberInt(0)
});
db.getCollection("tb_province").insert({
  "_id": ObjectId("50aa00e03d5e55180c00022e"),
  "province_id": NumberInt(11),
  "province_name": "Quebec",
  "province_key": "QC",
  "province_status": NumberInt(0),
  "province_order": NumberInt(11),
  "country_id": NumberInt(15)
});
db.getCollection("tb_province").insert({
  "_id": ObjectId("50aa00e03d5e55180c00022f"),
  "province_id": NumberInt(12),
  "province_name": "Saskatchewan",
  "province_key": "SK",
  "province_status": NumberInt(0),
  "province_order": NumberInt(12),
  "country_id": NumberInt(15)
});
db.getCollection("tb_province").insert({
  "_id": ObjectId("50aa00e03d5e55180c000230"),
  "province_id": NumberInt(13),
  "province_name": "Yukon",
  "province_key": "YT",
  "province_status": NumberInt(0),
  "province_order": NumberInt(13),
  "country_id": NumberInt(15)
});
db.getCollection("tb_province").insert({
  "_id": ObjectId("50aa00e03d5e55180c000231"),
  "province_id": NumberInt(14),
  "province_name": "Wisconsin",
  "province_key": "WI",
  "province_status": NumberInt(0),
  "province_order": NumberInt(14),
  "country_id": NumberInt(72)
});

/** tb_rule records **/
db.getCollection("tb_rule").insert({
  "_id": ObjectId("50f784ad9c76848307000007"),
  "rule_admin": NumberInt(0),
  "rule_comp": NumberInt(1),
  "rule_description": "Allow Signage Layout for this company        ",
  "rule_id": NumberInt(15),
  "rule_key": "comp_module_signage_layout",
  "rule_menu": "",
  "rule_title": "Module Signage Layout",
  "rule_type": NumberInt(3)
});
db.getCollection("tb_rule").insert({
  "_id": ObjectId("50fe54729c76840113000007"),
  "rule_admin": NumberInt(0),
  "rule_comp": NumberInt(1),
  "rule_description": "All orders will require Manager's approval.",
  "rule_id": NumberInt(17),
  "rule_key": "require_approval",
  "rule_menu": "",
  "rule_title": "Require Approval",
  "rule_type": NumberInt(4)
});
db.getCollection("tb_rule").insert({
  "_id": ObjectId("510a1d10bd78640812000274"),
  "rule_id": NumberInt(18),
  "rule_title": "Require location number",
  "rule_type": NumberInt(0),
  "rule_key": "location_number",
  "rule_admin": NumberInt(0),
  "rule_menu": "",
  "rule_comp": NumberInt(1),
  "rule_description": "The location must be location number.\/                    "
});

/** tb_settings records **/
db.getCollection("tb_settings").insert({
  "_id": ObjectId("50a705f63d5e55fc09000015"),
  "setting_id": NumberInt(1),
  "setting_name": "location_type",
  "option": [
    {
      "id": NumberInt(0),
      "name": "------",
      "key": ""
    },
    {
      "id": NumberInt(1),
      "name": "Head Office",
      "key": "HO",
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(2),
      "name": "Regional Office",
      "key": "RO",
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(3),
      "name": "Branch Office",
      "key": "BO",
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(4),
      "name": "RS: Retail Store",
      "key": "RS",
      "status": NumberInt(0)
    }
  ],
  "status": NumberInt(0)
});
db.getCollection("tb_settings").insert({
  "_id": ObjectId("50a707fb3d5e55fc0900001f"),
  "setting_id": NumberInt(3),
  "setting_name": "contact_type",
  "option": [
    {
      "id": NumberInt(0),
      "name": "------",
      "key": ""
    },
    {
      "id": NumberInt(1),
      "name": "Regular",
      "key": "regular",
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(2),
      "name": "Sales Representative",
      "key": "sales",
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(3),
      "name": "CSR",
      "key": "csr",
      "status": NumberInt(0)
    }
  ],
  "status": NumberInt(0)
});
db.getCollection("tb_settings").insert({
  "_id": ObjectId("50a70a7c3d5e55fc09000024"),
  "setting_id": NumberInt(4),
  "setting_name": "contact_status",
  "option": [
    {
      "id": NumberInt(0),
      "name": "------",
      "key": ""
    },
    {
      "id": NumberInt(1),
      "name": "Active",
      "key": "active",
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(2),
      "name": "Inactive",
      "key": "inactive",
      "status": NumberInt(0)
    }
  ],
  "status": NumberInt(0)
});
db.getCollection("tb_settings").insert({
  "_id": ObjectId("50a70b713d5e55fc09000029"),
  "setting_id": NumberInt(5),
  "setting_name": "bussiness_type",
  "option": [
    {
      "id": NumberInt(0),
      "name": "------",
      "key": ""
    },
    {
      "id": NumberInt(1),
      "name": "Government",
      "key": "government",
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(2),
      "name": "Corporation",
      "key": "corporation",
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(3),
      "name": "Small Business",
      "key": "smallbusiness",
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(4),
      "name": "Proprieter",
      "key": "proprieter",
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(5),
      "name": "NGO",
      "key": "ngo",
      "status": NumberInt(0)
    }
  ],
  "status": NumberInt(0)
});
db.getCollection("tb_settings").insert({
  "_id": ObjectId("50a7149c3d5e55fc09000033"),
  "setting_id": NumberInt(7),
  "setting_name": "relationship",
  "option": [
    {
      "id": NumberInt(0),
      "name": "------",
      "key": ""
    },
    {
      "id": NumberInt(1),
      "name": "Customer",
      "key": "customer",
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(2),
      "name": "Vendor",
      "key": "vendor",
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(3),
      "name": "Both",
      "key": "both",
      "status": NumberInt(0)
    }
  ],
  "status": NumberInt(0)
});
db.getCollection("tb_settings").insert({
  "_id": ObjectId("50a7157a3d5e55fc09000038"),
  "setting_id": NumberInt(8),
  "setting_name": "industry",
  "option": [
    {
      "id": NumberInt(0),
      "name": "------",
      "key": ""
    },
    {
      "id": NumberInt(1),
      "name": "Health",
      "key": "health",
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(2),
      "name": "Educational",
      "key": "educational",
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(3),
      "name": "Retail",
      "key": "retail",
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(4),
      "name": "Industrial",
      "key": "industrial",
      "status": NumberInt(0)
    }
  ],
  "status": NumberInt(0)
});
db.getCollection("tb_settings").insert({
  "_id": ObjectId("50a717f93d5e55fc09000042"),
  "setting_id": NumberInt(10),
  "setting_name": "product_status",
  "option": [
    {
      "id": NumberInt(0),
      "name": "------",
      "key": ""
    },
    {
      "id": NumberInt(1),
      "name": "Unpublished",
      "key": "unpublished",
      "status": NumberInt(1)
    },
    {
      "id": NumberInt(2),
      "name": "New",
      "key": "new",
      "status": NumberInt(1)
    },
    {
      "id": NumberInt(3),
      "name": "Available",
      "key": "available",
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(4),
      "name": "Not Available",
      "key": "unavailable",
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(5),
      "name": "Discontinued",
      "key": "discontinued",
      "status": NumberInt(1)
    },
    {
      "id": NumberInt(6),
      "name": "Inactive Unpublished",
      "key": "inactive",
      "status": NumberInt(1)
    }
  ],
  "status": NumberInt(0)
});
db.getCollection("tb_settings").insert({
  "_id": ObjectId("50a719c83d5e55fc09000047"),
  "setting_id": NumberInt(11),
  "setting_name": "size_unit",
  "option": [
    {
      "id": NumberInt(0),
      "name": "------",
      "key": ""
    },
    {
      "id": NumberInt(1),
      "name": "Centimeters",
      "key": "cm",
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(2),
      "name": "Feet",
      "key": "ft",
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(3),
      "name": "Inches",
      "key": "in",
      "status": NumberInt(0)
    }
  ],
  "status": NumberInt(0)
});
db.getCollection("tb_settings").insert({
  "_id": ObjectId("50b721639c76844e06000054"),
  "setting_id": NumberInt(13),
  "setting_name": "source_type",
  "option": [
    {
      "id": NumberInt(0),
      "name": "Web",
      "key": "intranet"
    },
    {
      "id": NumberInt(1),
      "name": "Intranet",
      "key": "intranet"
    }
  ],
  "status": NumberInt(0)
});
db.getCollection("tb_settings").insert({
  "_id": ObjectId("50b721ec9c7684700600001b"),
  "setting_id": NumberInt(14),
  "setting_name": "order_type",
  "option": [
    {
      "id": NumberInt(0),
      "name": "Default",
      "key": "default"
    }
  ],
  "status": NumberInt(0)
});
db.getCollection("tb_settings").insert({
  "_id": ObjectId("50b723609c7684690600002f"),
  "setting_id": NumberInt(15),
  "setting_name": "delivery_method",
  "option": [
    {
      "id": NumberInt(0),
      "name": "Purolator",
      "key": "purolator"
    }
  ],
  "status": NumberInt(0)
});
db.getCollection("tb_settings").insert({
  "_id": ObjectId("50b87d119c7684030700002d"),
  "setting_id": NumberInt(17),
  "setting_name": "dispatch",
  "option": [
    {
      "id": NumberInt(0),
      "name": "Yes",
      "key": "yes",
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(1),
      "name": "No",
      "key": "no",
      "status": NumberInt(0)
    }
  ],
  "status": NumberInt(0)
});
db.getCollection("tb_settings").insert({
  "_id": ObjectId("50c2a7269c7684f9050000d3"),
  "setting_id": NumberInt(18),
  "setting_name": "ship_status",
  "option": [
    {
      "id": NumberInt(0),
      "name": "--------",
      "key": "not",
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(1),
      "name": "Shipping",
      "key": "shipping",
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(2),
      "name": "Received",
      "key": "received",
      "status": NumberInt(0)
    }
  ],
  "status": NumberInt(0)
});
db.getCollection("tb_settings").insert({
  "_id": ObjectId("50a706c33d5e55fc0900001a"),
  "setting_id": NumberInt(2),
  "setting_name": "location_status",
  "option": [
    {
      "id": NumberInt(0),
      "name": "------",
      "key": ""
    },
    {
      "id": NumberInt(1),
      "name": "Open",
      "key": "open",
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(2),
      "name": "Closed",
      "key": "closed",
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(3),
      "name": "Planned",
      "key": "planned",
      "status": NumberInt(0)
    }
  ],
  "status": NumberInt(0)
});
db.getCollection("tb_settings").insert({
  "_id": ObjectId("50a7143e3d5e55fc0900002e"),
  "setting_id": NumberInt(6),
  "setting_name": "company_type",
  "option": [
    {
      "id": NumberInt(0),
      "name": "------",
      "key": ""
    },
    {
      "id": NumberInt(1),
      "name": "Active",
      "key": "active",
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(2),
      "name": "Inactive",
      "key": "inactive",
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(3),
      "name": "Closed",
      "key": "closed",
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(4),
      "name": "Bad",
      "key": "bad",
      "status": NumberInt(0)
    }
  ],
  "status": NumberInt(0)
});
db.getCollection("tb_settings").insert({
  "_id": ObjectId("50a71b323d5e55fc0900004c"),
  "option": [
    {
      "id": NumberInt(0),
      "name": "------",
      "key": ""
    },
    {
      "id": NumberInt(1),
      "name": "COD",
      "key": "cod",
      "status": NumberInt(0),
      "value": NumberInt(0)
    },
    {
      "id": NumberInt(2),
      "name": "Net 14",
      "key": "n14",
      "status": NumberInt(0),
      "value": NumberInt(1)
    },
    {
      "id": NumberInt(3),
      "name": "Net 15",
      "key": "n15",
      "status": NumberInt(0),
      "value": NumberInt(2)
    },
    {
      "id": NumberInt(4),
      "name": "Net 25",
      "key": "n25",
      "status": NumberInt(0),
      "value": NumberInt(3)
    },
    {
      "id": NumberInt(5),
      "name": "Net 30",
      "key": "n30",
      "status": NumberInt(0),
      "value": NumberInt(4)
    },
    {
      "id": NumberInt(6),
      "name": "Net 60",
      "key": "n60",
      "status": NumberInt(0),
      "value": NumberInt(5)
    }
  ],
  "setting_name": "order_term",
  "status": NumberInt(0),
  "setting_id": NumberInt(12)
});
db.getCollection("tb_settings").insert({
  "_id": ObjectId("50b8781c9c7684d60600002f"),
  "setting_id": NumberInt(16),
  "setting_name": "terms",
  "option": [
    {
      "id": NumberInt(0),
      "name": "COD",
      "key": "cod",
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(1),
      "name": "Net 14",
      "key": "net_14",
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(2),
      "name": "Net 15 2%",
      "key": "net_15",
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(3),
      "name": "Net 25 ",
      "key": "net_25 ",
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(4),
      "name": "Net 30 ",
      "key": "net_30 ",
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(5),
      "name": "Net 60 ",
      "key": "net_60 ",
      "status": NumberInt(0)
    }
  ],
  "status": NumberInt(0)
});
db.getCollection("tb_settings").insert({
  "_id": ObjectId("50cc24473d5e55d815000192"),
  "setting_id": NumberInt(21),
  "setting_name": "package_type",
  "option": [
    {
      "id": "0",
      "name": "Single",
      "key": "single"
    },
    {
      "id": "1",
      "name": "Multiple",
      "key": "multiple"
    },
    {
      "id": "2",
      "name": "Set",
      "key": "set"
    },
    {
      "id": "3",
      "name": "Package",
      "key": "package"
    },
    {
      "id": "4",
      "name": "Kit",
      "key": "kit"
    }
  ],
  "status": NumberInt(0)
});
db.getCollection("tb_settings").insert({
  "_id": ObjectId("50c709cc9c7684a00600007a"),
  "setting_id": NumberInt(19),
  "setting_name": "rule_type",
  "option": [
    {
      "id": "0",
      "name": "Company",
      "key": "company"
    },
    {
      "id": "1",
      "name": "Location",
      "key": "location"
    },
    {
      "id": "2",
      "name": "Contact",
      "key": "contact"
    },
    {
      "id": "3",
      "name": "Product",
      "key": "product"
    },
    {
      "id": "4",
      "name": "Order",
      "key": "order"
    },
    {
      "id": "5",
      "name": "Shipping",
      "key": "shipping"
    },
    {
      "id": "6",
      "name": "Orther",
      "key": "orther"
    }
  ],
  "status": NumberInt(0)
});
db.getCollection("tb_settings").insert({
  "_id": ObjectId("50c7f7149c7684f9050000d0"),
  "setting_id": NumberInt(20),
  "setting_name": "user_type",
  "option": [
    {
      "id": "0",
      "name": "SuperAdmin",
      "key": "superadmin"
    },
    {
      "id": "1",
      "name": "Anvy-Admin",
      "key": "anvy_admin"
    },
    {
      "id": "2",
      "name": "Anvy-User",
      "key": "anvy_user"
    },
    {
      "id": "3",
      "name": "Customer-Admin",
      "key": "customer_admin"
    },
    {
      "id": "4",
      "name": "Customer-Manager",
      "key": "customer_manager"
    },
    {
      "id": "5",
      "name": "Customer-User",
      "key": "customer_user"
    }
  ],
  "status": NumberInt(0)
});
db.getCollection("tb_settings").insert({
  "_id": ObjectId("50efde843d5e5574050001bb"),
  "setting_id": NumberInt(22),
  "setting_name": "image_type",
  "option": [
    {
      "id": "0",
      "name": "For Sample",
      "key": "sample"
    },
    {
      "id": "1",
      "name": "For Product",
      "key": "product"
    },
    {
      "id": "2",
      "name": "Signage Layout",
      "key": "signage_layout"
    }
  ],
  "status": NumberInt(0)
});
db.getCollection("tb_settings").insert({
  "_id": ObjectId("50fcb45d3d5e55fc04000151"),
  "option": [
    {
      "name": "Square Feet",
      "key": "square_feet",
      "id": NumberInt(0),
      "status": NumberInt(0)
    },
    {
      "name": "Unit",
      "key": "unit",
      "id": NumberInt(1),
      "status": NumberInt(0)
    }
  ],
  "setting_id": NumberInt(23),
  "setting_name": "sold_by",
  "status": NumberInt(0)
});
db.getCollection("tb_settings").insert({
  "_id": ObjectId("50bc1da79c76846506000001"),
  "setting_id": NumberInt(9),
  "setting_name": "order_status",
  "option": [
    {
      "id": NumberInt(0),
      "name": "In Session",
      "key": "in_session",
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(1),
      "name": "Not Submitted",
      "key": "not_submitted",
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(2),
      "name": "Pending",
      "key": "pending",
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(3),
      "name": "Submitted",
      "key": "submitted",
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(4),
      "name": "In Production",
      "key": "in_production",
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(5),
      "name": "Shipped",
      "key": "shipped",
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(6),
      "name": "Cancelled",
      "key": "cancelled",
      "status": NumberInt(0)
    }
  ],
  "status": NumberInt(0)
});
db.getCollection("tb_settings").insert({
  "_id": ObjectId("510257be3d5e55381300016a"),
  "setting_id": NumberInt(24),
  "setting_name": "rule_action",
  "option": [
    {
      "id": NumberInt(0),
      "name": "View",
      "key": "view",
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(1),
      "name": "Search",
      "key": "search",
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(2),
      "name": "Create",
      "key": "create",
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(3),
      "name": "Edit",
      "key": "edit",
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(4),
      "name": "Delete",
      "key": "delete",
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(5),
      "name": "Allocate",
      "key": "allocate",
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(6),
      "name": "Reorder",
      "key": "reorder",
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(7),
      "name": "Submit",
      "key": "submit",
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(8),
      "name": "Approve",
      "key": "approve",
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(9),
      "name": "Cancel",
      "key": "cancel",
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(10),
      "name": "Mail",
      "key": "mail",
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(11),
      "name": "Customize",
      "key": "customize",
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(12),
      "name": "Grant",
      "key": "grant",
      "status": NumberInt(0)
    }
  ],
  "status": NumberInt(0)
});

/** tb_shipping records **/

/** tb_support records **/
db.getCollection("tb_support").insert({
  "_id": ObjectId("50c2f28f9c76841507000007"),
  "support_id": NumberInt(1),
  "support_title": "title",
  "support_description": "description !.............",
  "company_id": NumberInt(10006),
  "location_id": NumberInt(1000004),
  "contact_id": NumberInt(4),
  "date_created": ISODate("2012-12-08T07:55:59.0Z"),
  "username": "FGL Sports Test FGL",
  "image_file": ""
});
db.getCollection("tb_support").insert({
  "_id": ObjectId("50c2f2d69c76841807000003"),
  "support_id": NumberInt(2),
  "support_title": "title",
  "support_description": "description !.............",
  "company_id": NumberInt(10006),
  "location_id": NumberInt(1000004),
  "contact_id": NumberInt(4),
  "date_created": ISODate("2012-12-07T17:00:00.0Z"),
  "username": "FGL Sports Test FGL",
  "image_file": ""
});
db.getCollection("tb_support").insert({
  "_id": ObjectId("50c2f2d89c76841207000003"),
  "support_id": NumberInt(3),
  "support_title": "title",
  "support_description": "description !.............",
  "company_id": NumberInt(10006),
  "location_id": NumberInt(1000004),
  "contact_id": NumberInt(4),
  "date_created": ISODate("2012-12-07T17:00:00.0Z"),
  "username": "FGL Sports Test FGL",
  "image_file": ""
});
db.getCollection("tb_support").insert({
  "_id": ObjectId("50c2f2de9c76840d0700000b"),
  "support_id": NumberInt(4),
  "support_title": "title",
  "support_description": "Calgary Alberta, Canada T2A6A3",
  "company_id": NumberInt(10006),
  "location_id": NumberInt(1000004),
  "contact_id": NumberInt(4),
  "date_created": ISODate("2012-12-07T17:00:00.0Z"),
  "username": "FGL Sports Test FGL",
  "image_file": ""
});
db.getCollection("tb_support").insert({
  "_id": ObjectId("50c2f7aa9c7684a106000119"),
  "support_id": NumberInt(5),
  "support_title": " Title:aaa",
  "support_description": " Title:",
  "company_id": NumberInt(10006),
  "location_id": NumberInt(1000004),
  "contact_id": NumberInt(4),
  "date_created": ISODate("2012-12-07T17:00:00.0Z"),
  "username": "FGL Sports Test FGL",
  "image_file": ""
});
db.getCollection("tb_support").insert({
  "_id": ObjectId("50c53a2b9c76843e0400001c"),
  "support_id": NumberInt(6),
  "support_title": "Test",
  "support_description": "Hello This is a test",
  "company_id": NumberInt(10006),
  "location_id": NumberInt(1000004),
  "contact_id": NumberInt(4),
  "date_created": ISODate("2012-12-09T17:00:00.0Z"),
  "username": "FGL Sports Test FGL",
  "image_file": ""
});

/** tb_tag records **/
db.getCollection("tb_tag").insert({
  "_id": ObjectId("50eaa0339c7684b115000019"),
  "tag_id": NumberInt(1),
  "tag_name": "Snowboard",
  "tag_status": NumberInt(0),
  "tag_order": NumberInt(1),
  "location_id": NumberInt(0),
  "company_id": NumberInt(10006),
  "user_name": "admin",
  "date_created": ISODate("2013-01-07T10:14:30.0Z")
});
db.getCollection("tb_tag").insert({
  "_id": ObjectId("50eaa0439c7684a507000067"),
  "tag_id": NumberInt(2),
  "tag_name": "Ski",
  "tag_status": NumberInt(0),
  "tag_order": NumberInt(2),
  "location_id": NumberInt(0),
  "company_id": NumberInt(10006),
  "user_name": "admin",
  "date_created": ISODate("2013-01-07T10:15:19.0Z")
});
db.getCollection("tb_tag").insert({
  "_id": ObjectId("50fa065b9c76849306000029"),
  "tag_id": NumberInt(3),
  "tag_name": "Coffee",
  "tag_status": NumberInt(0),
  "tag_order": NumberInt(3),
  "location_id": NumberInt(0),
  "company_id": NumberInt(10004),
  "user_name": "admin",
  "date_created": ISODate("2013-01-19T02:34:45.0Z")
});
db.getCollection("tb_tag").insert({
  "_id": ObjectId("50fe3d8e9c7684583e000018"),
  "tag_id": NumberInt(4),
  "tag_name": "Menuboard",
  "tag_status": NumberInt(0),
  "tag_order": NumberInt(4),
  "location_id": NumberInt(0),
  "company_id": NumberInt(10004),
  "user_name": "admin",
  "date_created": ISODate("2013-01-22T07:19:06.0Z")
});
db.getCollection("tb_tag").insert({
  "_id": ObjectId("50ff90669c76847e6b000044"),
  "tag_id": NumberInt(5),
  "tag_name": "Sandwichboard",
  "tag_status": NumberInt(0),
  "tag_order": NumberInt(5),
  "location_id": NumberInt(0),
  "company_id": NumberInt(10004),
  "user_name": "admin",
  "date_created": ISODate("2013-01-23T07:25:07.0Z")
});
db.getCollection("tb_tag").insert({
  "_id": ObjectId("5107ab699c76843f450000df"),
  "tag_id": NumberInt(6),
  "tag_name": "Logo",
  "tag_status": NumberInt(0),
  "tag_order": NumberInt(6),
  "location_id": NumberInt(0),
  "company_id": NumberInt(10004),
  "user_name": "admin",
  "date_created": ISODate("2013-01-29T10:58:32.0Z")
});
db.getCollection("tb_tag").insert({
  "_id": ObjectId("5109f4f29c7684e2580000f9"),
  "tag_id": NumberInt(7),
  "tag_name": "Pumptopper",
  "tag_status": NumberInt(0),
  "tag_order": NumberInt(7),
  "location_id": NumberInt(0),
  "company_id": NumberInt(10004),
  "user_name": "admin",
  "date_created": ISODate("2013-01-31T04:35:51.0Z")
});
db.getCollection("tb_tag").insert({
  "_id": ObjectId("5109f5179c7684bb580000f5"),
  "tag_id": NumberInt(8),
  "tag_name": "Blend cards",
  "tag_status": NumberInt(0),
  "tag_order": NumberInt(8),
  "location_id": NumberInt(0),
  "company_id": NumberInt(10004),
  "user_name": "admin",
  "date_created": ISODate("2013-01-31T04:37:16.0Z")
});
db.getCollection("tb_tag").insert({
  "_id": ObjectId("5109f5379c7684103a0000f7"),
  "tag_id": NumberInt(9),
  "tag_name": "Thermos Wrap",
  "tag_status": NumberInt(0),
  "tag_order": NumberInt(9),
  "location_id": NumberInt(0),
  "company_id": NumberInt(10004),
  "user_name": "admin",
  "date_created": ISODate("2013-01-31T04:37:45.0Z")
});
db.getCollection("tb_tag").insert({
  "_id": ObjectId("5109f5809c7684bc580000df"),
  "tag_id": NumberInt(10),
  "tag_name": "Price Kit",
  "tag_status": NumberInt(0),
  "tag_order": NumberInt(10),
  "location_id": NumberInt(0),
  "company_id": NumberInt(10004),
  "user_name": "admin",
  "date_created": ISODate("2013-01-31T04:39:16.0Z")
});
db.getCollection("tb_tag").insert({
  "_id": ObjectId("5109f5bd9c76849554000158"),
  "tag_id": NumberInt(11),
  "tag_name": "Backlit Signage",
  "tag_status": NumberInt(0),
  "tag_order": NumberInt(11),
  "location_id": NumberInt(0),
  "company_id": NumberInt(10004),
  "user_name": "admin",
  "date_created": ISODate("2013-01-31T04:40:01.0Z")
});
db.getCollection("tb_tag").insert({
  "_id": ObjectId("5109f5e49c7684bb5800012e"),
  "tag_id": NumberInt(12),
  "tag_name": "Sinta Box",
  "tag_status": NumberInt(0),
  "tag_order": NumberInt(12),
  "location_id": NumberInt(0),
  "company_id": NumberInt(10004),
  "user_name": "admin",
  "date_created": ISODate("2013-01-31T04:40:57.0Z")
});

/** tb_taxonomy records **/
db.getCollection("tb_taxonomy").insert({
  "_id": ObjectId("50b5dde43d5e555403000097"),
  "taxonomy_id": NumberInt(1),
  "taxonomy_name": "Van Houtte - Brand",
  "taxonomy_status": NumberInt(0),
  "taxonomy_order": NumberInt(0)
});
db.getCollection("tb_taxonomy").insert({
  "_id": ObjectId("50b5dde43d5e555403000098"),
  "taxonomy_id": NumberInt(2),
  "taxonomy_name": "Adagio - Brand",
  "taxonomy_status": NumberInt(0),
  "taxonomy_order": NumberInt(0)
});
db.getCollection("tb_taxonomy").insert({
  "_id": ObjectId("50b5dde43d5e555403000099"),
  "taxonomy_id": NumberInt(3),
  "taxonomy_name": "Blue Mountain - Brand",
  "taxonomy_status": NumberInt(0),
  "taxonomy_order": NumberInt(0)
});
db.getCollection("tb_taxonomy").insert({
  "_id": ObjectId("50b5dde43d5e55540300009a"),
  "taxonomy_id": NumberInt(4),
  "taxonomy_name": "Menu Board - Product Group",
  "taxonomy_status": NumberInt(0),
  "taxonomy_order": NumberInt(0)
});
db.getCollection("tb_taxonomy").insert({
  "_id": ObjectId("50b5dde43d5e55540300009b"),
  "taxonomy_id": NumberInt(5),
  "taxonomy_name": "Logo - Product Group",
  "taxonomy_status": NumberInt(0),
  "taxonomy_order": NumberInt(0)
});
db.getCollection("tb_taxonomy").insert({
  "_id": ObjectId("50b5dde43d5e55540300009c"),
  "taxonomy_id": NumberInt(6),
  "taxonomy_name": "Banner Stand - Product Group",
  "taxonomy_status": NumberInt(0),
  "taxonomy_order": NumberInt(0)
});
db.getCollection("tb_taxonomy").insert({
  "_id": ObjectId("50b5dde43d5e55540300009d"),
  "taxonomy_id": NumberInt(7),
  "taxonomy_name": "Indoor - Application",
  "taxonomy_status": NumberInt(0),
  "taxonomy_order": NumberInt(0)
});
db.getCollection("tb_taxonomy").insert({
  "_id": ObjectId("50b5dde43d5e55540300009e"),
  "taxonomy_id": NumberInt(8),
  "taxonomy_name": "Outdoor - Application",
  "taxonomy_status": NumberInt(0),
  "taxonomy_order": NumberInt(0)
});
db.getCollection("tb_taxonomy").insert({
  "_id": ObjectId("50b5dde43d5e55540300009f"),
  "taxonomy_id": NumberInt(9),
  "taxonomy_name": "Graphics - Product Group",
  "taxonomy_status": NumberInt(0),
  "taxonomy_order": NumberInt(0)
});
db.getCollection("tb_taxonomy").insert({
  "_id": ObjectId("50b5dde43d5e5554030000a0"),
  "taxonomy_id": NumberInt(10),
  "taxonomy_name": "Banner - Product Group",
  "taxonomy_status": NumberInt(0),
  "taxonomy_order": NumberInt(0)
});
db.getCollection("tb_taxonomy").insert({
  "_id": ObjectId("50b5dde43d5e5554030000a1"),
  "taxonomy_id": NumberInt(11),
  "taxonomy_name": "Vehicle Graphics - Product Group",
  "taxonomy_status": NumberInt(0),
  "taxonomy_order": NumberInt(0)
});
db.getCollection("tb_taxonomy").insert({
  "_id": ObjectId("50b5dde43d5e5554030000a2"),
  "taxonomy_id": NumberInt(13),
  "taxonomy_name": "Custom - Product Group",
  "taxonomy_status": NumberInt(0),
  "taxonomy_order": NumberInt(0)
});
db.getCollection("tb_taxonomy").insert({
  "_id": ObjectId("50b5dde43d5e5554030000a3"),
  "taxonomy_id": NumberInt(14),
  "taxonomy_name": "Price Kit - Product Group",
  "taxonomy_status": NumberInt(0),
  "taxonomy_order": NumberInt(0)
});
db.getCollection("tb_taxonomy").insert({
  "_id": ObjectId("50b5dde43d5e5554030000a4"),
  "taxonomy_id": NumberInt(15),
  "taxonomy_name": "Cup - Product Group",
  "taxonomy_status": NumberInt(0),
  "taxonomy_order": NumberInt(0)
});
db.getCollection("tb_taxonomy").insert({
  "_id": ObjectId("50b5dde43d5e5554030000a5"),
  "taxonomy_id": NumberInt(16),
  "taxonomy_name": "Decal - Product Group",
  "taxonomy_status": NumberInt(0),
  "taxonomy_order": NumberInt(0)
});
db.getCollection("tb_taxonomy").insert({
  "_id": ObjectId("50b5dde43d5e5554030000a6"),
  "taxonomy_id": NumberInt(17),
  "taxonomy_name": "Mural - Product Group",
  "taxonomy_status": NumberInt(0),
  "taxonomy_order": NumberInt(0)
});
db.getCollection("tb_taxonomy").insert({
  "_id": ObjectId("50b5dde43d5e5554030000a7"),
  "taxonomy_id": NumberInt(18),
  "taxonomy_name": "Sandwich Board - Product Group",
  "taxonomy_status": NumberInt(0),
  "taxonomy_order": NumberInt(0)
});
db.getCollection("tb_taxonomy").insert({
  "_id": ObjectId("50b5dde43d5e5554030000a8"),
  "taxonomy_id": NumberInt(19),
  "taxonomy_name": "Thermos Wrap - Product Group",
  "taxonomy_status": NumberInt(0),
  "taxonomy_order": NumberInt(0)
});
db.getCollection("tb_taxonomy").insert({
  "_id": ObjectId("50b5dde43d5e5554030000a9"),
  "taxonomy_id": NumberInt(20),
  "taxonomy_name": "Bello - Product Group",
  "taxonomy_status": NumberInt(0),
  "taxonomy_order": NumberInt(0)
});
db.getCollection("tb_taxonomy").insert({
  "_id": ObjectId("50b5dde43d5e5554030000aa"),
  "taxonomy_id": NumberInt(21),
  "taxonomy_name": "W2P Core - Brand",
  "taxonomy_status": NumberInt(0),
  "taxonomy_order": NumberInt(0)
});
db.getCollection("tb_taxonomy").insert({
  "_id": ObjectId("50b5dde43d5e5554030000ab"),
  "taxonomy_id": NumberInt(22),
  "taxonomy_name": "Chatters Backlit Posters - Product Group",
  "taxonomy_status": NumberInt(0),
  "taxonomy_order": NumberInt(0)
});
db.getCollection("tb_taxonomy").insert({
  "_id": ObjectId("50b5dde43d5e5554030000ac"),
  "taxonomy_id": NumberInt(23),
  "taxonomy_name": "Chatters Logo Banner - Product Group",
  "taxonomy_status": NumberInt(0),
  "taxonomy_order": NumberInt(0)
});
db.getCollection("tb_taxonomy").insert({
  "_id": ObjectId("50b5dde43d5e5554030000ad"),
  "taxonomy_id": NumberInt(24),
  "taxonomy_name": "Chatters Wall Banners - Product Group",
  "taxonomy_status": NumberInt(0),
  "taxonomy_order": NumberInt(0)
});
db.getCollection("tb_taxonomy").insert({
  "_id": ObjectId("50b5dde43d5e5554030000ae"),
  "taxonomy_id": NumberInt(25),
  "taxonomy_name": "Fast Gas Pumptopper - Product Group",
  "taxonomy_status": NumberInt(0),
  "taxonomy_order": NumberInt(0)
});
db.getCollection("tb_taxonomy").insert({
  "_id": ObjectId("50b5dde43d5e5554030000af"),
  "taxonomy_id": NumberInt(26),
  "taxonomy_name": "Fast Gas Curb Signs - Product Group",
  "taxonomy_status": NumberInt(0),
  "taxonomy_order": NumberInt(0)
});
db.getCollection("tb_taxonomy").insert({
  "_id": ObjectId("50b5dde43d5e5554030000b0"),
  "taxonomy_id": NumberInt(27),
  "taxonomy_name": "Fast Gas A-Frame - Product Group",
  "taxonomy_status": NumberInt(0),
  "taxonomy_order": NumberInt(0)
});
db.getCollection("tb_taxonomy").insert({
  "_id": ObjectId("50b5dde43d5e5554030000b1"),
  "taxonomy_id": NumberInt(28),
  "taxonomy_name": "Fast Gas Hurriane - Product Group",
  "taxonomy_status": NumberInt(0),
  "taxonomy_order": NumberInt(0)
});

/** tb_user records **/
db.getCollection("tb_user").insert({
  "_id": ObjectId("50a4480a9c76840d04000000"),
  "company_id": NumberInt(10000),
  "contact_id": NumberInt(0),
  "location_id": NumberInt(10000),
  "user_id": NumberInt(100),
  "user_lastlog": ISODate("2013-01-31T08:09:52.0Z"),
  "user_name": "admin",
  "user_password": "85260fed59a56a13e6ee551557cc7023",
  "user_status": NumberInt(0),
  "user_type": NumberInt(0),
  "user_rule": NumberInt(0)
});
db.getCollection("tb_user").insert({
  "_id": ObjectId("50c982919c76847f06000065"),
  "company_id": NumberLong(10000),
  "contact_id": NumberLong(5),
  "location_id": NumberLong(10000),
  "user_id": NumberLong(103),
  "user_lastlog": ISODate("2013-01-18T04:12:44.0Z"),
  "user_name": "bob.lush",
  "user_password": "48861e56b31b907686c75debf2167db4",
  "user_rule": "insert_edit_delete_order,allocate_to_different_locations,edit_submitted_order,cancel_order,manage_order,manage_products,manage_contact,manage_location,manage_company,",
  "user_status": NumberLong(0),
  "user_type": NumberLong(1)
});
db.getCollection("tb_user").insert({
  "_id": ObjectId("50ebfdbd9c76840408000087"),
  "company_id": NumberInt(10004),
  "contact_id": NumberInt(3),
  "location_id": NumberInt(10004),
  "user_id": NumberInt(104),
  "user_lastlog": ISODate("2013-01-31T08:38:31.0Z"),
  "user_location_approve": "10016,10015,10014,10013,10012,10011,10004",
  "user_name": "demo_gene.grimm",
  "user_password": "48861e56b31b907686c75debf2167db4",
  "user_rule": {
    "customer_order": {
      "view": "View company orders",
      "create": "Create new orders",
      "edit": "Edit orders",
      "allocate": "Allocate to different locations",
      "submit": "Can submit orders",
      "approve": "Can approve orders"
    }
  },
  "user_status": NumberInt(0),
  "user_type": NumberInt(4)
});
db.getCollection("tb_user").insert({
  "_id": ObjectId("50fe4bba9c7684cc0e00002a"),
  "company_id": NumberInt(10004),
  "contact_id": NumberInt(6),
  "location_id": NumberInt(10016),
  "user_id": NumberInt(105),
  "user_lastlog": ISODate("2013-01-30T10:16:21.0Z"),
  "user_location_approve": "10016,10015,10014,10013,10012,10011,10010,10009,10008,10007,10006,10005,10004",
  "user_name": "steve.marreck",
  "user_password": "48861e56b31b907686c75debf2167db4",
  "user_rule": {
    "customer_order": {
      "view": "",
      "search": "",
      "create": "",
      "edit": "",
      "delete": "",
      "allocate": "",
      "submit": "",
      "reorder": "",
      "approve": "",
      "cancel": "",
      "mail": "",
      "customize": "",
      "grant": ""
    }
  },
  "user_status": NumberInt(0),
  "user_type": NumberInt(4)
});
db.getCollection("tb_user").insert({
  "_id": ObjectId("51062b7dbd7864f4070000ff"),
  "company_id": NumberLong(10000),
  "contact_id": NumberLong(13),
  "location_id": NumberLong(10000),
  "user_id": NumberLong(106),
  "user_lastlog": ISODate("2013-01-28T07:40:08.0Z"),
  "user_location_approve": "",
  "user_name": "alyssa.hoyrup",
  "user_password": "48861e56b31b907686c75debf2167db4",
  "user_rule": [
    
  ],
  "user_status": NumberLong(0),
  "user_type": NumberLong(2)
});
db.getCollection("tb_user").insert({
  "_id": ObjectId("5109d2fdbd786408090000d7"),
  "user_id": NumberInt(108),
  "user_name": "demo_fgl",
  "user_password": "48861e56b31b907686c75debf2167db4",
  "user_type": NumberInt(5),
  "user_status": NumberInt(0),
  "contact_id": NumberInt(4),
  "company_id": NumberInt(10006),
  "location_id": NumberInt(10003),
  "user_lastlog": ISODate("2013-01-31T03:01:15.0Z"),
  "user_rule": [
    
  ],
  "user_location_approve": ""
});
db.getCollection("tb_user").insert({
  "_id": ObjectId("510a27d29c7684103a000235"),
  "user_id": NumberInt(110),
  "user_name": "nguyen.nguyen",
  "user_password": "48861e56b31b907686c75debf2167db4",
  "user_type": NumberInt(2),
  "user_status": NumberInt(0),
  "contact_id": NumberInt(15),
  "company_id": NumberInt(10000),
  "location_id": NumberInt(10000),
  "user_lastlog": ISODate("2013-01-31T08:13:32.0Z"),
  "user_rule": [
    
  ],
  "user_location_approve": ""
});
db.getCollection("tb_user").insert({
  "_id": ObjectId("510a3af0bd7864f40900037a"),
  "company_id": NumberInt(10004),
  "contact_id": NumberInt(16),
  "location_id": NumberInt(10017),
  "user_id": NumberInt(111),
  "user_lastlog": ISODate("2013-01-31T09:35:41.0Z"),
  "user_location_approve": "",
  "user_name": "wayne.lacey",
  "user_password": "48861e56b31b907686c75debf2167db4",
  "user_rule": [
    
  ],
  "user_status": NumberInt(0),
  "user_type": NumberInt(5)
});
db.getCollection("tb_user").insert({
  "_id": ObjectId("51062ebc9c76843e0f000160"),
  "company_id": NumberInt(10004),
  "contact_id": NumberInt(10),
  "location_id": NumberInt(10015),
  "user_id": NumberInt(107),
  "user_lastlog": ISODate("2013-01-31T08:31:20.0Z"),
  "user_location_approve": "",
  "user_name": "demo_rob.doughty",
  "user_password": "48861e56b31b907686c75debf2167db4",
  "user_rule": {
    "customer_order": {
      "view": "View company orders",
      "create": "Create new orders",
      "edit": "Edit orders",
      "allocate": "Allocate to different locations",
      "submit": "Can submit orders"
    }
  },
  "user_status": NumberInt(0),
  "user_type": NumberInt(5)
});
db.getCollection("tb_user").insert({
  "_id": ObjectId("5109ef029c7684103a00007f"),
  "company_id": NumberInt(10004),
  "contact_id": NumberInt(14),
  "location_id": NumberInt(10019),
  "user_id": NumberInt(109),
  "user_lastlog": ISODate("2013-01-31T08:33:28.0Z"),
  "user_location_approve": "",
  "user_name": "demo_bryan.baxter",
  "user_password": "48861e56b31b907686c75debf2167db4",
  "user_rule": {
    "customer_order": {
      "create": "Create new orders",
      "view": "View company orders",
      "search": "Search company orders",
      "edit": "Edit orders",
      "submit": "Can submit orders"
    }
  },
  "user_status": NumberInt(0),
  "user_type": NumberInt(5)
});
db.getCollection("tb_user").insert({
  "_id": ObjectId("510a41a29c7684165d000238"),
  "user_id": NumberInt(112),
  "user_name": "gene.grimm",
  "user_password": "48861e56b31b907686c75debf2167db4",
  "user_type": NumberInt(4),
  "user_status": NumberInt(0),
  "contact_id": NumberInt(17),
  "company_id": NumberInt(10004),
  "location_id": NumberInt(10004),
  "user_lastlog": ISODate("2013-01-31T10:03:51.0Z"),
  "user_rule": [
    
  ],
  "user_location_approve": ""
});

/** tb_user_log records **/
