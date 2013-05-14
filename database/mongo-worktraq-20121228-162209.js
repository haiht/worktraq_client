
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

/** tb_location_area indexes **/
db.getCollection("tb_location_area").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** tb_location_area indexes **/
db.getCollection("tb_location_area").ensureIndex({
  "area_id": NumberInt(1)
},{
  "unique": true
});

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

/** tb_product_desc indexes **/
db.getCollection("tb_product_desc").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

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

/** tb_product_packages indexes **/
db.getCollection("tb_product_packages").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** tb_product_packages indexes **/
db.getCollection("tb_product_packages").ensureIndex({
  "package_id": NumberInt(1)
},{
  "unique": true
});

/** tb_province indexes **/
db.getCollection("tb_province").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

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

/** tb_thickness indexes **/
db.getCollection("tb_thickness").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** tb_thickness indexes **/
db.getCollection("tb_thickness").ensureIndex({
  "thickness_size": NumberInt(1)
},[
  
]);

/** tb_thickness indexes **/
db.getCollection("tb_thickness").ensureIndex({
  "thickness_id": NumberInt(1)
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
  "ns": "worktraq.tb_product_desc",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "worktraq.tb_thickness",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "thickness_size": NumberInt(1)
  },
  "ns": "worktraq.tb_thickness",
  "name": "thickness_size_1"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "thickness_id": NumberInt(1)
  },
  "unique": true,
  "ns": "worktraq.tb_thickness",
  "name": "thickness_id_key",
  "dropDups": NumberInt(1)
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
    "_id": NumberInt(1)
  },
  "ns": "worktraq.tb_product_packages",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "package_id": NumberInt(1)
  },
  "unique": true,
  "ns": "worktraq.tb_product_packages",
  "name": "package_id_key",
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
  "ns": "worktraq.tb_location_area",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "area_id": NumberInt(1)
  },
  "unique": true,
  "ns": "worktraq.tb_location_area",
  "name": "area_id_key",
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
db.getCollection("tb_allocation").insert({
  "_id": ObjectId("50c563899c7684770600006c"),
  "allocation_id": NumberInt(1),
  "order_items_id": NumberInt(8),
  "order_id": NumberInt(119),
  "location_id": NumberInt(10002),
  "location_name": "Leaside",
  "location_address": "M4G 4K1 - 147 Laird Drive",
  "quantity": NumberInt(6),
  "shipper": "---",
  "tracking_number": "---",
  "tracking_url": "---",
  "date_shipping": null,
  "company_id": NumberInt(0),
  "location_from": NumberInt(0),
  "ship_status": NumberInt(0)
});
db.getCollection("tb_allocation").insert({
  "_id": ObjectId("50c563899c7684770600006d"),
  "allocation_id": NumberInt(2),
  "order_items_id": NumberInt(8),
  "order_id": NumberInt(119),
  "location_id": NumberInt(10001),
  "location_name": "Corner Brook Plaza",
  "location_address": "A2H 6L8 - 54 Maple Valley Road",
  "quantity": NumberInt(6),
  "shipper": "---",
  "tracking_number": "---",
  "tracking_url": "---",
  "date_shipping": null,
  "company_id": NumberInt(0),
  "location_from": NumberInt(0),
  "ship_status": NumberInt(0)
});
db.getCollection("tb_allocation").insert({
  "_id": ObjectId("50c563899c7684770600006f"),
  "allocation_id": NumberInt(4),
  "order_items_id": NumberInt(7),
  "order_id": NumberInt(119),
  "location_id": NumberInt(10002),
  "location_name": "Leaside",
  "location_address": "M4G 4K1 - 147 Laird Drive",
  "quantity": NumberInt(11),
  "shipper": "---",
  "tracking_number": "---",
  "tracking_url": "---",
  "date_shipping": null,
  "company_id": NumberInt(0),
  "location_from": NumberInt(0),
  "ship_status": NumberInt(0)
});
db.getCollection("tb_allocation").insert({
  "_id": ObjectId("50c563899c76847706000070"),
  "allocation_id": NumberInt(5),
  "order_items_id": NumberInt(7),
  "order_id": NumberInt(119),
  "location_id": NumberInt(10001),
  "location_name": "Corner Brook Plaza",
  "location_address": "A2H 6L8 - 54 Maple Valley Road",
  "quantity": NumberInt(11),
  "shipper": "---",
  "tracking_number": "---",
  "tracking_url": "---",
  "date_shipping": null,
  "company_id": NumberInt(0),
  "location_from": NumberInt(0),
  "ship_status": NumberInt(0)
});
db.getCollection("tb_allocation").insert({
  "_id": ObjectId("50c563899c7684770600006e"),
  "allocation_id": NumberInt(3),
  "company_id": NumberInt(10006),
  "date_shipping": ISODate("2012-12-10T04:22:50.0Z"),
  "location_address": "T2G5A7 - 05 Milner Avenue, Suite 400",
  "location_from": NumberInt(0),
  "location_id": NumberInt(10000),
  "location_name": "FGL Sports Ltd #1",
  "order_id": NumberInt(119),
  "order_items_id": NumberInt(8),
  "quantity": NumberInt(6),
  "ship_status": NumberInt(1),
  "shipper": "UPS",
  "tracking_number": "TU19FIHl",
  "tracking_url": ""
});
db.getCollection("tb_allocation").insert({
  "_id": ObjectId("50c5ad469c7684ba180000c6"),
  "allocation_id": NumberInt(6),
  "company_id": NumberInt(10006),
  "date_shipping": ISODate("2012-12-10T09:39:17.0Z"),
  "location_address": "M4G 4K1 - 147 Laird Drive",
  "location_from": NumberInt(1000004),
  "location_id": NumberInt(10002),
  "location_name": "Leaside",
  "order_id": NumberInt(122),
  "order_items_id": NumberInt(15),
  "quantity": NumberInt(5),
  "ship_status": NumberInt(0),
  "shipper": "Purolator",
  "tracking_number": "Puro123",
  "tracking_url": ""
});
db.getCollection("tb_allocation").insert({
  "_id": ObjectId("50c5adf19c7684331a000103"),
  "allocation_id": NumberInt(7),
  "order_items_id": NumberInt(14),
  "order_id": NumberInt(121),
  "location_id": NumberInt(10002),
  "location_name": "Leaside",
  "location_address": "M4G 4K1 - 147 Laird Drive",
  "quantity": NumberInt(24),
  "shipper": "",
  "tracking_number": "",
  "tracking_url": "",
  "date_shipping": null,
  "company_id": NumberInt(0),
  "location_from": NumberInt(0),
  "ship_status": NumberInt(0)
});
db.getCollection("tb_allocation").insert({
  "_id": ObjectId("50c5adf19c7684331a000104"),
  "allocation_id": NumberInt(8),
  "order_items_id": NumberInt(14),
  "order_id": NumberInt(121),
  "location_id": NumberInt(10001),
  "location_name": "Corner Brook Plaza",
  "location_address": "A2H 6L8 - 54 Maple Valley Road",
  "quantity": NumberInt(24),
  "shipper": "",
  "tracking_number": "",
  "tracking_url": "",
  "date_shipping": null,
  "company_id": NumberInt(0),
  "location_from": NumberInt(0),
  "ship_status": NumberInt(0)
});
db.getCollection("tb_allocation").insert({
  "_id": ObjectId("50c5ae069c7684891700018d"),
  "allocation_id": NumberInt(9),
  "order_items_id": NumberInt(10),
  "order_id": NumberInt(120),
  "location_id": NumberInt(10002),
  "location_name": "Leaside",
  "location_address": "M4G 4K1 - 147 Laird Drive",
  "quantity": NumberInt(15),
  "shipper": "---",
  "tracking_number": "---",
  "tracking_url": "---",
  "date_shipping": null,
  "company_id": NumberInt(0),
  "location_from": NumberInt(0),
  "ship_status": NumberInt(0)
});
db.getCollection("tb_allocation").insert({
  "_id": ObjectId("50c5ae069c7684891700018e"),
  "allocation_id": NumberInt(10),
  "order_items_id": NumberInt(10),
  "order_id": NumberInt(120),
  "location_id": NumberInt(10001),
  "location_name": "Corner Brook Plaza",
  "location_address": "A2H 6L8 - 54 Maple Valley Road",
  "quantity": NumberInt(15),
  "shipper": "---",
  "tracking_number": "---",
  "tracking_url": "---",
  "date_shipping": null,
  "company_id": NumberInt(0),
  "location_from": NumberInt(0),
  "ship_status": NumberInt(0)
});
db.getCollection("tb_allocation").insert({
  "_id": ObjectId("50c5ae129c768455190000d2"),
  "allocation_id": NumberInt(11),
  "order_items_id": NumberInt(13),
  "order_id": NumberInt(118),
  "location_id": NumberInt(10002),
  "location_name": "Leaside",
  "location_address": "M4G 4K1 - 147 Laird Drive",
  "quantity": NumberInt(20),
  "shipper": "",
  "tracking_number": "",
  "tracking_url": "",
  "date_shipping": null,
  "company_id": NumberInt(0),
  "location_from": NumberInt(0),
  "ship_status": NumberInt(0)
});
db.getCollection("tb_allocation").insert({
  "_id": ObjectId("50c5ae129c768455190000d3"),
  "allocation_id": NumberInt(12),
  "order_items_id": NumberInt(13),
  "order_id": NumberInt(118),
  "location_id": NumberInt(10001),
  "location_name": "Corner Brook Plaza",
  "location_address": "A2H 6L8 - 54 Maple Valley Road",
  "quantity": NumberInt(20),
  "shipper": "",
  "tracking_number": "",
  "tracking_url": "",
  "date_shipping": null,
  "company_id": NumberInt(0),
  "location_from": NumberInt(0),
  "ship_status": NumberInt(0)
});
db.getCollection("tb_allocation").insert({
  "_id": ObjectId("50c5ae129c768455190000d4"),
  "allocation_id": NumberInt(13),
  "order_items_id": NumberInt(13),
  "order_id": NumberInt(118),
  "location_id": NumberInt(10000),
  "location_name": "FGL Sports Ltd #1",
  "location_address": "T2G5A7 - 05 Milner Avenue, Suite 400",
  "quantity": NumberInt(20),
  "shipper": "",
  "tracking_number": "",
  "tracking_url": "",
  "date_shipping": null,
  "company_id": NumberInt(0),
  "location_from": NumberInt(0),
  "ship_status": NumberInt(0)
});
db.getCollection("tb_allocation").insert({
  "_id": ObjectId("50c5ae1d9c7684f61c000065"),
  "allocation_id": NumberInt(14),
  "order_items_id": NumberInt(11),
  "order_id": NumberInt(116),
  "location_id": NumberInt(10002),
  "location_name": "Leaside",
  "location_address": "M4G 4K1 - 147 Laird Drive",
  "quantity": NumberInt(15),
  "shipper": "---",
  "tracking_number": "---",
  "tracking_url": "---",
  "date_shipping": null,
  "company_id": NumberInt(0),
  "location_from": NumberInt(0),
  "ship_status": NumberInt(0)
});
db.getCollection("tb_allocation").insert({
  "_id": ObjectId("50c5ae1d9c7684f61c000066"),
  "allocation_id": NumberInt(15),
  "order_items_id": NumberInt(11),
  "order_id": NumberInt(116),
  "location_id": NumberInt(10001),
  "location_name": "Corner Brook Plaza",
  "location_address": "A2H 6L8 - 54 Maple Valley Road",
  "quantity": NumberInt(15),
  "shipper": "---",
  "tracking_number": "---",
  "tracking_url": "---",
  "date_shipping": null,
  "company_id": NumberInt(0),
  "location_from": NumberInt(0),
  "ship_status": NumberInt(0)
});
db.getCollection("tb_allocation").insert({
  "_id": ObjectId("50c5ae1d9c7684f61c000067"),
  "allocation_id": NumberInt(16),
  "order_items_id": NumberInt(11),
  "order_id": NumberInt(116),
  "location_id": NumberInt(10000),
  "location_name": "FGL Sports Ltd #1",
  "location_address": "T2G5A7 - 05 Milner Avenue, Suite 400",
  "quantity": NumberInt(15),
  "shipper": "---",
  "tracking_number": "---",
  "tracking_url": "---",
  "date_shipping": null,
  "company_id": NumberInt(0),
  "location_from": NumberInt(0),
  "ship_status": NumberInt(0)
});
db.getCollection("tb_allocation").insert({
  "_id": ObjectId("50c5b65f9c7684441e000062"),
  "allocation_id": NumberInt(17),
  "company_id": NumberInt(10006),
  "date_shipping": ISODate("2012-12-10T10:16:52.0Z"),
  "location_address": "M4G 4K1 - 147 Laird Drive",
  "location_from": NumberInt(1000004),
  "location_id": NumberInt(10002),
  "location_name": "Leaside",
  "order_id": NumberInt(124),
  "order_items_id": NumberInt(18),
  "quantity": NumberInt(6),
  "ship_status": NumberInt(1),
  "shipper": "Purolator",
  "tracking_number": "124-Leaside",
  "tracking_url": ""
});
db.getCollection("tb_allocation").insert({
  "_id": ObjectId("50c5b65f9c7684441e000063"),
  "allocation_id": NumberInt(18),
  "company_id": NumberInt(10006),
  "date_shipping": ISODate("2012-12-10T10:17:27.0Z"),
  "location_address": "A2H 6L8 - 54 Maple Valley Road",
  "location_from": NumberInt(1000004),
  "location_id": NumberInt(10001),
  "location_name": "Corner Brook Plaza",
  "order_id": NumberInt(124),
  "order_items_id": NumberInt(18),
  "quantity": NumberInt(6),
  "ship_status": NumberInt(1),
  "shipper": "Purolator",
  "tracking_number": "124-Cornerbrook",
  "tracking_url": ""
});
db.getCollection("tb_allocation").insert({
  "_id": ObjectId("50c5b65f9c7684441e000064"),
  "allocation_id": NumberInt(19),
  "company_id": NumberInt(10006),
  "date_shipping": ISODate("2012-12-10T10:16:52.0Z"),
  "location_address": "M4G 4K1 - 147 Laird Drive",
  "location_from": NumberInt(1000004),
  "location_id": NumberInt(10002),
  "location_name": "Leaside",
  "order_id": NumberInt(124),
  "order_items_id": NumberInt(17),
  "quantity": NumberInt(9),
  "ship_status": NumberInt(1),
  "shipper": "Purolator",
  "tracking_number": "124-Leaside",
  "tracking_url": ""
});
db.getCollection("tb_allocation").insert({
  "_id": ObjectId("50c5b65f9c7684441e000065"),
  "allocation_id": NumberInt(20),
  "company_id": NumberInt(10006),
  "date_shipping": ISODate("2012-12-10T10:17:27.0Z"),
  "location_address": "A2H 6L8 - 54 Maple Valley Road",
  "location_from": NumberInt(1000004),
  "location_id": NumberInt(10001),
  "location_name": "Corner Brook Plaza",
  "order_id": NumberInt(124),
  "order_items_id": NumberInt(17),
  "quantity": NumberInt(9),
  "ship_status": NumberInt(1),
  "shipper": "Purolator",
  "tracking_number": "124-Cornerbrook",
  "tracking_url": ""
});
db.getCollection("tb_allocation").insert({
  "_id": ObjectId("50c5b65f9c7684441e000066"),
  "allocation_id": NumberInt(21),
  "company_id": NumberInt(10006),
  "date_shipping": ISODate("2012-12-10T10:17:50.0Z"),
  "location_address": "T2G5A7 - 05 Milner Avenue, Suite 400",
  "location_from": NumberInt(1000004),
  "location_id": NumberInt(10000),
  "location_name": "FGL Sports Ltd #1",
  "order_id": NumberInt(124),
  "order_items_id": NumberInt(17),
  "quantity": NumberInt(9),
  "ship_status": NumberInt(1),
  "shipper": "Purolator",
  "tracking_number": "124-HO",
  "tracking_url": ""
});

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
  "_id": ObjectId("50b6bdea3d5e555015000002"),
  "color_id": NumberInt(1),
  "color_name": "Alice Blue",
  "color_code": "AliceBlue",
  "color_code_hex": "#F0F8FF",
  "color_order": NumberInt(1),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000003"),
  "color_id": NumberInt(2),
  "color_name": "Antique White",
  "color_code": "AntiqueWhite",
  "color_code_hex": "#FAEBD7",
  "color_order": NumberInt(2),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000004"),
  "color_id": NumberInt(3),
  "color_name": "Aqua",
  "color_code": "Aqua",
  "color_code_hex": "#00FFFF",
  "color_order": NumberInt(3),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000005"),
  "color_id": NumberInt(4),
  "color_name": "Aquamarine",
  "color_code": "Aquamarine",
  "color_code_hex": "#7FFFD4",
  "color_order": NumberInt(4),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000006"),
  "color_id": NumberInt(5),
  "color_name": "Azure",
  "color_code": "Azure",
  "color_code_hex": "#F0FFFF",
  "color_order": NumberInt(5),
  "color_status": NumberInt(0)
});
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
  "_id": ObjectId("50b6bdea3d5e555015000008"),
  "color_id": NumberInt(7),
  "color_name": "Bisque",
  "color_code": "Bisque",
  "color_code_hex": "#FFE4C4",
  "color_order": NumberInt(7),
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
  "_id": ObjectId("50b6bdea3d5e55501500000a"),
  "color_id": NumberInt(9),
  "color_name": "Blanched Almond",
  "color_code": "BlanchedAlmond",
  "color_code_hex": "#FFEBCD",
  "color_order": NumberInt(9),
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
  "_id": ObjectId("50b6bdea3d5e55501500000c"),
  "color_id": NumberInt(11),
  "color_name": "Blue Violet",
  "color_code": "BlueViolet",
  "color_code_hex": "#8A2BE2",
  "color_order": NumberInt(11),
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
  "_id": ObjectId("50b6bdea3d5e55501500000e"),
  "color_id": NumberInt(13),
  "color_name": "Burly Wood",
  "color_code": "BurlyWood",
  "color_code_hex": "#DEB887",
  "color_order": NumberInt(13),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e55501500000f"),
  "color_id": NumberInt(14),
  "color_name": "Cadet Blue",
  "color_code": "CadetBlue",
  "color_code_hex": "#5F9EA0",
  "color_order": NumberInt(14),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000010"),
  "color_id": NumberInt(15),
  "color_name": "Chartreuse",
  "color_code": "Chartreuse",
  "color_code_hex": "#7FFF00",
  "color_order": NumberInt(15),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000011"),
  "color_id": NumberInt(16),
  "color_name": "Chocolate",
  "color_code": "Chocolate",
  "color_code_hex": "#D2691E",
  "color_order": NumberInt(16),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000012"),
  "color_id": NumberInt(17),
  "color_name": "Coral",
  "color_code": "Coral",
  "color_code_hex": "#FF7F50",
  "color_order": NumberInt(17),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000013"),
  "color_id": NumberInt(18),
  "color_name": "Cornflower Blue",
  "color_code": "CornflowerBlue",
  "color_code_hex": "#6495ED",
  "color_order": NumberInt(18),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000014"),
  "color_id": NumberInt(19),
  "color_name": "Cornsilk",
  "color_code": "Cornsilk",
  "color_code_hex": "#FFF8DC",
  "color_order": NumberInt(19),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000015"),
  "color_id": NumberInt(20),
  "color_name": "Crimson",
  "color_code": "Crimson",
  "color_code_hex": "#DC143C",
  "color_order": NumberInt(20),
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
  "_id": ObjectId("50b6bdea3d5e555015000017"),
  "color_id": NumberInt(22),
  "color_name": "Dark Blue",
  "color_code": "DarkBlue",
  "color_code_hex": "#00008B",
  "color_order": NumberInt(22),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000018"),
  "color_id": NumberInt(23),
  "color_name": "Dark Cyan",
  "color_code": "DarkCyan",
  "color_code_hex": "#008B8B",
  "color_order": NumberInt(23),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000019"),
  "color_id": NumberInt(24),
  "color_name": "Dark Golden Rod",
  "color_code": "DarkGoldenRod",
  "color_code_hex": "#B8860B",
  "color_order": NumberInt(24),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e55501500001a"),
  "color_id": NumberInt(25),
  "color_name": "Dark Grey",
  "color_code": "DarkGrey",
  "color_code_hex": "#A9A9A9",
  "color_order": NumberInt(25),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e55501500001b"),
  "color_id": NumberInt(26),
  "color_name": "Dark Green",
  "color_code": "DarkGreen",
  "color_code_hex": "#006400",
  "color_order": NumberInt(26),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e55501500001c"),
  "color_id": NumberInt(27),
  "color_name": "Dark Khaki",
  "color_code": "DarkKhaki",
  "color_code_hex": "#BDB76B",
  "color_order": NumberInt(27),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e55501500001d"),
  "color_id": NumberInt(28),
  "color_name": "Dark Magenta",
  "color_code": "DarkMagenta",
  "color_code_hex": "#8B008B",
  "color_order": NumberInt(28),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e55501500001e"),
  "color_id": NumberInt(29),
  "color_name": "Dark Olive Green",
  "color_code": "DarkOliveGreen",
  "color_code_hex": "#556B2F",
  "color_order": NumberInt(29),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e55501500001f"),
  "color_id": NumberInt(30),
  "color_name": "Dark Orange",
  "color_code": "DarkOrange",
  "color_code_hex": "#FF8C00",
  "color_order": NumberInt(30),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000020"),
  "color_id": NumberInt(31),
  "color_name": "Dark Orchid",
  "color_code": "DarkOrchid",
  "color_code_hex": "#9932CC",
  "color_order": NumberInt(31),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000021"),
  "color_id": NumberInt(32),
  "color_name": "Dark Red",
  "color_code": "DarkRed",
  "color_code_hex": "#8B0000",
  "color_order": NumberInt(32),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000022"),
  "color_id": NumberInt(33),
  "color_name": "Dark Salmon",
  "color_code": "DarkSalmon",
  "color_code_hex": "#E9967A",
  "color_order": NumberInt(33),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000023"),
  "color_id": NumberInt(34),
  "color_name": "Dark Sea Green",
  "color_code": "DarkSeaGreen",
  "color_code_hex": "#8FBC8F",
  "color_order": NumberInt(34),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000024"),
  "color_id": NumberInt(35),
  "color_name": "Dark Slate Blue",
  "color_code": "DarkSlateBlue",
  "color_code_hex": "#483D8B",
  "color_order": NumberInt(35),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000025"),
  "color_id": NumberInt(36),
  "color_name": "Dark Slate Grey",
  "color_code": "DarkSlateGrey",
  "color_code_hex": "#2F4F4F",
  "color_order": NumberInt(36),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000026"),
  "color_id": NumberInt(37),
  "color_name": "Dark Turquoise",
  "color_code": "DarkTurquoise",
  "color_code_hex": "#00CED1",
  "color_order": NumberInt(37),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000027"),
  "color_id": NumberInt(38),
  "color_name": "Dark Violet",
  "color_code": "DarkViolet",
  "color_code_hex": "#9400D3",
  "color_order": NumberInt(38),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000028"),
  "color_id": NumberInt(39),
  "color_name": "Deep Pink",
  "color_code": "DeepPink",
  "color_code_hex": "#FF1493",
  "color_order": NumberInt(39),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000029"),
  "color_id": NumberInt(40),
  "color_name": "Deep SkyBlue",
  "color_code": "DeepSkyBlue",
  "color_code_hex": "#00BFFF",
  "color_order": NumberInt(40),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e55501500002b"),
  "color_id": NumberInt(42),
  "color_name": "Dim Grey",
  "color_code": "DimGrey",
  "color_code_hex": "#696969",
  "color_order": NumberInt(42),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e55501500002c"),
  "color_id": NumberInt(43),
  "color_name": "Dodger Blue",
  "color_code": "DodgerBlue",
  "color_code_hex": "#1E90FF",
  "color_order": NumberInt(43),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e55501500002d"),
  "color_id": NumberInt(44),
  "color_name": "Fire Brick",
  "color_code": "FireBrick",
  "color_code_hex": "#B22222",
  "color_order": NumberInt(44),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e55501500002e"),
  "color_id": NumberInt(45),
  "color_name": "Floral White",
  "color_code": "FloralWhite",
  "color_code_hex": "#FFFAF0",
  "color_order": NumberInt(45),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e55501500002f"),
  "color_id": NumberInt(46),
  "color_name": "Forest Green",
  "color_code": "ForestGreen",
  "color_code_hex": "#228B22",
  "color_order": NumberInt(46),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000030"),
  "color_id": NumberInt(47),
  "color_name": "Fuchsia",
  "color_code": "Fuchsia",
  "color_code_hex": "#FF00FF",
  "color_order": NumberInt(47),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000031"),
  "color_id": NumberInt(48),
  "color_name": "Gainsboro",
  "color_code": "Gainsboro",
  "color_code_hex": "#DCDCDC",
  "color_order": NumberInt(48),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000032"),
  "color_id": NumberInt(49),
  "color_name": "Ghost White",
  "color_code": "GhostWhite",
  "color_code_hex": "#F8F8FF",
  "color_order": NumberInt(49),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000033"),
  "color_id": NumberInt(50),
  "color_name": "Gold",
  "color_code": "Gold",
  "color_code_hex": "#FFD700",
  "color_order": NumberInt(50),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000034"),
  "color_id": NumberInt(51),
  "color_name": "Golden Rod",
  "color_code": "GoldenRod",
  "color_code_hex": "#DAA520",
  "color_order": NumberInt(51),
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
  "_id": ObjectId("50b6bdea3d5e555015000038"),
  "color_id": NumberInt(55),
  "color_name": "Green Yellow",
  "color_code": "GreenYellow",
  "color_code_hex": "#ADFF2F",
  "color_order": NumberInt(55),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000039"),
  "color_id": NumberInt(56),
  "color_name": "Honey Dew",
  "color_code": "HoneyDew",
  "color_code_hex": "#F0FFF0",
  "color_order": NumberInt(56),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e55501500003a"),
  "color_id": NumberInt(57),
  "color_name": "Hot Pink",
  "color_code": "HotPink",
  "color_code_hex": "#FF69B4",
  "color_order": NumberInt(57),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e55501500003b"),
  "color_id": NumberInt(58),
  "color_name": "Indian Red",
  "color_code": "IndianRed",
  "color_code_hex": "#CD5C5C",
  "color_order": NumberInt(58),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e55501500003c"),
  "color_id": NumberInt(59),
  "color_name": "Indigo",
  "color_code": "Indigo",
  "color_code_hex": "#4B0082",
  "color_order": NumberInt(59),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e55501500003d"),
  "color_id": NumberInt(60),
  "color_name": "Ivory",
  "color_code": "Ivory",
  "color_code_hex": "#FFFFF0",
  "color_order": NumberInt(60),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e55501500003e"),
  "color_id": NumberInt(61),
  "color_name": "Khaki",
  "color_code": "Khaki",
  "color_code_hex": "#F0E68C",
  "color_order": NumberInt(61),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e55501500003f"),
  "color_id": NumberInt(62),
  "color_name": "Lavender",
  "color_code": "Lavender",
  "color_code_hex": "#E6E6FA",
  "color_order": NumberInt(62),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000040"),
  "color_id": NumberInt(63),
  "color_name": "Lavender Blush",
  "color_code": "LavenderBlush",
  "color_code_hex": "#FFF0F5",
  "color_order": NumberInt(63),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000041"),
  "color_id": NumberInt(64),
  "color_name": "Lawn Green",
  "color_code": "LawnGreen",
  "color_code_hex": "#7CFC00",
  "color_order": NumberInt(64),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000042"),
  "color_id": NumberInt(65),
  "color_name": "Lemon Chiffon",
  "color_code": "LemonChiffon",
  "color_code_hex": "#FFFACD",
  "color_order": NumberInt(65),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000043"),
  "color_id": NumberInt(66),
  "color_name": "Light Blue",
  "color_code": "LightBlue",
  "color_code_hex": "#ADD8E6",
  "color_order": NumberInt(66),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000044"),
  "color_id": NumberInt(67),
  "color_name": "Light Coral",
  "color_code": "LightCoral",
  "color_code_hex": "#F08080",
  "color_order": NumberInt(67),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000045"),
  "color_id": NumberInt(68),
  "color_name": "Light Cyan",
  "color_code": "LightCyan",
  "color_code_hex": "#E0FFFF",
  "color_order": NumberInt(68),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000046"),
  "color_id": NumberInt(69),
  "color_name": "Light Golden Rod Yellow",
  "color_code": "LightGoldenRodYellow",
  "color_code_hex": "#FAFAD2",
  "color_order": NumberInt(69),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000048"),
  "color_id": NumberInt(71),
  "color_name": "Light Grey",
  "color_code": "LightGrey",
  "color_code_hex": "#D3D3D3",
  "color_order": NumberInt(71),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000049"),
  "color_id": NumberInt(72),
  "color_name": "Light Green",
  "color_code": "LightGreen",
  "color_code_hex": "#90EE90",
  "color_order": NumberInt(72),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e55501500004a"),
  "color_id": NumberInt(73),
  "color_name": "Light Pink",
  "color_code": "LightPink",
  "color_code_hex": "#FFB6C1",
  "color_order": NumberInt(73),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e55501500004b"),
  "color_id": NumberInt(74),
  "color_name": "Light Salmon",
  "color_code": "LightSalmon",
  "color_code_hex": "#FFA07A",
  "color_order": NumberInt(74),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e55501500004c"),
  "color_id": NumberInt(75),
  "color_name": "Light Sea Green",
  "color_code": "LightSeaGreen",
  "color_code_hex": "#20B2AA",
  "color_order": NumberInt(75),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e55501500004d"),
  "color_id": NumberInt(76),
  "color_name": "Light Sky Blue",
  "color_code": "LightSkyBlue",
  "color_code_hex": "#87CEFA",
  "color_order": NumberInt(76),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e55501500004f"),
  "color_id": NumberInt(78),
  "color_name": "Light Slate Grey",
  "color_code": "LightSlateGrey",
  "color_code_hex": "#778899",
  "color_order": NumberInt(78),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000050"),
  "color_id": NumberInt(79),
  "color_name": "Light Steel Blue",
  "color_code": "LightSteelBlue",
  "color_code_hex": "#B0C4DE",
  "color_order": NumberInt(79),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000051"),
  "color_id": NumberInt(80),
  "color_name": "Light Yellow",
  "color_code": "LightYellow",
  "color_code_hex": "#FFFFE0",
  "color_order": NumberInt(80),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000052"),
  "color_id": NumberInt(81),
  "color_name": "Lime",
  "color_code": "Lime",
  "color_code_hex": "#00FF00",
  "color_order": NumberInt(81),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000053"),
  "color_id": NumberInt(82),
  "color_name": "Lime Green",
  "color_code": "LimeGreen",
  "color_code_hex": "#32CD32",
  "color_order": NumberInt(82),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000054"),
  "color_id": NumberInt(83),
  "color_name": "Linen",
  "color_code": "Linen",
  "color_code_hex": "#FAF0E6",
  "color_order": NumberInt(83),
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
  "_id": ObjectId("50b6bdea3d5e555015000056"),
  "color_id": NumberInt(85),
  "color_name": "Maroon",
  "color_code": "Maroon",
  "color_code_hex": "#800000",
  "color_order": NumberInt(85),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000057"),
  "color_id": NumberInt(86),
  "color_name": "Medium Aqua Marine",
  "color_code": "MediumAquaMarine",
  "color_code_hex": "#66CDAA",
  "color_order": NumberInt(86),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000058"),
  "color_id": NumberInt(87),
  "color_name": "Medium Blue",
  "color_code": "MediumBlue",
  "color_code_hex": "#0000CD",
  "color_order": NumberInt(87),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000059"),
  "color_id": NumberInt(88),
  "color_name": "Medium Orchid",
  "color_code": "MediumOrchid",
  "color_code_hex": "#BA55D3",
  "color_order": NumberInt(88),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e55501500005a"),
  "color_id": NumberInt(89),
  "color_name": "Medium Purple",
  "color_code": "MediumPurple",
  "color_code_hex": "#9370DB",
  "color_order": NumberInt(89),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e55501500005b"),
  "color_id": NumberInt(90),
  "color_name": "Medium Sea Green",
  "color_code": "MediumSeaGreen",
  "color_code_hex": "#3CB371",
  "color_order": NumberInt(90),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e55501500005c"),
  "color_id": NumberInt(91),
  "color_name": "Medium Slate Blue",
  "color_code": "MediumSlateBlue",
  "color_code_hex": "#7B68EE",
  "color_order": NumberInt(91),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e55501500005d"),
  "color_id": NumberInt(92),
  "color_name": "Medium Spring Green",
  "color_code": "MediumSpringGreen",
  "color_code_hex": "#00FA9A",
  "color_order": NumberInt(92),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e55501500005e"),
  "color_id": NumberInt(93),
  "color_name": "Medium Turquoise",
  "color_code": "MediumTurquoise",
  "color_code_hex": "#48D1CC",
  "color_order": NumberInt(93),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e55501500005f"),
  "color_id": NumberInt(94),
  "color_name": "Medium Violet Red",
  "color_code": "MediumVioletRed",
  "color_code_hex": "#C71585",
  "color_order": NumberInt(94),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000060"),
  "color_id": NumberInt(95),
  "color_name": "Midnight Blue",
  "color_code": "MidnightBlue",
  "color_code_hex": "#191970",
  "color_order": NumberInt(95),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000061"),
  "color_id": NumberInt(96),
  "color_name": "Mint Cream",
  "color_code": "MintCream",
  "color_code_hex": "#F5FFFA",
  "color_order": NumberInt(96),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000062"),
  "color_id": NumberInt(97),
  "color_name": "Misty Rose",
  "color_code": "MistyRose",
  "color_code_hex": "#FFE4E1",
  "color_order": NumberInt(97),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000063"),
  "color_id": NumberInt(98),
  "color_name": "Moccasin",
  "color_code": "Moccasin",
  "color_code_hex": "#FFE4B5",
  "color_order": NumberInt(98),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000064"),
  "color_id": NumberInt(99),
  "color_name": "Navajo White",
  "color_code": "NavajoWhite",
  "color_code_hex": "#FFDEAD",
  "color_order": NumberInt(99),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000065"),
  "color_id": NumberInt(100),
  "color_name": "Navy",
  "color_code": "Navy",
  "color_code_hex": "#000080",
  "color_order": NumberInt(100),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000066"),
  "color_id": NumberInt(101),
  "color_name": "Old Lace",
  "color_code": "OldLace",
  "color_code_hex": "#FDF5E6",
  "color_order": NumberInt(101),
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
  "_id": ObjectId("50b6bdea3d5e555015000068"),
  "color_id": NumberInt(103),
  "color_name": "Olive Drab",
  "color_code": "OliveDrab",
  "color_code_hex": "#6B8E23",
  "color_order": NumberInt(103),
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
  "_id": ObjectId("50b6bdea3d5e55501500006a"),
  "color_id": NumberInt(105),
  "color_name": "Orange Red",
  "color_code": "OrangeRed",
  "color_code_hex": "#FF4500",
  "color_order": NumberInt(105),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e55501500006b"),
  "color_id": NumberInt(106),
  "color_name": "Orchid",
  "color_code": "Orchid",
  "color_code_hex": "#DA70D6",
  "color_order": NumberInt(106),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e55501500006c"),
  "color_id": NumberInt(107),
  "color_name": "Pale Golden Rod",
  "color_code": "PaleGoldenRod",
  "color_code_hex": "#EEE8AA",
  "color_order": NumberInt(107),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e55501500006d"),
  "color_id": NumberInt(108),
  "color_name": "Pale Green",
  "color_code": "PaleGreen",
  "color_code_hex": "#98FB98",
  "color_order": NumberInt(108),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e55501500006e"),
  "color_id": NumberInt(109),
  "color_name": "Pale Turquoise",
  "color_code": "PaleTurquoise",
  "color_code_hex": "#AFEEEE",
  "color_order": NumberInt(109),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e55501500006f"),
  "color_id": NumberInt(110),
  "color_name": "Pale Violet Red",
  "color_code": "PaleVioletRed",
  "color_code_hex": "#DB7093",
  "color_order": NumberInt(110),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000070"),
  "color_id": NumberInt(111),
  "color_name": "Papaya Whip",
  "color_code": "PapayaWhip",
  "color_code_hex": "#FFEFD5",
  "color_order": NumberInt(111),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000071"),
  "color_id": NumberInt(112),
  "color_name": "Peach Puff",
  "color_code": "PeachPuff",
  "color_code_hex": "#FFDAB9",
  "color_order": NumberInt(112),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000072"),
  "color_id": NumberInt(113),
  "color_name": "Peru",
  "color_code": "Peru",
  "color_code_hex": "#CD853F",
  "color_order": NumberInt(113),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000073"),
  "color_id": NumberInt(114),
  "color_name": "Pink",
  "color_code": "Pink",
  "color_code_hex": "#FFC0CB",
  "color_order": NumberInt(114),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000074"),
  "color_id": NumberInt(115),
  "color_name": "Plum",
  "color_code": "Plum",
  "color_code_hex": "#DDA0DD",
  "color_order": NumberInt(115),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000075"),
  "color_id": NumberInt(116),
  "color_name": "Powder Blue",
  "color_code": "PowderBlue",
  "color_code_hex": "#B0E0E6",
  "color_order": NumberInt(116),
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
  "_id": ObjectId("50b6bdea3d5e555015000078"),
  "color_id": NumberInt(119),
  "color_name": "Rosy Brown",
  "color_code": "RosyBrown",
  "color_code_hex": "#BC8F8F",
  "color_order": NumberInt(119),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000079"),
  "color_id": NumberInt(120),
  "color_name": "Royal Blue",
  "color_code": "RoyalBlue",
  "color_code_hex": "#4169E1",
  "color_order": NumberInt(120),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e55501500007a"),
  "color_id": NumberInt(121),
  "color_name": "Saddle Brown",
  "color_code": "SaddleBrown",
  "color_code_hex": "#8B4513",
  "color_order": NumberInt(121),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e55501500007b"),
  "color_id": NumberInt(122),
  "color_name": "Salmon",
  "color_code": "Salmon",
  "color_code_hex": "#FA8072",
  "color_order": NumberInt(122),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e55501500007c"),
  "color_id": NumberInt(123),
  "color_name": "Sandy Brown",
  "color_code": "SandyBrown",
  "color_code_hex": "#F4A460",
  "color_order": NumberInt(123),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e55501500007d"),
  "color_id": NumberInt(124),
  "color_name": "Sea Green",
  "color_code": "SeaGreen",
  "color_code_hex": "#2E8B57",
  "color_order": NumberInt(124),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e55501500007e"),
  "color_id": NumberInt(125),
  "color_name": "Sea Shell",
  "color_code": "SeaShell",
  "color_code_hex": "#FFF5EE",
  "color_order": NumberInt(125),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e55501500007f"),
  "color_id": NumberInt(126),
  "color_name": "Sienna",
  "color_code": "Sienna",
  "color_code_hex": "#A0522D",
  "color_order": NumberInt(126),
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
  "_id": ObjectId("50b6bdea3d5e555015000081"),
  "color_id": NumberInt(128),
  "color_name": "Sky Blue",
  "color_code": "SkyBlue",
  "color_code_hex": "#87CEEB",
  "color_order": NumberInt(128),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000082"),
  "color_id": NumberInt(129),
  "color_name": "Slate Blue",
  "color_code": "SlateBlue",
  "color_code_hex": "#6A5ACD",
  "color_order": NumberInt(129),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000084"),
  "color_id": NumberInt(131),
  "color_name": "Slate Grey",
  "color_code": "SlateGrey",
  "color_code_hex": "#708090",
  "color_order": NumberInt(131),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000085"),
  "color_id": NumberInt(132),
  "color_name": "Snow",
  "color_code": "Snow",
  "color_code_hex": "#FFFAFA",
  "color_order": NumberInt(132),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000086"),
  "color_id": NumberInt(133),
  "color_name": "Spring Green",
  "color_code": "SpringGreen",
  "color_code_hex": "#00FF7F",
  "color_order": NumberInt(133),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000087"),
  "color_id": NumberInt(134),
  "color_name": "Steel Blue",
  "color_code": "SteelBlue",
  "color_code_hex": "#4682B4",
  "color_order": NumberInt(134),
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
  "_id": ObjectId("50b6bdea3d5e555015000089"),
  "color_id": NumberInt(136),
  "color_name": "Teal",
  "color_code": "Teal",
  "color_code_hex": "#008080",
  "color_order": NumberInt(136),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e55501500008a"),
  "color_id": NumberInt(137),
  "color_name": "Thistle",
  "color_code": "Thistle",
  "color_code_hex": "#D8BFD8",
  "color_order": NumberInt(137),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e55501500008b"),
  "color_id": NumberInt(138),
  "color_name": "Tomato",
  "color_code": "Tomato",
  "color_code_hex": "#FF6347",
  "color_order": NumberInt(138),
  "color_status": NumberInt(0)
});
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e55501500008c"),
  "color_id": NumberInt(139),
  "color_name": "Turquoise",
  "color_code": "Turquoise",
  "color_code_hex": "#40E0D0",
  "color_order": NumberInt(139),
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
  "_id": ObjectId("50b6bdea3d5e55501500008e"),
  "color_id": NumberInt(141),
  "color_name": "Wheat",
  "color_code": "Wheat",
  "color_code_hex": "#F5DEB3",
  "color_order": NumberInt(141),
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
  "_id": ObjectId("50b6bdea3d5e555015000090"),
  "color_id": NumberInt(143),
  "color_name": "White Smoke",
  "color_code": "WhiteSmoke",
  "color_code_hex": "#F5F5F5",
  "color_order": NumberInt(143),
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
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000092"),
  "color_id": NumberInt(145),
  "color_name": "Yellow Green",
  "color_code": "YellowGreen",
  "color_code_hex": "#9ACD32",
  "color_order": NumberInt(145),
  "color_status": NumberInt(0)
});

/** tb_company records **/
db.getCollection("tb_company").insert({
  "_id": ObjectId("50a471e19c76846e2f000001"),
  "bussines_type": NumberInt(2),
  "company_code": "MCS",
  "company_id": NumberInt(10002),
  "company_name": "Mac's Convenience Stores",
  "industry": "3",
  "logo_file": "",
  "relationship": NumberInt(1),
  "status": NumberInt(0),
  "website": "http:\/\/www.mongodb.org\/display\/DOCS"
});
db.getCollection("tb_company").insert({
  "_id": ObjectId("50a477259c76841b2f000009"),
  "bussines_type": "1",
  "company_code": "VNM",
  "company_id": NumberInt(10001),
  "company_name": "VNI Marketing Inc",
  "industry": "1",
  "logo_file": "",
  "relationship": "3",
  "status": "0",
  "website": "http:\/\/php.net\/manual\/en\/mongo.sqltomongo.php"
});
db.getCollection("tb_company").insert({
  "_id": ObjectId("50a4783f9c7684852f000001"),
  "bussines_type": NumberInt(2),
  "company_code": "PTP",
  "company_id": NumberInt(10005),
  "company_name": "Photo Plus",
  "industry": "1",
  "logo_file": "logo.png",
  "relationship": NumberInt(1),
  "status": NumberInt(0),
  "website": "http:\/\/www.phptoplush.com"
});
db.getCollection("tb_company").insert({
  "_id": ObjectId("50aee8939c76840506000005"),
  "bussines_type": NumberInt(2),
  "company_code": "VHT",
  "company_id": NumberInt(10004),
  "company_name": "Van Houtte Coffee Services",
  "industry": "3",
  "logo_file": "logo.png",
  "relationship": NumberInt(1),
  "status": NumberInt(0),
  "website": "http:\/\/www.vanhoutte.com"
});
db.getCollection("tb_company").insert({
  "_id": ObjectId("50c00d0e9c7684075a000069"),
  "bussines_type": NumberInt(2),
  "company_code": "FGL",
  "company_id": NumberInt(10006),
  "company_name": "FGL Sports Ltd.",
  "industry": "3",
  "logo_file": "logo.png",
  "relationship": NumberInt(1),
  "status": NumberInt(0),
  "website": "http:\/\/www.fglsports.com"
});
db.getCollection("tb_company").insert({
  "_id": ObjectId("50c954199c76843c0600001c"),
  "company_id": NumberInt(10007),
  "company_name": "Anvy Digital",
  "company_code": "ADG",
  "relationship": NumberInt(3),
  "logo_file": "",
  "bussines_type": NumberInt(1),
  "industry": "4",
  "website": "http:\/\/www.anvy.net",
  "status": NumberInt(0)
});

/** tb_contact records **/
db.getCollection("tb_contact").insert({
  "_id": ObjectId("50b472ee9c7684c40600000f"),
  "address_city": "Coquitlam",
  "address_country": NumberInt(1),
  "address_line_1": "9 Burbridge Street",
  "address_line_2": "",
  "address_line_3": "",
  "address_postal": "V3K 7B2",
  "address_province": NumberInt(0),
  "address_type": NumberInt(1),
  "address_unit": "Unit 120",
  "birth_date": ISODate("2012-11-27T07:58:37.0Z"),
  "contact_id": NumberInt(1),
  "contact_type": "1",
  "direct_phone": "604.555.5555",
  "email": "4gerdeleon@gmail.com",
  "fax_number": "604.555.5555",
  "first_name": "Gerardo",
  "home_phone": "604.555.5555",
  "last_name": "Deleon Chavez",
  "location_id": NumberInt(10002),
  "middle_name": "",
  "mobile_phone": "604.555.5555",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("50c000599c7684ea05000064"),
  "address_city": "Cornerbrook",
  "address_country": NumberInt(1),
  "address_line_1": "54 Maple Valley Road",
  "address_line_2": "",
  "address_line_3": "",
  "address_postal": "A2H 6L8",
  "address_province": NumberInt(0),
  "address_type": NumberInt(1),
  "address_unit": "Unit # M-02A",
  "birth_date": ISODate("2012-12-06T02:17:43.0Z"),
  "contact_id": NumberInt(3),
  "contact_type": "1",
  "direct_phone": "403.255.2740",
  "email": "test_vht@localhost.com",
  "fax_number": "",
  "first_name": "VH (Gene)",
  "home_phone": "",
  "last_name": "Test VHT",
  "location_id": NumberInt(10001),
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
  "address_province": NumberInt(0),
  "address_type": NumberInt(1),
  "address_unit": "3",
  "birth_date": ISODate("2012-12-06T03:46:50.0Z"),
  "contact_id": NumberInt(4),
  "contact_type": "1",
  "direct_phone": "403.717.1400",
  "email": "long@anvyinc.com",
  "fax_number": "403.717.1400",
  "first_name": "FGL Sports",
  "home_phone": "",
  "last_name": "Test FGL",
  "location_id": NumberInt(10000),
  "middle_name": "",
  "mobile_phone": "",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("50c954e99c76843b06000035"),
  "address_city": "Toronto",
  "address_country": NumberInt(1),
  "address_line_1": "305 Milner Avenue",
  "address_line_2": "",
  "address_line_3": "",
  "address_postal": "T2G5A7",
  "address_province": NumberInt(0),
  "address_type": NumberInt(1),
  "address_unit": "Suite 400",
  "birth_date": ISODate("2012-12-13T04:08:36.0Z"),
  "contact_id": NumberInt(5),
  "contact_type": "1",
  "direct_phone": "+84 909992722",
  "email": "long@anvyinc.com",
  "fax_number": "",
  "first_name": "demo",
  "home_phone": "",
  "last_name": "anvy",
  "location_id": NumberInt(10003),
  "middle_name": "",
  "mobile_phone": "",
  "user_id": NumberInt(0)
});

/** tb_country records **/
db.getCollection("tb_country").insert({
  "_id": ObjectId("50a30ad93d5e550402000001"),
  "country_id": NumberInt(1),
  "country_name": "United Arab Emirates",
  "country_key": "ae",
  "country_order": NumberInt(0),
  "country_status": NumberInt(0)
});
db.getCollection("tb_country").insert({
  "_id": ObjectId("50a30ad93d5e550402000002"),
  "country_id": NumberInt(2),
  "country_name": "Anbania",
  "country_key": "al",
  "country_order": NumberInt(0),
  "country_status": NumberInt(0)
});
db.getCollection("tb_country").insert({
  "_id": ObjectId("50a30ad93d5e550402000004"),
  "country_id": NumberInt(4),
  "country_name": "Argentina",
  "country_key": "ar",
  "country_order": NumberInt(0),
  "country_status": NumberInt(0)
});
db.getCollection("tb_country").insert({
  "_id": ObjectId("50a30ad93d5e550402000005"),
  "country_id": NumberInt(5),
  "country_name": "Austria",
  "country_key": "at",
  "country_order": NumberInt(0),
  "country_status": NumberInt(0)
});
db.getCollection("tb_country").insert({
  "_id": ObjectId("50a30ad93d5e550402000007"),
  "country_id": NumberInt(7),
  "country_name": "Bosnia & Herzegovina",
  "country_key": "ba",
  "country_order": NumberInt(0),
  "country_status": NumberInt(0)
});
db.getCollection("tb_country").insert({
  "_id": ObjectId("50a30ad93d5e550402000008"),
  "country_id": NumberInt(8),
  "country_name": "Belgium",
  "country_key": "be",
  "country_order": NumberInt(0),
  "country_status": NumberInt(0)
});
db.getCollection("tb_country").insert({
  "_id": ObjectId("50a30ad93d5e55040200000b"),
  "country_id": NumberInt(11),
  "country_name": "Brunei",
  "country_key": "bn",
  "country_order": NumberInt(0),
  "country_status": NumberInt(0)
});
db.getCollection("tb_country").insert({
  "_id": ObjectId("50a30ad93d5e55040200000d"),
  "country_id": NumberInt(13),
  "country_name": "Belarus",
  "country_key": "by",
  "country_order": NumberInt(0),
  "country_status": NumberInt(0)
});
db.getCollection("tb_country").insert({
  "_id": ObjectId("50a30ad93d5e55040200000f"),
  "country_id": NumberInt(15),
  "country_name": "Canada",
  "country_key": "ca",
  "country_order": NumberInt(0),
  "country_status": NumberInt(0)
});
db.getCollection("tb_country").insert({
  "_id": ObjectId("50a30ad93d5e550402000013"),
  "country_id": NumberInt(19),
  "country_name": "China",
  "country_key": "cn",
  "country_order": NumberInt(0),
  "country_status": NumberInt(0)
});
db.getCollection("tb_country").insert({
  "_id": ObjectId("50a30ad93d5e550402000016"),
  "country_id": NumberInt(22),
  "country_name": "Denmark",
  "country_key": "dk",
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
  "address_province": NumberInt(0),
  "address_unit": "3",
  "close_date": ISODate("2012-12-06T17:00:00.0Z"),
  "company_id": NumberInt(10006),
  "location_area": "1568",
  "location_banner": "Sport Check",
  "location_id": NumberInt(10000),
  "location_name": "FGL Sports Ltd #1",
  "location_number": NumberInt(9),
  "location_region": "0",
  "location_type": NumberInt(1),
  "main_contact": "",
  "open_date": ISODate("2012-12-06T17:00:00.0Z"),
  "status": NumberInt(1)
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
  "address_province": NumberInt(0),
  "address_unit": "Unit # M-02A",
  "close_date": ISODate("1969-12-31T17:00:00.0Z"),
  "company_id": NumberInt(10006),
  "location_area": "SC",
  "location_banner": "Sport Check #2",
  "location_id": NumberInt(10001),
  "location_name": "Corner Brook Plaza",
  "location_number": NumberInt(201),
  "location_region": "0",
  "location_type": NumberInt(3),
  "main_contact": "",
  "open_date": ISODate("2002-12-03T17:00:00.0Z"),
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
  "address_province": NumberInt(0),
  "address_unit": "Unit # 300, B3",
  "close_date": ISODate("2011-12-31T17:00:00.0Z"),
  "company_id": NumberInt(10006),
  "location_area": "SC",
  "location_banner": "FGL Sports Banners",
  "location_id": NumberInt(10002),
  "location_name": "Leaside",
  "location_number": NumberInt(0),
  "location_region": "0",
  "location_type": NumberInt(3),
  "main_contact": "",
  "open_date": ISODate("2009-07-31T17:00:00.0Z"),
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("50c954649c7684470600000a"),
  "address_city": "Toronto",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "address_line_1": "305 Milner Avenue",
  "address_line_2": "",
  "address_line_3": "",
  "address_postal": "T2G5A7",
  "address_province": NumberInt(0),
  "address_unit": "Suite 400",
  "close_date": ISODate("2012-12-20T17:00:00.0Z"),
  "company_id": NumberInt(10007),
  "location_area": "1568",
  "location_banner": "Anvy Digital Office",
  "location_id": NumberInt(10003),
  "location_name": "Anvy Digital Office",
  "location_number": NumberInt(1),
  "location_region": "0",
  "location_type": NumberInt(1),
  "main_contact": "",
  "open_date": ISODate("2012-12-17T17:00:00.0Z"),
  "status": NumberInt(1)
});

/** tb_location_area records **/
db.getCollection("tb_location_area").insert({
  "_id": ObjectId("50d80b299c76848407000036"),
  "area_id": NumberInt(2),
  "location_id": NumberInt(10000),
  "area_name": "department golf",
  "area_description": "\r\n                    ",
  "area_image": [
    {
      "image_id": NumberInt(1),
      "image_file": "department_golf_1.jpg",
      "image_html": ""
    },
    {
      "image_id": NumberInt(2),
      "image_file": "department_golf_2.jpg",
      "image_html": ""
    }
  ]
});
db.getCollection("tb_location_area").insert({
  "_id": ObjectId("50d80b3a9c76846207000077"),
  "area_description": "\r\n                    ",
  "area_id": NumberInt(3),
  "area_image": [
    {
      "image_file": "department_hockey_1.jpg",
      "image_html": "<map id=\"imgmap\" name=\"imgmap\"><area shape=\"rect\" alt=\"\" title=\"\" coords=\"263,81,405,175\" href=\"http:\/\/192.168.0.108\/WorkTraq\/catalogue\/37\/info\" target=\"_blank\" \/><area shape=\"rect\" alt=\"\" title=\"\" coords=\"631,179,772,253\" href=\"http:\/\/worktraq.anvy.net\/catalogue\/36\/info\" target=\"_blank\" \/><area shape=\"rect\" alt=\"\" title=\"\" coords=\"411,81,527,182\" href=\"http:\/\/worktraq.anvy.net\/catalogue\/35\/info\" target=\"_blank\" \/><area shape=\"rect\" alt=\"\" title=\"\" coords=\"437,277,525,308\" href=\"http:\/\/worktraq.anvy.net\/catalogue\/35\/info\" target=\"_blank\" \/><area shape=\"rect\" alt=\"\" title=\"\" coords=\"269,280,334,308\" href=\"http:\/\/worktraq.anvy.net\/catalogue\/33\/info\" target=\"_self\" \/><!-- Created by Online Image Map Editor (http:\/\/www.maschek.hu\/imagemap\/index) --><\/map>",
      "image_id": NumberInt(1)
    },
    {
      "image_id": NumberInt(2),
      "image_file": "department_hockey_2.jpg",
      "image_html": ""
    },
    {
      "image_id": NumberInt(3),
      "image_file": "department_hockey_3.jpg",
      "image_html": ""
    },
    {
      "image_id": NumberInt(4),
      "image_file": "department_hockey_4.jpg",
      "image_html": ""
    },
    {
      "image_id": NumberInt(5),
      "image_file": "department_hockey_5.jpg",
      "image_html": ""
    }
  ],
  "area_name": "department hockey",
  "location_id": NumberInt(10000)
});
db.getCollection("tb_location_area").insert({
  "_id": ObjectId("50d7faa19c76846007000034"),
  "area_description": "\r\n                    ",
  "area_id": NumberInt(1),
  "area_image": [
    {
      "image_file": "department_footware_1.jpg",
      "image_html": "<map id=\"imgmap\" name=\"imgmap\"><area shape=\"rect\" alt=\"\" title=\"\" coords=\"669,131,760,201\" href=\"http:\/\/worktraq.anvy.net\/catalogue\/33\/info\" target=\"\" \/><area shape=\"rect\" alt=\"\" title=\"\" coords=\"60,188,125,250\" href=\"\" target=\"\" \/><area shape=\"rect\" alt=\"\" title=\"\" coords=\"162,188,228,254\" href=\"http:\/\/worktraq.anvy.net\/catalogue\/31\/info\" target=\"\" \/><!-- Created by Online Image Map Editor (http:\/\/www.maschek.hu\/imagemap\/index) --><\/map>",
      "image_id": NumberInt(1)
    },
    {
      "image_id": NumberInt(2),
      "image_file": "department_footware_2.jpg",
      "image_html": ""
    }
  ],
  "area_name": "department footware",
  "location_id": NumberInt(10000)
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
  "module_dir": "rules",
  "module_id": NumberInt(22),
  "module_index": "index.php",
  "module_key": "user\/rules",
  "module_locked": NumberInt(0),
  "module_menu": "module_rule",
  "module_order": NumberInt(0),
  "module_pid": NumberInt(3),
  "module_root": "admin",
  "module_text": "Rules",
  "module_time": ISODate("2012-12-13T10:08:45.0Z"),
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

/** tb_order records **/
db.getCollection("tb_order").insert({
  "_id": ObjectId("50b9ba633d5e55240e000053"),
  "anvy_id": "SO20121130002",
  "billing_contact": "",
  "company_id": NumberInt(10002),
  "date_created": ISODate("2012-11-30T17:00:00.0Z"),
  "date_required": ISODate("2012-01-11T17:00:00.0Z"),
  "delivery_method": NumberInt(0),
  "description": "",
  "dispatch": NumberInt(0),
  "gross_order_amount": NumberInt(0),
  "location_id": NumberInt(0),
  "net_order_amount": NumberInt(0),
  "order_id": NumberInt(104),
  "order_type": NumberInt(0),
  "po_number": "",
  "raw_id": "006-001",
  "sale_rep": "Test *",
  "shipping_contact": NumberInt(1),
  "source": NumberInt(0),
  "status": NumberInt(0),
  "tax_1": NumberInt(0),
  "tax_2": NumberInt(0),
  "tax_3": NumberInt(0),
  "term": NumberInt(0),
  "total_discount": NumberInt(0),
  "total_order_amount": NumberInt(0)
});
db.getCollection("tb_order").insert({
  "_id": ObjectId("50b9badc3d5e55240e00005c"),
  "anvy_id": "SO20121130003",
  "billing_contact": "",
  "company_id": NumberInt(10002),
  "date_created": ISODate("2012-11-30T17:00:00.0Z"),
  "date_required": ISODate("2012-01-11T17:00:00.0Z"),
  "delivery_method": NumberInt(0),
  "description": "",
  "dispatch": NumberInt(0),
  "gross_order_amount": NumberInt(0),
  "location_id": NumberInt(0),
  "net_order_amount": NumberInt(0),
  "order_id": NumberInt(105),
  "order_type": NumberInt(0),
  "po_number": "",
  "raw_id": "006-001",
  "sale_rep": "Test *",
  "shipping_contact": NumberInt(1),
  "source": NumberInt(0),
  "status": NumberInt(0),
  "tax_1": NumberInt(0),
  "tax_2": NumberInt(0),
  "tax_3": NumberInt(0),
  "term": NumberInt(0),
  "total_discount": NumberInt(0),
  "total_order_amount": NumberInt(0)
});
db.getCollection("tb_order").insert({
  "_id": ObjectId("50b9bb133d5e55240e000065"),
  "anvy_id": "SO20121120004",
  "billing_contact": "",
  "company_id": NumberInt(10002),
  "date_created": ISODate("2012-11-30T17:00:00.0Z"),
  "date_required": ISODate("2012-01-11T17:00:00.0Z"),
  "delivery_method": NumberInt(0),
  "description": "",
  "dispatch": NumberInt(0),
  "gross_order_amount": NumberInt(0),
  "location_id": NumberInt(0),
  "net_order_amount": NumberInt(0),
  "order_id": NumberInt(106),
  "order_type": NumberInt(0),
  "po_number": "",
  "raw_id": "006-001",
  "sale_rep": "Test *",
  "shipping_contact": NumberInt(1),
  "source": NumberInt(0),
  "status": NumberInt(0),
  "tax_1": NumberInt(0),
  "tax_2": NumberInt(0),
  "tax_3": NumberInt(0),
  "term": NumberInt(0),
  "total_discount": NumberInt(0),
  "total_order_amount": NumberInt(0)
});
db.getCollection("tb_order").insert({
  "_id": ObjectId("50b9bc913d5e55d81200000c"),
  "anvy_id": "SO20121130005",
  "billing_contact": "",
  "company_id": NumberInt(10002),
  "date_created": ISODate("2012-11-30T17:00:00.0Z"),
  "date_required": ISODate("2012-01-11T17:00:00.0Z"),
  "delivery_method": NumberInt(0),
  "description": "",
  "dispatch": NumberInt(0),
  "gross_order_amount": NumberInt(0),
  "location_id": NumberInt(0),
  "net_order_amount": NumberInt(0),
  "order_id": NumberInt(107),
  "order_type": NumberInt(0),
  "po_number": "",
  "raw_id": "006-001",
  "sale_rep": "Test *",
  "shipping_contact": NumberInt(1),
  "source": NumberInt(0),
  "status": NumberInt(0),
  "tax_1": NumberInt(0),
  "tax_2": NumberInt(0),
  "tax_3": NumberInt(0),
  "term": NumberInt(0),
  "total_discount": NumberInt(0),
  "total_order_amount": 18
});
db.getCollection("tb_order").insert({
  "_id": ObjectId("50b9bce03d5e55dc1500000c"),
  "anvy_id": "SO20121130006",
  "billing_contact": "0",
  "company_id": NumberInt(10004),
  "date_created": ISODate("2012-11-30T17:00:00.0Z"),
  "date_required": ISODate("2012-01-11T17:00:00.0Z"),
  "delivery_method": NumberInt(0),
  "description": "Description",
  "dispatch": NumberInt(0),
  "gross_order_amount": 0,
  "location_id": NumberInt(0),
  "net_order_amount": 0,
  "order_id": NumberInt(108),
  "order_type": NumberInt(0),
  "po_number": "09854",
  "raw_id": "006-001",
  "sale_rep": "Test *",
  "shipping_contact": "1",
  "source": NumberInt(0),
  "status": NumberInt(0),
  "tax_1": 0,
  "tax_2": 0,
  "tax_3": 0,
  "term": NumberInt(0),
  "total_discount": 0,
  "total_order_amount": 159
});
db.getCollection("tb_order").insert({
  "_id": ObjectId("50b851d49c7684640600000b"),
  "anvy_id": "SO20121201001",
  "billing_contact": "0",
  "company_id": NumberInt(10002),
  "date_created": ISODate("2012-12-01T09:11:46.0Z"),
  "date_required": ISODate("2012-11-29T09:11:46.0Z"),
  "delivery_method": NumberInt(0),
  "description": "Job Description",
  "dispatch": NumberInt(0),
  "gross_order_amount": 0,
  "location_id": NumberInt(0),
  "net_order_amount": 0,
  "order_id": NumberInt(101),
  "order_type": NumberInt(0),
  "po_number": "01254",
  "raw_id": "006-0001",
  "sale_rep": "Test",
  "shipping_contact": "TEST ORDER",
  "source": NumberInt(0),
  "status": NumberInt(4),
  "tax_1": 0,
  "tax_2": 0,
  "tax_3": 0,
  "term": NumberInt(0),
  "total_discount": 0,
  "total_order_amount": 0
});
db.getCollection("tb_order").insert({
  "_id": ObjectId("50b872659c7684d60600001a"),
  "anvy_id": "SO20121201002",
  "billing_contact": "0",
  "company_id": NumberInt(10002),
  "date_created": ISODate("2012-12-01T09:11:46.0Z"),
  "date_required": ISODate("2012-11-29T09:11:46.0Z"),
  "delivery_method": NumberInt(0),
  "description": "Job Description",
  "dispatch": NumberInt(0),
  "gross_order_amount": 0,
  "location_id": NumberInt(0),
  "net_order_amount": 0,
  "order_id": NumberInt(102),
  "order_type": NumberInt(0),
  "po_number": "01254",
  "raw_id": "006-0001",
  "sale_rep": "Test",
  "shipping_contact": "TEST ORDER",
  "source": NumberInt(0),
  "status": NumberInt(3),
  "tax_1": 0,
  "tax_2": 0,
  "tax_3": 0,
  "term": NumberInt(0),
  "total_discount": 0,
  "total_order_amount": 0
});
db.getCollection("tb_order").insert({
  "_id": ObjectId("50beb0113d5e55f010000060"),
  "anvy_id": "ANVY-006-001",
  "billing_contact": "",
  "company_id": NumberInt(10004),
  "date_created": ISODate("2012-12-04T17:00:00.0Z"),
  "date_required": ISODate("2012-05-11T17:00:00.0Z"),
  "delivery_method": NumberInt(0),
  "description": "",
  "dispatch": NumberInt(0),
  "gross_order_amount": NumberInt(0),
  "location_id": NumberInt(0),
  "net_order_amount": NumberInt(0),
  "order_id": NumberInt(109),
  "order_type": NumberInt(0),
  "po_number": "",
  "raw_id": "006-001",
  "sale_rep": "Test *",
  "shipping_contact": null,
  "source": NumberInt(0),
  "status": NumberInt(0),
  "tax_1": NumberInt(0),
  "tax_2": NumberInt(0),
  "tax_3": NumberInt(0),
  "term": NumberInt(0),
  "total_discount": NumberInt(0),
  "total_order_amount": 250
});
db.getCollection("tb_order").insert({
  "_id": ObjectId("50beb0823d5e55f0100000b0"),
  "anvy_id": "ANVY-006-001",
  "billing_contact": "",
  "company_id": NumberInt(10004),
  "date_created": ISODate("2012-12-04T17:00:00.0Z"),
  "date_required": ISODate("2012-05-11T17:00:00.0Z"),
  "delivery_method": NumberInt(0),
  "description": "",
  "dispatch": NumberInt(0),
  "gross_order_amount": NumberInt(0),
  "location_id": NumberInt(0),
  "net_order_amount": NumberInt(0),
  "order_id": NumberInt(110),
  "order_type": NumberInt(0),
  "po_number": "",
  "raw_id": "006-001",
  "sale_rep": "Test *",
  "shipping_contact": null,
  "source": NumberInt(0),
  "status": NumberInt(0),
  "tax_1": NumberInt(0),
  "tax_2": NumberInt(0),
  "tax_3": NumberInt(0),
  "term": NumberInt(0),
  "total_discount": NumberInt(0),
  "total_order_amount": 250
});
db.getCollection("tb_order").insert({
  "_id": ObjectId("50beb1d13d5e55c00e000048"),
  "anvy_id": "ANVY-006-001",
  "billing_contact": "",
  "company_id": NumberInt(10004),
  "date_created": ISODate("2012-12-04T17:00:00.0Z"),
  "date_required": ISODate("2012-05-11T17:00:00.0Z"),
  "delivery_method": NumberInt(0),
  "description": "",
  "dispatch": NumberInt(0),
  "gross_order_amount": NumberInt(0),
  "location_id": NumberInt(0),
  "net_order_amount": NumberInt(0),
  "order_id": NumberInt(111),
  "order_type": NumberInt(0),
  "po_number": "",
  "raw_id": "006-001",
  "sale_rep": "Test *",
  "shipping_contact": null,
  "source": NumberInt(0),
  "status": NumberInt(0),
  "tax_1": NumberInt(0),
  "tax_2": NumberInt(0),
  "tax_3": NumberInt(0),
  "term": NumberInt(0),
  "total_discount": NumberInt(0),
  "total_order_amount": 250
});
db.getCollection("tb_order").insert({
  "_id": ObjectId("50beb4423d5e55c00e0000a4"),
  "anvy_id": "ANVY-006-001",
  "billing_contact": "",
  "company_id": NumberInt(10004),
  "date_created": ISODate("2012-12-04T17:00:00.0Z"),
  "date_required": ISODate("2012-05-11T17:00:00.0Z"),
  "delivery_method": NumberInt(0),
  "description": "",
  "dispatch": NumberInt(0),
  "gross_order_amount": NumberInt(0),
  "location_id": NumberInt(0),
  "net_order_amount": NumberInt(0),
  "order_id": NumberInt(112),
  "order_type": NumberInt(0),
  "po_number": "",
  "raw_id": "006-001",
  "sale_rep": "Test *",
  "shipping_contact": null,
  "source": NumberInt(0),
  "status": NumberInt(0),
  "tax_1": NumberInt(0),
  "tax_2": NumberInt(0),
  "tax_3": NumberInt(0),
  "term": NumberInt(0),
  "total_discount": NumberInt(0),
  "total_order_amount": 250
});
db.getCollection("tb_order").insert({
  "_id": ObjectId("50beb4963d5e55c00e00014c"),
  "anvy_id": "ANVY-006-001",
  "billing_contact": "",
  "company_id": NumberInt(10004),
  "date_created": ISODate("2012-12-04T17:00:00.0Z"),
  "date_required": ISODate("2012-05-11T17:00:00.0Z"),
  "delivery_method": NumberInt(0),
  "description": "",
  "dispatch": NumberInt(0),
  "gross_order_amount": NumberInt(0),
  "location_id": NumberInt(0),
  "net_order_amount": NumberInt(0),
  "order_id": NumberInt(113),
  "order_type": NumberInt(0),
  "po_number": "",
  "raw_id": "006-001",
  "sale_rep": "Test *",
  "shipping_contact": null,
  "source": NumberInt(0),
  "status": NumberInt(0),
  "tax_1": NumberInt(0),
  "tax_2": NumberInt(0),
  "tax_3": NumberInt(0),
  "term": NumberInt(0),
  "total_discount": NumberInt(0),
  "total_order_amount": 320
});
db.getCollection("tb_order").insert({
  "_id": ObjectId("50bf00d33d5e55640e00032e"),
  "anvy_id": "ANVY-006-001",
  "billing_contact": "",
  "company_id": NumberInt(10004),
  "date_created": ISODate("2012-12-04T17:00:00.0Z"),
  "date_required": ISODate("2012-05-11T17:00:00.0Z"),
  "delivery_method": NumberInt(0),
  "description": "",
  "dispatch": NumberInt(0),
  "gross_order_amount": NumberInt(0),
  "location_id": NumberInt(0),
  "net_order_amount": NumberInt(0),
  "order_id": NumberInt(114),
  "order_type": NumberInt(0),
  "po_number": "",
  "raw_id": "006-001",
  "sale_rep": "Test *",
  "shipping_contact": null,
  "source": NumberInt(0),
  "status": NumberInt(0),
  "tax_1": NumberInt(0),
  "tax_2": NumberInt(0),
  "tax_3": NumberInt(0),
  "term": NumberInt(0),
  "total_discount": NumberInt(0),
  "total_order_amount": 255
});
db.getCollection("tb_order").insert({
  "_id": ObjectId("50bf1b373d5e55981800005e"),
  "anvy_id": "ANVY-006-001",
  "billing_contact": "",
  "company_id": NumberInt(10004),
  "date_created": ISODate("2012-12-04T17:00:00.0Z"),
  "date_required": ISODate("2012-05-11T17:00:00.0Z"),
  "delivery_method": NumberInt(0),
  "description": "",
  "dispatch": NumberInt(0),
  "gross_order_amount": NumberInt(0),
  "location_id": NumberInt(0),
  "net_order_amount": NumberInt(0),
  "order_id": NumberInt(115),
  "order_type": NumberInt(0),
  "po_number": "",
  "raw_id": "006-001",
  "sale_rep": "Test *",
  "shipping_contact": null,
  "source": NumberInt(0),
  "status": NumberInt(1),
  "tax_1": NumberInt(0),
  "tax_2": NumberInt(0),
  "tax_3": NumberInt(0),
  "term": NumberInt(0),
  "total_discount": NumberInt(0),
  "total_order_amount": 380
});
db.getCollection("tb_order").insert({
  "_id": ObjectId("50b9b9b23d5e55240e00003d"),
  "anvy_id": "SO20121130001",
  "billing_contact": "",
  "company_id": NumberInt(10002),
  "date_created": ISODate("2012-11-30T17:00:00.0Z"),
  "date_required": ISODate("2012-01-11T17:00:00.0Z"),
  "delivery_method": NumberInt(0),
  "description": "Q",
  "dispatch": NumberInt(0),
  "gross_order_amount": NumberInt(0),
  "location_id": NumberInt(0),
  "net_order_amount": NumberInt(0),
  "order_id": NumberInt(103),
  "order_type": NumberInt(0),
  "po_number": "",
  "raw_id": "006-001",
  "sale_rep": "Test *",
  "shipping_contact": NumberInt(1),
  "source": NumberInt(0),
  "status": NumberInt(0),
  "tax_1": NumberInt(0),
  "tax_2": NumberInt(0),
  "tax_3": NumberInt(0),
  "term": NumberInt(0),
  "total_discount": NumberInt(0),
  "total_order_amount": NumberInt(0)
});
db.getCollection("tb_order").insert({
  "_id": ObjectId("50c15e0d9c76848c10000085"),
  "anvy_id": "ANVY-006-001",
  "billing_contact": "",
  "company_id": NumberInt(10006),
  "date_created": ISODate("2012-12-06T17:00:00.0Z"),
  "date_required": ISODate("2012-12-11T17:00:00.0Z"),
  "delivery_method": NumberInt(0),
  "description": "ABC",
  "dispatch": NumberInt(0),
  "gross_order_amount": NumberInt(0),
  "location_id": NumberInt(0),
  "net_order_amount": NumberInt(0),
  "notes": "",
  "order_id": NumberInt(116),
  "order_type": NumberInt(0),
  "po_number": "FGL 0001",
  "raw_id": "006-001",
  "sale_rep": "Test *",
  "shipping_contact": null,
  "source": NumberInt(0),
  "status": NumberInt(2),
  "tax_1": NumberInt(0),
  "tax_2": NumberInt(0),
  "tax_3": NumberInt(0),
  "term": NumberInt(0),
  "total_discount": NumberInt(0),
  "total_order_amount": 298.35
});
db.getCollection("tb_order").insert({
  "_id": ObjectId("50c17aff9c76848f1000016f"),
  "order_id": NumberInt(117),
  "raw_id": "006-001",
  "anvy_id": "ANVY-006-001",
  "location_id": NumberInt(0),
  "company_id": NumberInt(10004),
  "po_number": "",
  "order_type": NumberInt(0),
  "shipping_contact": NumberInt(3),
  "total_order_amount": NumberInt(0),
  "total_discount": NumberInt(0),
  "billing_contact": "",
  "net_order_amount": NumberInt(0),
  "gross_order_amount": NumberInt(0),
  "description": "ABC",
  "sale_rep": "Test *",
  "date_created": ISODate("2012-12-06T17:00:00.0Z"),
  "date_required": ISODate("2012-12-11T17:00:00.0Z"),
  "term": NumberInt(0),
  "delivery_method": NumberInt(0),
  "source": NumberInt(0),
  "status": NumberInt(1),
  "dispatch": NumberInt(0),
  "tax_1": NumberInt(0),
  "tax_2": NumberInt(0),
  "tax_3": NumberInt(0)
});
db.getCollection("tb_order").insert({
  "_id": ObjectId("50c53d4b9c76843e04000049"),
  "anvy_id": "ANVY-006-001",
  "billing_contact": "",
  "company_id": NumberInt(10006),
  "date_created": ISODate("2012-12-09T17:00:00.0Z"),
  "date_required": ISODate("2012-12-31T17:00:00.0Z"),
  "delivery_method": NumberInt(0),
  "description": "This is a test order",
  "dispatch": NumberInt(0),
  "gross_order_amount": NumberInt(0),
  "location_id": NumberInt(0),
  "net_order_amount": NumberInt(0),
  "notes": "",
  "order_id": NumberInt(118),
  "order_ref": "ddddfd",
  "order_type": NumberInt(0),
  "po_number": "FGL 0002",
  "raw_id": "006-001",
  "sale_rep": "Test *",
  "shipping_contact": NumberInt(4),
  "source": NumberInt(0),
  "status": NumberInt(2),
  "tax_1": NumberInt(0),
  "tax_2": NumberInt(0),
  "tax_3": NumberInt(0),
  "term": NumberInt(0),
  "total_discount": NumberInt(0),
  "total_order_amount": 99.45
});
db.getCollection("tb_order").insert({
  "_id": ObjectId("50c55a5c9c7684f90b000058"),
  "anvy_id": "ANVY-006-001",
  "billing_contact": "",
  "company_id": NumberInt(10006),
  "date_created": ISODate("2012-12-09T17:00:00.0Z"),
  "date_required": ISODate("2013-09-10T17:00:00.0Z"),
  "delivery_method": NumberInt(0),
  "description": "This is a test",
  "dispatch": NumberInt(0),
  "gross_order_amount": NumberInt(0),
  "location_id": NumberInt(0),
  "net_order_amount": NumberInt(0),
  "notes": "",
  "order_id": NumberInt(119),
  "order_ref": "",
  "order_type": NumberInt(0),
  "po_number": "Test order FGL",
  "raw_id": "006-001",
  "sale_rep": "Test *",
  "shipping_contact": NumberInt(4),
  "source": NumberInt(0),
  "status": NumberInt(2),
  "tax_1": NumberInt(0),
  "tax_2": NumberInt(0),
  "tax_3": NumberInt(0),
  "term": NumberInt(0),
  "total_discount": NumberInt(0),
  "total_order_amount": 642.3
});
db.getCollection("tb_order").insert({
  "_id": ObjectId("50c586d09c76845811000065"),
  "anvy_id": "ANVY-006-001",
  "billing_contact": "",
  "company_id": NumberInt(10006),
  "date_created": ISODate("2012-12-09T17:00:00.0Z"),
  "date_required": ISODate("2013-12-31T17:00:00.0Z"),
  "delivery_method": NumberInt(0),
  "description": "Test #2",
  "dispatch": NumberInt(0),
  "gross_order_amount": NumberInt(0),
  "location_id": NumberInt(10004),
  "net_order_amount": NumberInt(0),
  "notes": "",
  "order_id": NumberInt(120),
  "order_ref": "",
  "order_type": NumberInt(0),
  "po_number": "0000002",
  "raw_id": "006-001",
  "sale_rep": "Test *",
  "shipping_contact": NumberInt(4),
  "source": NumberInt(0),
  "status": NumberInt(2),
  "tax_1": NumberInt(0),
  "tax_2": NumberInt(0),
  "tax_3": NumberInt(0),
  "term": NumberInt(0),
  "total_discount": NumberInt(0),
  "total_order_amount": 127
});
db.getCollection("tb_order").insert({
  "_id": ObjectId("50c5ab279c7684331a00009f"),
  "anvy_id": "ANVY-006-001",
  "billing_contact": "",
  "company_id": NumberInt(10006),
  "date_created": ISODate("2012-12-09T17:00:00.0Z"),
  "date_required": ISODate("1969-12-31T17:00:00.0Z"),
  "delivery_method": NumberInt(0),
  "description": "Test",
  "dispatch": NumberInt(0),
  "gross_order_amount": NumberInt(0),
  "location_id": NumberInt(10004),
  "net_order_amount": NumberInt(0),
  "notes": "",
  "order_id": NumberInt(121),
  "order_ref": "",
  "order_type": NumberInt(0),
  "po_number": "FGL 00004",
  "raw_id": "006-001",
  "sale_rep": "Test *",
  "shipping_contact": NumberInt(4),
  "source": NumberInt(0),
  "status": NumberInt(2),
  "tax_1": NumberInt(0),
  "tax_2": NumberInt(0),
  "tax_3": NumberInt(0),
  "term": NumberInt(0),
  "total_discount": NumberInt(0),
  "total_order_amount": 360
});
db.getCollection("tb_order").insert({
  "_id": ObjectId("50c5abe09c76848917000101"),
  "anvy_id": "ANVY-006-001",
  "billing_contact": "",
  "company_id": NumberInt(10006),
  "date_created": ISODate("2012-12-09T17:00:00.0Z"),
  "date_required": ISODate("1970-01-01T00:00:00.0Z"),
  "delivery_method": NumberInt(0),
  "description": "Test #5",
  "dispatch": NumberInt(0),
  "gross_order_amount": NumberInt(0),
  "location_id": NumberInt(10004),
  "net_order_amount": NumberInt(0),
  "notes": "",
  "order_id": NumberInt(122),
  "order_ref": "",
  "order_type": NumberInt(0),
  "po_number": "FGL 00005",
  "raw_id": "006-001",
  "sale_rep": "Test *",
  "shipping_contact": NumberInt(4),
  "source": NumberInt(0),
  "status": NumberInt(2),
  "tax_1": NumberInt(0),
  "tax_2": NumberInt(0),
  "tax_3": NumberInt(0),
  "term": NumberInt(0),
  "total_discount": NumberInt(0),
  "total_order_amount": 99.45
});
db.getCollection("tb_order").insert({
  "_id": ObjectId("50c5ac299c7684f41800007e"),
  "anvy_id": "ANVY-006-001",
  "billing_contact": "",
  "company_id": NumberInt(10006),
  "date_created": ISODate("2012-12-09T17:00:00.0Z"),
  "date_required": ISODate("2012-12-31T17:00:00.0Z"),
  "delivery_method": NumberInt(0),
  "description": "Test #6",
  "dispatch": NumberInt(0),
  "gross_order_amount": NumberInt(0),
  "location_id": NumberInt(10004),
  "net_order_amount": NumberInt(0),
  "notes": null,
  "order_id": NumberInt(123),
  "order_ref": "123456",
  "order_type": NumberInt(0),
  "po_number": "FGL 00006",
  "raw_id": "006-001",
  "sale_rep": "Test *",
  "shipping_contact": NumberInt(4),
  "source": NumberInt(0),
  "status": NumberInt(1),
  "tax_1": NumberInt(0),
  "tax_2": NumberInt(0),
  "tax_3": NumberInt(0),
  "term": NumberInt(0),
  "total_discount": NumberInt(0),
  "total_order_amount": 79.56
});
db.getCollection("tb_order").insert({
  "_id": ObjectId("50c5b6089c7684331a000139"),
  "anvy_id": "ANVY-006-001",
  "billing_contact": "",
  "company_id": NumberInt(10006),
  "date_created": ISODate("2012-12-09T17:00:00.0Z"),
  "date_required": ISODate("1969-12-31T17:00:00.0Z"),
  "delivery_method": NumberInt(0),
  "description": "Test # 9",
  "dispatch": NumberInt(0),
  "gross_order_amount": NumberInt(0),
  "location_id": NumberInt(10000),
  "net_order_amount": NumberInt(0),
  "notes": "",
  "order_id": NumberInt(124),
  "order_ref": "Test #9",
  "order_type": NumberInt(0),
  "po_number": "FGL 00009",
  "raw_id": "006-001",
  "sale_rep": "Test *",
  "shipping_contact": NumberInt(4),
  "source": NumberInt(0),
  "status": NumberInt(3),
  "tax_1": NumberInt(0),
  "tax_2": NumberInt(0),
  "tax_3": NumberInt(0),
  "term": NumberInt(0),
  "total_discount": NumberInt(0),
  "total_order_amount": 269.01
});
db.getCollection("tb_order").insert({
  "_id": ObjectId("50dd502b9c768440290000a3"),
  "anvy_id": "ANVY-006-001",
  "billing_contact": "",
  "company_id": NumberInt(10006),
  "date_created": ISODate("2012-12-28T07:54:19.0Z"),
  "date_required": ISODate("1970-01-01T00:00:00.0Z"),
  "delivery_method": NumberInt(0),
  "description": "sml;d",
  "dispatch": NumberInt(0),
  "gross_order_amount": NumberInt(0),
  "location_id": NumberInt(10000),
  "net_order_amount": NumberInt(0),
  "notes": "",
  "order_id": NumberInt(125),
  "order_ref": "dlksxd",
  "order_type": NumberInt(0),
  "po_number": "1234567",
  "raw_id": "006-001",
  "sale_rep": "Test *",
  "shipping_contact": NumberInt(4),
  "source": NumberInt(0),
  "status": NumberInt(2),
  "tax_1": NumberInt(0),
  "tax_2": NumberInt(0),
  "tax_3": NumberInt(0),
  "term": NumberInt(0),
  "total_discount": NumberInt(0),
  "total_order_amount": 327.78
});
db.getCollection("tb_order").insert({
  "_id": ObjectId("50b726e59c7684a006000017"),
  "anvy_id": "SO20121129001",
  "billing_contact": "0",
  "company_id": 10006,
  "date_created": ISODate("2012-11-29T09:11:46.0Z"),
  "date_required": ISODate("2012-11-29T09:11:46.0Z"),
  "delivery_method": NumberLong(0),
  "description": "Job Description",
  "dispatch": NumberLong(0),
  "gross_order_amount": 0,
  "net_order_amount": 0,
  "order_id": NumberLong(100),
  "order_type": NumberLong(0),
  "po_number": "01254",
  "raw_id": "006-0001",
  "sale_rep": "Test",
  "shipping_contact": "TEST ORDER",
  "source": NumberLong(0),
  "status": NumberInt(1),
  "tax_1": 0,
  "tax_2": 0,
  "tax_3": 0,
  "term": NumberLong(0),
  "total_discount": 0,
  "total_order_amount": 0
});

/** tb_order_items records **/
db.getCollection("tb_order_items").insert({
  "_id": ObjectId("50d7cefd3d5e55981100008c"),
  "allocation": [
    {
      "location_id": NumberInt(10000),
      "location_name": "FGL Sports Ltd #1",
      "location_address": "T2G5A7 - 05 Milner Avenue, Suite 400",
      "location_quantity": NumberInt(5),
      "location_price": 19.89,
      "product_id": NumberInt(37),
      "product_image": "SCF11_252_Snowboard_45x28_Sims_02.jpg",
      "product_name": " - Dibond 0.2 cm",
      "tracking_url": "",
      "tracking_number": "",
      "tracking_company": "",
      "date_shipping": ISODate("2012-12-24T03:41:49.0Z"),
      "delete": NumberInt(0)
    }
  ],
  "company_id": NumberInt(0),
  "current_image_option": NumberInt(0),
  "current_price": 19.89,
  "current_size_option": NumberInt(0),
  "current_text_option": NumberInt(0),
  "custom_image_path": "",
  "customization_information": "",
  "description": "",
  "discount_per_unit": NumberInt(0),
  "discount_price": NumberInt(0),
  "discount_type": NumberInt(0),
  "extended_amount": NumberInt(0),
  "graphic_file": "SCF11_252_Snowboard_45x28_Sims_02.jpg",
  "height": 27,
  "location_id": NumberInt(0),
  "material_color": "Blue",
  "material_id": NumberInt(4),
  "material_name": "Dibond",
  "material_thickness_unit": "cm",
  "material_thickness_value": 0.2,
  "net_price": NumberInt(0),
  "order_id": NumberInt(118),
  "order_item_id": NumberInt(19),
  "original_price": NumberInt(0),
  "package_id": NumberInt(0),
  "product_code": "FGL-SNOWBPOP-011",
  "product_id": NumberInt(37),
  "product_image_option": NumberInt(0),
  "product_size_option": NumberInt(0),
  "product_text_option": NumberInt(0),
  "quantity": NumberInt(5),
  "status": NumberInt(0),
  "text": [
    
  ],
  "total_price": 99.45,
  "unit": "in",
  "unit_price": NumberInt(0),
  "width": 22
});
db.getCollection("tb_order_items").insert({
  "_id": ObjectId("50bf00d33d5e55640e00032f"),
  "allocation": [
    {
      "date_shipping": ISODate("2012-12-08T02:54:35.0Z"),
      "location_address": "T2A 6A3 - 2915 - 10th Avenue NE",
      "location_id": NumberInt(1),
      "location_name": "Van Houtle (Calgary Office)",
      "location_price": 25,
      "location_quantity": NumberInt(4),
      "product_id": NumberInt(1),
      "product_image": "200_Tulips.jpg",
      "product_name": "Product detail for Blue Mountain Thermos Wrap - Foamcore 1 cm",
      "tracking_company": "UPS",
      "tracking_number": "g4t56f46",
      "tracking_url": "http:\/\/www.dhl.com.vn\/content\/vn\/en\/express\/tracking.shtml?brand=DHL&AWB=A2A567A%0D%0A"
    },
    {
      "date_shipping": ISODate("2012-12-08T03:07:36.0Z"),
      "location_address": "V3K 7B2 - 9 Burbridge Street",
      "location_id": NumberInt(1000000),
      "location_name": "Van Houtte - Coquitlam",
      "location_price": 25,
      "location_quantity": NumberInt(2),
      "product_id": NumberInt(1),
      "product_image": "200_Tulips.jpg",
      "product_name": "Product detail for Blue Mountain Thermos Wrap - Foamcore 1 cm",
      "shipping_status": NumberInt(0),
      "tracking_company": "UPS",
      "tracking_number": "g4t56f46",
      "tracking_url": "http:\/\/192.168.0.108\/rockmongo"
    }
  ],
  "company_id": NumberInt(10004),
  "current_price": 25,
  "customization_information": "",
  "description": "",
  "discount_per_unit": NumberInt(0),
  "discount_price": NumberInt(0),
  "discount_type": NumberInt(0),
  "extended_amount": NumberInt(0),
  "graphic_file": "",
  "height": 9,
  "location_id": NumberInt(0),
  "material_color": "DarkRed",
  "material_id": NumberInt(9),
  "material_name": "Foamcore",
  "material_thickness_unit": "cm",
  "material_thickness_value": "1",
  "net_price": NumberInt(0),
  "order_id": NumberInt(114),
  "order_item_id": NumberInt(1),
  "original_price": NumberInt(0),
  "package_id": NumberInt(0),
  "product_code": "00-01-SR",
  "product_id": NumberInt(1),
  "quantity": NumberInt(6),
  "status": NumberInt(1),
  "total_price": 150,
  "unit": "in",
  "unit_price": NumberInt(0),
  "width": 22
});
db.getCollection("tb_order_items").insert({
  "_id": ObjectId("50bf00d33d5e55640e000330"),
  "allocation": [
    {
      "date_shipping": ISODate("2012-12-08T02:54:35.0Z"),
      "location_address": "T2A 6A3 - 2915 - 10th Avenue NE",
      "location_id": NumberInt(1),
      "location_name": "Van Houtle (Calgary Office)",
      "location_price": 15,
      "location_quantity": NumberInt(3),
      "product_id": NumberInt(2),
      "product_image": "200_",
      "product_name": "Product detail ... - Sintra 3mm in",
      "tracking_company": "UPS",
      "tracking_number": "g4t56f46",
      "tracking_url": "http:\/\/www.dhl.com.vn\/content\/vn\/en\/express\/tracking.shtml?brand=DHL&AWB=A2A567A%0D%0A"
    },
    {
      "date_shipping": ISODate("2012-12-08T03:07:36.0Z"),
      "location_address": "V3K 7B2 - 9 Burbridge Street",
      "location_id": NumberInt(1000000),
      "location_name": "Van Houtte - Coquitlam",
      "location_price": 15,
      "location_quantity": NumberInt(4),
      "product_id": NumberInt(2),
      "product_image": "200_",
      "product_name": "Product detail ... - Sintra 3mm in",
      "shipping_status": NumberInt(0),
      "tracking_company": "UPS",
      "tracking_number": "g4t56f46",
      "tracking_url": "http:\/\/192.168.0.108\/rockmongo"
    }
  ],
  "company_id": NumberInt(10004),
  "current_price": 15,
  "customization_information": "",
  "description": "",
  "discount_per_unit": NumberInt(0),
  "discount_price": NumberInt(0),
  "discount_type": NumberInt(0),
  "extended_amount": NumberInt(0),
  "graphic_file": "",
  "height": 7,
  "location_id": NumberInt(0),
  "material_color": "Black",
  "material_id": NumberInt(2),
  "material_name": "Sintra",
  "material_thickness_unit": "in",
  "material_thickness_value": "3mm",
  "net_price": NumberInt(0),
  "order_id": NumberInt(114),
  "order_item_id": NumberInt(2),
  "original_price": NumberInt(0),
  "package_id": NumberInt(0),
  "product_code": "BB-01-02",
  "product_id": NumberInt(2),
  "quantity": NumberInt(7),
  "status": NumberInt(1),
  "total_price": 105,
  "unit": "in",
  "unit_price": NumberInt(0),
  "width": 3
});
db.getCollection("tb_order_items").insert({
  "_id": ObjectId("50bf1b373d5e55981800005f"),
  "allocation": [
    {
      "location_id": NumberInt(1),
      "location_name": "Van Houtle (Calgary Office)",
      "location_address": "T2A 6A3 - 2915 - 10th Avenue NE",
      "location_quantity": NumberInt(6),
      "location_price": 25,
      "product_id": NumberInt(1),
      "product_image": "200_Tulips.jpg",
      "product_name": "Product detail for Blue Mountain Thermos Wrap - Foamcore 1 cm",
      "tracking_url": null,
      "tracking_number": null,
      "tracking_company": null,
      "date_shipping": null
    },
    {
      "date_shipping": ISODate("2012-12-08T01:54:34.0Z"),
      "location_address": "V3K 7B2 - 9 Burbridge Street",
      "location_id": NumberInt(1000000),
      "location_name": "Van Houtte - Coquitlam",
      "location_price": 25,
      "location_quantity": NumberInt(2),
      "product_id": NumberInt(1),
      "product_image": "200_Tulips.jpg",
      "product_name": "Product detail for Blue Mountain Thermos Wrap - Foamcore 1 cm",
      "tracking_company": "UPS",
      "tracking_number": "g15j68",
      "tracking_url": ""
    }
  ],
  "company_id": NumberInt(10004),
  "current_price": 25,
  "customization_information": "",
  "description": "",
  "discount_per_unit": NumberInt(0),
  "discount_price": NumberInt(0),
  "discount_type": NumberInt(0),
  "extended_amount": NumberInt(0),
  "graphic_file": "",
  "height": 9,
  "location_id": NumberInt(0),
  "material_color": "DarkSlateGrey",
  "material_id": NumberInt(9),
  "material_name": "Foamcore",
  "material_thickness_unit": "cm",
  "material_thickness_value": "1",
  "net_price": NumberInt(0),
  "order_id": NumberInt(115),
  "order_item_id": NumberInt(3),
  "original_price": NumberInt(0),
  "package_id": NumberInt(0),
  "product_code": "00-01-SR",
  "product_id": NumberInt(1),
  "quantity": NumberInt(20),
  "status": NumberInt(1),
  "text": [
    
  ],
  "total_price": 500,
  "unit": "in",
  "unit_price": NumberInt(0),
  "width": 22
});
db.getCollection("tb_order_items").insert({
  "_id": ObjectId("50bf1b373d5e559818000060"),
  "allocation": [
    {
      "location_id": NumberInt(1),
      "location_name": "Van Houtle (Calgary Office)",
      "location_address": "T2A 6A3 - 2915 - 10th Avenue NE",
      "location_quantity": NumberInt(8),
      "location_price": 15,
      "product_id": NumberInt(2),
      "product_image": "200_",
      "product_name": "Product detail ... - Sintra 3mm in",
      "tracking_url": null,
      "tracking_number": null,
      "tracking_company": null,
      "date_shipping": null
    },
    {
      "date_shipping": ISODate("2012-12-08T01:54:34.0Z"),
      "location_address": "V3K 7B2 - 9 Burbridge Street",
      "location_id": NumberInt(1000000),
      "location_name": "Van Houtte - Coquitlam",
      "location_price": 15,
      "location_quantity": NumberInt(4),
      "product_id": NumberInt(2),
      "product_image": "200_",
      "product_name": "Product detail ... - Sintra 3mm in",
      "tracking_company": "UPS",
      "tracking_number": "g15j68",
      "tracking_url": ""
    }
  ],
  "company_id": NumberInt(10004),
  "current_price": 15,
  "customization_information": "",
  "description": "",
  "discount_per_unit": NumberInt(0),
  "discount_price": NumberInt(0),
  "discount_type": NumberInt(0),
  "extended_amount": NumberInt(0),
  "graphic_file": "",
  "height": 4,
  "location_id": NumberInt(0),
  "material_color": "Black",
  "material_id": NumberInt(2),
  "material_name": "Sintra",
  "material_thickness_unit": "in",
  "material_thickness_value": "3mm",
  "net_price": NumberInt(0),
  "order_id": NumberInt(115),
  "order_item_id": NumberInt(4),
  "original_price": NumberInt(0),
  "package_id": NumberInt(0),
  "product_code": "BB-01-02",
  "product_id": NumberInt(2),
  "quantity": NumberInt(12),
  "status": NumberInt(1),
  "total_price": 180,
  "unit": "in",
  "unit_price": NumberInt(0),
  "width": 3
});
db.getCollection("tb_order_items").insert({
  "_id": ObjectId("50c544839c7684b206000077"),
  "allocation": [
    
  ],
  "company_id": NumberInt(10004),
  "current_price": 15,
  "customization_information": "",
  "description": "Not Allocated",
  "discount_per_unit": NumberInt(0),
  "discount_price": NumberInt(0),
  "discount_type": NumberInt(0),
  "extended_amount": NumberInt(0),
  "graphic_file": "200_thumbnail_sc07.jpg",
  "height": 28,
  "location_id": NumberInt(0),
  "material_color": "Black",
  "material_id": NumberInt(5),
  "material_name": "Styrene",
  "material_thickness_unit": "in",
  "material_thickness_value": "0.040",
  "net_price": NumberInt(0),
  "order_id": NumberInt(113),
  "order_item_id": NumberInt(0),
  "original_price": NumberInt(0),
  "package_id": NumberInt(0),
  "product_code": "FGL-SKIPOP-001",
  "product_id": NumberInt(4),
  "quantity": NumberInt(6),
  "status": NumberInt(1),
  "text": [
    
  ],
  "total_price": 90,
  "unit": "in",
  "unit_price": NumberInt(0),
  "width": 45
});
db.getCollection("tb_order_items").insert({
  "_id": ObjectId("50c55a5c9c7684f90b000059"),
  "allocation": [
    {
      "location_id": NumberInt(10002),
      "location_name": "Leaside",
      "location_address": "M4G 4K1 - 147 Laird Drive",
      "location_quantity": NumberInt(6),
      "location_price": 10,
      "product_id": NumberInt(8),
      "product_image": "200_thumbnail_sc04.jpg",
      "product_name": "NC-POP_04 - Styrene 0.002 in",
      "tracking_url": "---",
      "tracking_number": "---",
      "tracking_company": "---",
      "date_shipping": ISODate("2013-01-09T03:50:03.0Z")
    },
    {
      "location_id": NumberInt(10001),
      "location_name": "Corner Brook Plaza",
      "location_address": "A2H 6L8 - 54 Maple Valley Road",
      "location_quantity": NumberInt(5),
      "location_price": 10,
      "product_id": NumberInt(8),
      "product_image": "200_thumbnail_sc04.jpg",
      "product_name": "NC-POP_04 - Styrene 0.002 in",
      "tracking_url": "---",
      "tracking_number": "---",
      "tracking_company": "---",
      "date_shipping": ISODate("2013-01-09T03:50:03.0Z")
    }
  ],
  "company_id": NumberInt(10006),
  "current_price": 10,
  "customization_information": "",
  "description": "",
  "discount_per_unit": NumberInt(0),
  "discount_price": NumberInt(0),
  "discount_type": NumberInt(0),
  "extended_amount": NumberInt(0),
  "graphic_file": "200_thumbnail_sc04.jpg",
  "height": 8.5,
  "location_id": NumberInt(0),
  "material_color": "Black",
  "material_id": NumberInt(5),
  "material_name": "Styrene",
  "material_thickness_unit": "in",
  "material_thickness_value": "0.002",
  "net_price": NumberInt(0),
  "order_id": NumberInt(119),
  "order_item_id": NumberInt(7),
  "original_price": NumberInt(0),
  "package_id": NumberInt(0),
  "product_code": "NC-POP_04",
  "product_id": NumberInt(8),
  "quantity": NumberInt(11),
  "status": NumberInt(0),
  "text": [
    
  ],
  "total_price": 110,
  "unit": "in",
  "unit_price": NumberInt(0),
  "width": 11
});
db.getCollection("tb_order_items").insert({
  "_id": ObjectId("50c55c009c7684cd0700007a"),
  "allocation": [
    {
      "location_id": NumberInt(10002),
      "location_name": "Leaside",
      "location_address": "M4G 4K1 - 147 Laird Drive",
      "location_quantity": NumberInt(5),
      "location_price": 64.23,
      "product_id": NumberInt(9),
      "product_image": "200_tn_NC_POP_05.jpg",
      "product_name": "NC-POP_05 - Styrene 0.002 in",
      "tracking_url": "",
      "tracking_number": "",
      "tracking_company": "",
      "date_shipping": ISODate("2013-01-09T09:16:34.0Z")
    },
    {
      "location_id": NumberInt(10001),
      "location_name": "Corner Brook Plaza",
      "location_address": "A2H 6L8 - 54 Maple Valley Road",
      "location_quantity": NumberInt(3),
      "location_price": 64.23,
      "product_id": NumberInt(9),
      "product_image": "200_tn_NC_POP_05.jpg",
      "product_name": "NC-POP_05 - Styrene 0.002 in",
      "tracking_url": "",
      "tracking_number": "",
      "tracking_company": "",
      "date_shipping": ISODate("2013-01-09T09:16:34.0Z")
    },
    {
      "location_id": NumberInt(10000),
      "location_name": "FGL Sports Ltd #1",
      "location_address": "T2G5A7 - 05 Milner Avenue, Suite 400",
      "location_quantity": NumberInt(2),
      "location_price": 64.23,
      "product_id": NumberInt(9),
      "product_image": "200_tn_NC_POP_05.jpg",
      "product_name": "NC-POP_05 - Styrene 0.002 in",
      "tracking_url": "",
      "tracking_number": "",
      "tracking_company": "",
      "date_shipping": ISODate("2013-01-09T09:16:34.0Z")
    }
  ],
  "company_id": NumberInt(10006),
  "current_price": 64.23,
  "customization_information": "",
  "description": "Already Allocated",
  "discount_per_unit": NumberInt(0),
  "discount_price": NumberInt(0),
  "discount_type": NumberInt(0),
  "extended_amount": NumberInt(0),
  "graphic_file": "200_tn_NC_POP_05.jpg",
  "height": 59,
  "location_id": NumberInt(0),
  "material_color": "Black",
  "material_id": NumberInt(5),
  "material_name": "Styrene",
  "material_thickness_unit": "in",
  "material_thickness_value": "0.002",
  "net_price": NumberInt(0),
  "order_id": NumberInt(119),
  "order_item_id": NumberInt(8),
  "original_price": NumberInt(0),
  "package_id": NumberInt(0),
  "product_code": "NC-POP_05",
  "product_id": NumberInt(9),
  "quantity": NumberInt(10),
  "status": NumberInt(0),
  "text": [
    
  ],
  "total_price": 642.3,
  "unit": "in",
  "unit_price": NumberInt(0),
  "width": 28
});
db.getCollection("tb_order_items").insert({
  "_id": ObjectId("50c586d09c76845811000066"),
  "allocation": [
    {
      "location_id": NumberInt(10002),
      "location_name": "Leaside",
      "location_address": "M4G 4K1 - 147 Laird Drive",
      "location_quantity": NumberInt(13),
      "location_price": 96,
      "product_id": NumberInt(7),
      "product_image": "200_thumbnail_sc03.jpg",
      "product_name": "NC-POP_06 - Styrene 0.002 in",
      "tracking_url": "---",
      "tracking_number": "---",
      "tracking_company": "---",
      "date_shipping": ISODate("2013-01-09T08:25:47.0Z")
    },
    {
      "location_id": NumberInt(10001),
      "location_name": "Corner Brook Plaza",
      "location_address": "A2H 6L8 - 54 Maple Valley Road",
      "location_quantity": NumberInt(2),
      "location_price": 96,
      "product_id": NumberInt(7),
      "product_image": "200_thumbnail_sc03.jpg",
      "product_name": "NC-POP_06 - Styrene 0.002 in",
      "tracking_url": "---",
      "tracking_number": "---",
      "tracking_company": "---",
      "date_shipping": ISODate("2013-01-09T08:25:47.0Z")
    }
  ],
  "company_id": NumberInt(10006),
  "current_price": 96,
  "customization_information": "",
  "description": "Already Allocated",
  "discount_per_unit": NumberInt(0),
  "discount_price": NumberInt(0),
  "discount_type": NumberInt(0),
  "extended_amount": NumberInt(0),
  "graphic_file": "200_thumbnail_sc03.jpg",
  "height": 72,
  "location_id": NumberInt(10004),
  "material_color": "Black",
  "material_id": NumberInt(5),
  "material_name": "Styrene",
  "material_thickness_unit": "in",
  "material_thickness_value": "0.002",
  "net_price": NumberInt(0),
  "order_id": NumberInt(120),
  "order_item_id": NumberInt(10),
  "original_price": NumberInt(0),
  "package_id": NumberInt(0),
  "product_code": "NC-POP_06",
  "product_id": NumberInt(7),
  "quantity": NumberInt(15),
  "status": NumberInt(0),
  "text": [
    
  ],
  "total_price": 1440,
  "unit": "in",
  "unit_price": NumberInt(0),
  "width": 48
});
db.getCollection("tb_order_items").insert({
  "_id": ObjectId("50c5a80e9c7684331a000048"),
  "allocation": [
    {
      "location_id": NumberInt(10002),
      "location_name": "Leaside",
      "location_address": "M4G 4K1 - 147 Laird Drive",
      "location_quantity": NumberInt(5),
      "location_price": 15,
      "product_id": NumberInt(4),
      "product_image": "200_thumbnail_sc07.jpg",
      "product_name": "FGL-SKIPOP-001 - Styrene 0.040 in",
      "tracking_url": "",
      "tracking_number": "",
      "tracking_company": "",
      "date_shipping": ISODate("2013-01-09T09:22:25.0Z")
    },
    {
      "location_id": NumberInt(10001),
      "location_name": "Corner Brook Plaza",
      "location_address": "A2H 6L8 - 54 Maple Valley Road",
      "location_quantity": NumberInt(7),
      "location_price": 15,
      "product_id": NumberInt(4),
      "product_image": "200_thumbnail_sc07.jpg",
      "product_name": "FGL-SKIPOP-001 - Styrene 0.040 in",
      "tracking_url": "",
      "tracking_number": "",
      "tracking_company": "",
      "date_shipping": ISODate("2013-01-09T09:22:25.0Z")
    },
    {
      "location_id": NumberInt(10000),
      "location_name": "FGL Sports Ltd #1",
      "location_address": "T2G5A7 - 05 Milner Avenue, Suite 400",
      "location_quantity": NumberInt(8),
      "location_price": 15,
      "product_id": NumberInt(4),
      "product_image": "200_thumbnail_sc07.jpg",
      "product_name": "FGL-SKIPOP-001 - Styrene 0.040 in",
      "tracking_url": "",
      "tracking_number": "",
      "tracking_company": "",
      "date_shipping": ISODate("2013-01-09T09:22:25.0Z")
    }
  ],
  "company_id": NumberInt(10006),
  "current_price": 15,
  "customization_information": "",
  "description": "Already Allocated",
  "discount_per_unit": NumberInt(0),
  "discount_price": NumberInt(0),
  "discount_type": NumberInt(0),
  "extended_amount": NumberInt(0),
  "graphic_file": "200_thumbnail_sc07.jpg",
  "height": 28,
  "location_id": NumberInt(0),
  "material_color": "Black",
  "material_id": NumberInt(5),
  "material_name": "Styrene",
  "material_thickness_unit": "in",
  "material_thickness_value": "0.040",
  "net_price": NumberInt(0),
  "order_id": NumberInt(118),
  "order_item_id": NumberInt(13),
  "original_price": NumberInt(0),
  "package_id": NumberInt(0),
  "product_code": "FGL-SKIPOP-001",
  "product_id": NumberInt(4),
  "quantity": NumberInt(20),
  "status": NumberInt(0),
  "text": [
    
  ],
  "total_price": 300,
  "unit": "in",
  "unit_price": NumberInt(0),
  "width": 45
});
db.getCollection("tb_order_items").insert({
  "_id": ObjectId("50c5ab279c7684331a0000a0"),
  "allocation": [
    {
      "location_id": NumberInt(10002),
      "location_name": "Leaside",
      "location_address": "M4G 4K1 - 147 Laird Drive",
      "location_quantity": NumberInt(9),
      "location_price": 15,
      "product_id": NumberInt(3),
      "product_image": "200_thumbnail_sc08.jpg",
      "product_name": "Product_detail_ - Sintra 3mm in",
      "tracking_url": "",
      "tracking_number": "",
      "tracking_company": "",
      "date_shipping": ISODate("2013-01-09T09:27:39.0Z"),
      "shipping_status": NumberInt(0)
    },
    {
      "location_id": NumberInt(10001),
      "location_name": "Corner Brook Plaza",
      "location_address": "A2H 6L8 - 54 Maple Valley Road",
      "location_quantity": NumberInt(15),
      "location_price": 15,
      "product_id": NumberInt(3),
      "product_image": "200_thumbnail_sc08.jpg",
      "product_name": "Product_detail_ - Sintra 3mm in",
      "tracking_url": "",
      "tracking_number": "",
      "tracking_company": "",
      "date_shipping": ISODate("2013-01-09T09:27:39.0Z"),
      "shipping_status": NumberInt(0)
    }
  ],
  "company_id": NumberInt(10006),
  "current_price": 15,
  "customization_information": "",
  "description": "",
  "discount_per_unit": NumberInt(0),
  "discount_price": NumberInt(0),
  "discount_type": NumberInt(0),
  "extended_amount": NumberInt(0),
  "graphic_file": "200_thumbnail_sc08.jpg",
  "height": 7,
  "location_id": NumberInt(10004),
  "material_color": "Black",
  "material_id": NumberInt(2),
  "material_name": "Sintra",
  "material_thickness_unit": "in",
  "material_thickness_value": "3mm",
  "net_price": NumberInt(0),
  "order_id": NumberInt(121),
  "order_item_id": NumberInt(14),
  "original_price": NumberInt(0),
  "package_id": NumberInt(0),
  "product_code": "FGL-SKIPOP-002",
  "product_id": NumberInt(3),
  "quantity": NumberInt(24),
  "status": NumberInt(0),
  "text": [
    
  ],
  "total_price": 360,
  "unit": "in",
  "unit_price": NumberInt(0),
  "width": 3
});
db.getCollection("tb_order_items").insert({
  "_id": ObjectId("50c5abe09c76848917000102"),
  "allocation": [
    {
      "date_shipping": ISODate("2012-12-10T09:39:17.0Z"),
      "location_address": "M4G 4K1 - 147 Laird Drive",
      "location_id": NumberInt(10002),
      "location_name": "Leaside",
      "location_price": 19.89,
      "location_quantity": NumberInt(5),
      "product_id": NumberInt(37),
      "product_image": "200_SCF11_252_Snowboard_45x28_Sims_02.jpg",
      "product_name": " - Styrene 0.020 in",
      "shipping_status": NumberInt(0),
      "tracking_company": "Purolator",
      "tracking_number": "Puro123",
      "tracking_url": ""
    }
  ],
  "company_id": NumberInt(10006),
  "current_price": 19.89,
  "customization_information": "",
  "description": "",
  "discount_per_unit": NumberInt(0),
  "discount_price": NumberInt(0),
  "discount_type": NumberInt(0),
  "extended_amount": NumberInt(0),
  "graphic_file": "200_SCF11_252_Snowboard_45x28_Sims_02.jpg",
  "height": 28,
  "location_id": NumberInt(10004),
  "material_color": "Black",
  "material_id": NumberInt(5),
  "material_name": "Styrene",
  "material_thickness_unit": "in",
  "material_thickness_value": "0.020",
  "net_price": NumberInt(0),
  "order_id": NumberInt(122),
  "order_item_id": NumberInt(15),
  "original_price": NumberInt(0),
  "package_id": NumberInt(0),
  "product_code": "FGL-SNOWBPOP-011",
  "product_id": NumberInt(37),
  "quantity": NumberInt(5),
  "status": NumberInt(0),
  "text": [
    
  ],
  "total_price": 99.45,
  "unit": "in",
  "unit_price": NumberInt(0),
  "width": 45
});
db.getCollection("tb_order_items").insert({
  "_id": ObjectId("50c5ac299c7684f41800007f"),
  "allocation": [
    {
      "location_id": NumberInt(10002),
      "location_name": "Leaside",
      "location_address": "M4G 4K1 - 147 Laird Drive",
      "location_quantity": NumberInt(3),
      "location_price": 19.89,
      "product_id": NumberInt(37),
      "product_image": "200_SCF11_252_Snowboard_45x28_Sims_02.jpg",
      "product_name": " - Styrene 0.020 in",
      "tracking_url": "",
      "tracking_number": "",
      "tracking_company": "",
      "date_shipping": ISODate("2012-12-10T09:32:07.0Z"),
      "shipping_status": NumberInt(0)
    }
  ],
  "company_id": NumberInt(10006),
  "current_price": 19.89,
  "customization_information": "",
  "description": "",
  "discount_per_unit": NumberInt(0),
  "discount_price": NumberInt(0),
  "discount_type": NumberInt(0),
  "extended_amount": NumberInt(0),
  "graphic_file": "200_SCF11_252_Snowboard_45x28_Sims_02.jpg",
  "height": 28,
  "location_id": NumberInt(10004),
  "material_color": "Black",
  "material_id": NumberInt(5),
  "material_name": "Styrene",
  "material_thickness_unit": "in",
  "material_thickness_value": "0.020",
  "net_price": NumberInt(0),
  "order_id": NumberInt(123),
  "order_item_id": NumberInt(16),
  "original_price": NumberInt(0),
  "package_id": NumberInt(0),
  "product_code": "FGL-SNOWBPOP-011",
  "product_id": NumberInt(37),
  "quantity": NumberInt(3),
  "status": NumberInt(0),
  "text": [
    
  ],
  "total_price": 59.67,
  "unit": "in",
  "unit_price": NumberInt(0),
  "width": 45
});
db.getCollection("tb_order_items").insert({
  "_id": ObjectId("50c5b6089c7684331a00013a"),
  "allocation": [
    {
      "date_shipping": ISODate("2012-12-10T10:16:52.0Z"),
      "location_address": "M4G 4K1 - 147 Laird Drive",
      "location_id": NumberInt(10002),
      "location_name": "Leaside",
      "location_price": 19.89,
      "location_quantity": NumberInt(4),
      "product_id": NumberInt(37),
      "product_image": "200_SCF11_252_Snowboard_45x28_Sims_02.jpg",
      "product_name": " - Styrene 0.020 in",
      "shipping_status": NumberInt(1),
      "tracking_company": "Purolator",
      "tracking_number": "124-Leaside",
      "tracking_url": ""
    },
    {
      "date_shipping": ISODate("2012-12-10T10:17:27.0Z"),
      "location_address": "A2H 6L8 - 54 Maple Valley Road",
      "location_id": NumberInt(10001),
      "location_name": "Corner Brook Plaza",
      "location_price": 19.89,
      "location_quantity": NumberInt(4),
      "product_id": NumberInt(37),
      "product_image": "200_SCF11_252_Snowboard_45x28_Sims_02.jpg",
      "product_name": " - Styrene 0.020 in",
      "shipping_status": NumberInt(1),
      "tracking_company": "Purolator",
      "tracking_number": "124-Cornerbrook",
      "tracking_url": ""
    },
    {
      "date_shipping": ISODate("2012-12-10T10:17:50.0Z"),
      "location_address": "T2G5A7 - 05 Milner Avenue, Suite 400",
      "location_id": NumberInt(10000),
      "location_name": "FGL Sports Ltd #1",
      "location_price": 19.89,
      "location_quantity": NumberInt(1),
      "product_id": NumberInt(37),
      "product_image": "200_SCF11_252_Snowboard_45x28_Sims_02.jpg",
      "product_name": " - Styrene 0.020 in",
      "shipping_status": NumberInt(1),
      "tracking_company": "Purolator",
      "tracking_number": "124-HO",
      "tracking_url": ""
    }
  ],
  "company_id": NumberInt(10006),
  "current_price": 19.89,
  "customization_information": "",
  "description": "",
  "discount_per_unit": NumberInt(0),
  "discount_price": NumberInt(0),
  "discount_type": NumberInt(0),
  "extended_amount": NumberInt(0),
  "graphic_file": "200_SCF11_252_Snowboard_45x28_Sims_02.jpg",
  "height": 28,
  "location_id": NumberInt(10000),
  "material_color": "Black",
  "material_id": NumberInt(5),
  "material_name": "Styrene",
  "material_thickness_unit": "in",
  "material_thickness_value": "0.020",
  "net_price": NumberInt(0),
  "order_id": NumberInt(124),
  "order_item_id": NumberInt(17),
  "original_price": NumberInt(0),
  "package_id": NumberInt(0),
  "product_code": "FGL-SNOWBPOP-011",
  "product_id": NumberInt(37),
  "quantity": NumberInt(9),
  "status": NumberInt(0),
  "text": [
    
  ],
  "total_price": 179.01,
  "unit": "in",
  "unit_price": NumberInt(0),
  "width": 45
});
db.getCollection("tb_order_items").insert({
  "_id": ObjectId("50c5b6089c7684331a00013b"),
  "allocation": [
    {
      "date_shipping": ISODate("2012-12-10T10:16:52.0Z"),
      "location_address": "M4G 4K1 - 147 Laird Drive",
      "location_id": NumberInt(10000),
      "location_name": "FGL Sports Ltd #1",
      "location_price": NumberLong(15),
      "location_quantity": NumberInt(3),
      "product_id": NumberInt(3),
      "product_image": "200_thumbnail_sc08.jpg",
      "product_name": "Product_detail_ - Sintra 3mm in",
      "shipping_status": NumberInt(1),
      "tracking_company": "Purolator",
      "tracking_number": "124-Leaside",
      "tracking_url": ""
    },
    {
      "date_shipping": ISODate("2012-12-10T10:17:27.0Z"),
      "location_address": "A2H 6L8 - 54 Maple Valley Road",
      "location_id": NumberInt(10000),
      "location_name": "FGL Sports Ltd #1",
      "location_price": NumberLong(15),
      "location_quantity": NumberInt(3),
      "product_id": NumberInt(3),
      "product_image": "200_thumbnail_sc08.jpg",
      "product_name": "Product_detail_ - Sintra 3mm in",
      "shipping_status": NumberInt(1),
      "tracking_company": "Purolator",
      "tracking_number": "124-Cornerbrook",
      "tracking_url": ""
    }
  ],
  "company_id": NumberInt(10006),
  "current_price": NumberLong(15),
  "customization_information": "",
  "description": "",
  "discount_per_unit": NumberInt(0),
  "discount_price": NumberInt(0),
  "discount_type": NumberInt(0),
  "extended_amount": NumberInt(0),
  "graphic_file": "200_thumbnail_sc08.jpg",
  "height": NumberLong(7),
  "location_id": NumberInt(10000),
  "material_color": "Black",
  "material_id": NumberInt(2),
  "material_name": "Sintra",
  "material_thickness_unit": "in",
  "material_thickness_value": "3mm",
  "net_price": NumberInt(0),
  "order_id": NumberInt(124),
  "order_item_id": NumberInt(18),
  "original_price": NumberInt(0),
  "package_id": NumberInt(0),
  "product_code": "FGL-SKIPOP-002",
  "product_id": NumberInt(3),
  "quantity": NumberInt(6),
  "status": NumberInt(0),
  "text": [
    
  ],
  "total_price": NumberLong(90),
  "unit": "in",
  "unit_price": NumberInt(0),
  "width": NumberLong(3)
});
db.getCollection("tb_order_items").insert({
  "_id": ObjectId("50c5976e9c7684041700001b"),
  "allocation": [
    {
      "location_id": NumberInt(10002),
      "location_name": "Leaside",
      "location_address": "M4G 4K1 - 147 Laird Drive",
      "location_quantity": NumberInt(5),
      "location_price": 19.89,
      "product_id": NumberInt(37),
      "product_image": "200_SCF11_252_Snowboard_45x28_Sims_02.jpg",
      "product_name": "FGL-SNOWBPOP-011 - Styrene 0.020 in",
      "tracking_url": "---",
      "tracking_number": "---",
      "tracking_company": "---",
      "date_shipping": ISODate("2013-01-09T08:04:52.0Z")
    },
    {
      "location_id": NumberInt(10001),
      "location_name": "Corner Brook Plaza",
      "location_address": "A2H 6L8 - 54 Maple Valley Road",
      "location_quantity": NumberInt(5),
      "location_price": 19.89,
      "product_id": NumberInt(37),
      "product_image": "200_SCF11_252_Snowboard_45x28_Sims_02.jpg",
      "product_name": "FGL-SNOWBPOP-011 - Styrene 0.020 in",
      "tracking_url": "---",
      "tracking_number": "---",
      "tracking_company": "---",
      "date_shipping": ISODate("2013-01-09T08:04:52.0Z")
    },
    {
      "location_id": NumberInt(10000),
      "location_name": "FGL Sports Ltd #1",
      "location_address": "T2G5A7 - 05 Milner Avenue, Suite 400",
      "location_quantity": NumberInt(5),
      "location_price": 19.89,
      "product_id": NumberInt(37),
      "product_image": "200_SCF11_252_Snowboard_45x28_Sims_02.jpg",
      "product_name": "FGL-SNOWBPOP-011 - Styrene 0.020 in",
      "tracking_url": "---",
      "tracking_number": "---",
      "tracking_company": "---",
      "date_shipping": ISODate("2013-01-09T08:04:52.0Z")
    }
  ],
  "company_id": NumberInt(10006),
  "current_price": 19.89,
  "customization_information": "",
  "description": "Already Allocated",
  "discount_per_unit": NumberInt(0),
  "discount_price": NumberInt(0),
  "discount_type": NumberInt(0),
  "extended_amount": NumberInt(0),
  "graphic_file": "200_SCF11_252_Snowboard_45x28_Sims_02.jpg",
  "height": 28,
  "location_id": NumberInt(0),
  "material_color": "Black",
  "material_id": NumberInt(5),
  "material_name": "Styrene",
  "material_thickness_unit": "in",
  "material_thickness_value": "0.020",
  "net_price": NumberInt(0),
  "order_id": NumberInt(116),
  "order_item_id": NumberInt(11),
  "original_price": NumberInt(0),
  "package_id": NumberInt(0),
  "product_code": "FGL-SNOWBPOP-011",
  "product_id": NumberInt(37),
  "quantity": NumberInt(15),
  "status": NumberInt(0),
  "text": [
    
  ],
  "total_price": 298.35,
  "unit": "in",
  "unit_price": NumberInt(0),
  "width": 45
});
db.getCollection("tb_order_items").insert({
  "_id": ObjectId("50d7d53c3d5e5598110002a3"),
  "allocation": [
    {
      "location_id": NumberInt(10000),
      "location_name": "FGL Sports Ltd #1",
      "location_address": "T2G5A7 - 05 Milner Avenue, Suite 400",
      "location_quantity": NumberInt(6),
      "location_price": 15,
      "product_id": NumberInt(4),
      "product_image": "thumbnail_sc07.jpg",
      "product_name": "Product_detail_ - Backlit Film 0.01 cm",
      "tracking_url": "",
      "tracking_number": "",
      "tracking_company": "",
      "date_shipping": ISODate("2012-12-24T04:08:28.0Z"),
      "delete": NumberInt(0)
    }
  ],
  "company_id": NumberInt(0),
  "current_image_option": NumberInt(0),
  "current_price": 15,
  "current_size_option": NumberInt(0),
  "current_text_option": NumberInt(0),
  "custom_image_path": "",
  "customization_information": "",
  "description": "",
  "discount_per_unit": NumberInt(0),
  "discount_price": NumberInt(0),
  "discount_type": NumberInt(0),
  "extended_amount": NumberInt(0),
  "graphic_file": "thumbnail_sc07.jpg",
  "height": 45,
  "location_id": NumberInt(0),
  "material_color": "BlueViolet",
  "material_id": NumberInt(17),
  "material_name": "Backlit Film",
  "material_thickness_unit": "cm",
  "material_thickness_value": 0.01,
  "net_price": NumberInt(0),
  "order_id": NumberInt(123),
  "order_item_id": NumberInt(24),
  "original_price": NumberInt(0),
  "package_id": NumberInt(0),
  "product_code": "FGL-SKIPOP-001",
  "product_id": NumberInt(4),
  "product_image_option": NumberInt(0),
  "product_size_option": NumberInt(0),
  "product_text_option": NumberInt(0),
  "quantity": NumberInt(6),
  "status": NumberInt(0),
  "text": [
    
  ],
  "total_price": 90,
  "unit": "in",
  "unit_price": NumberInt(0),
  "width": 40
});
db.getCollection("tb_order_items").insert({
  "_id": ObjectId("50d7d2523d5e5598110001ae"),
  "allocation": [
    {
      "location_id": NumberInt(10000),
      "location_name": "FGL Sports Ltd #1",
      "location_address": "T2G5A7 - 05 Milner Avenue, Suite 400",
      "location_quantity": NumberInt(5),
      "location_price": 19.89,
      "product_id": NumberInt(37),
      "product_image": "SCF11_252_Snowboard_45x28_Sims_02.jpg",
      "product_name": " - Dibond 0.2 cm",
      "tracking_url": "",
      "tracking_number": "",
      "tracking_company": "",
      "date_shipping": ISODate("2012-12-24T03:56:02.0Z"),
      "delete": NumberInt(0)
    }
  ],
  "company_id": NumberInt(0),
  "current_image_option": NumberInt(0),
  "current_price": 19.89,
  "current_size_option": NumberInt(0),
  "current_text_option": NumberInt(0),
  "custom_image_path": "",
  "customization_information": "",
  "description": "",
  "discount_per_unit": NumberInt(0),
  "discount_price": NumberInt(0),
  "discount_type": NumberInt(0),
  "extended_amount": NumberInt(0),
  "graphic_file": "SCF11_252_Snowboard_45x28_Sims_02.jpg",
  "height": 27,
  "location_id": NumberInt(0),
  "material_color": "Blue",
  "material_id": NumberInt(4),
  "material_name": "Dibond",
  "material_thickness_unit": "cm",
  "material_thickness_value": 0.2,
  "net_price": NumberInt(0),
  "order_id": NumberInt(118),
  "order_item_id": NumberInt(23),
  "original_price": NumberInt(0),
  "package_id": NumberInt(0),
  "product_code": "FGL-SNOWBPOP-011",
  "product_id": NumberInt(37),
  "product_image_option": NumberInt(0),
  "product_size_option": NumberInt(0),
  "product_text_option": NumberInt(0),
  "quantity": NumberInt(5),
  "status": NumberInt(0),
  "text": [
    
  ],
  "total_price": 99.45,
  "unit": "in",
  "unit_price": NumberInt(0),
  "width": 22
});
db.getCollection("tb_order_items").insert({
  "_id": ObjectId("50d7d2143d5e55981100017f"),
  "allocation": [
    {
      "location_id": NumberInt(10000),
      "location_name": "FGL Sports Ltd #1",
      "location_address": "T2G5A7 - 05 Milner Avenue, Suite 400",
      "location_quantity": NumberInt(5),
      "location_price": 19.89,
      "product_id": NumberInt(37),
      "product_image": "SCF11_252_Snowboard_45x28_Sims_02.jpg",
      "product_name": " - Dibond 0.2 cm",
      "tracking_url": "",
      "tracking_number": "",
      "tracking_company": "",
      "date_shipping": ISODate("2012-12-24T03:55:00.0Z"),
      "delete": NumberInt(0)
    }
  ],
  "company_id": NumberInt(0),
  "current_image_option": NumberInt(0),
  "current_price": 19.89,
  "current_size_option": NumberInt(0),
  "current_text_option": NumberInt(0),
  "custom_image_path": "",
  "customization_information": "",
  "description": "",
  "discount_per_unit": NumberInt(0),
  "discount_price": NumberInt(0),
  "discount_type": NumberInt(0),
  "extended_amount": NumberInt(0),
  "graphic_file": "SCF11_252_Snowboard_45x28_Sims_02.jpg",
  "height": 27,
  "location_id": NumberInt(0),
  "material_color": "Blue",
  "material_id": NumberInt(4),
  "material_name": "Dibond",
  "material_thickness_unit": "cm",
  "material_thickness_value": 0.2,
  "net_price": NumberInt(0),
  "order_id": NumberInt(118),
  "order_item_id": NumberInt(22),
  "original_price": NumberInt(0),
  "package_id": NumberInt(0),
  "product_code": "FGL-SNOWBPOP-011",
  "product_id": NumberInt(37),
  "product_image_option": NumberInt(0),
  "product_size_option": NumberInt(0),
  "product_text_option": NumberInt(0),
  "quantity": NumberInt(5),
  "status": NumberInt(0),
  "text": [
    
  ],
  "total_price": 99.45,
  "unit": "in",
  "unit_price": NumberInt(0),
  "width": 22
});
db.getCollection("tb_order_items").insert({
  "_id": ObjectId("50d7d0f33d5e55981100010e"),
  "allocation": [
    {
      "location_id": NumberInt(10000),
      "location_name": "FGL Sports Ltd #1",
      "location_address": "T2G5A7 - 05 Milner Avenue, Suite 400",
      "location_quantity": NumberInt(5),
      "location_price": 19.89,
      "product_id": NumberInt(37),
      "product_image": "SCF11_252_Snowboard_45x28_Sims_02.jpg",
      "product_name": " - Dibond 0.2 cm",
      "tracking_url": "",
      "tracking_number": "",
      "tracking_company": "",
      "date_shipping": ISODate("2012-12-24T03:50:11.0Z"),
      "delete": NumberInt(0)
    }
  ],
  "company_id": NumberInt(0),
  "current_image_option": NumberInt(0),
  "current_price": 19.89,
  "current_size_option": NumberInt(0),
  "current_text_option": NumberInt(0),
  "custom_image_path": "",
  "customization_information": "",
  "description": "",
  "discount_per_unit": NumberInt(0),
  "discount_price": NumberInt(0),
  "discount_type": NumberInt(0),
  "extended_amount": NumberInt(0),
  "graphic_file": "SCF11_252_Snowboard_45x28_Sims_02.jpg",
  "height": 27,
  "location_id": NumberInt(0),
  "material_color": "Blue",
  "material_id": NumberInt(4),
  "material_name": "Dibond",
  "material_thickness_unit": "cm",
  "material_thickness_value": 0.2,
  "net_price": NumberInt(0),
  "order_id": NumberInt(118),
  "order_item_id": NumberInt(21),
  "original_price": NumberInt(0),
  "package_id": NumberInt(0),
  "product_code": "FGL-SNOWBPOP-011",
  "product_id": NumberInt(37),
  "product_image_option": NumberInt(0),
  "product_size_option": NumberInt(0),
  "product_text_option": NumberInt(0),
  "quantity": NumberInt(5),
  "status": NumberInt(0),
  "text": [
    
  ],
  "total_price": 99.45,
  "unit": "in",
  "unit_price": NumberInt(0),
  "width": 22
});
db.getCollection("tb_order_items").insert({
  "_id": ObjectId("50d7cf523d5e5598110000cd"),
  "allocation": [
    {
      "location_id": NumberInt(10000),
      "location_name": "FGL Sports Ltd #1",
      "location_address": "T2G5A7 - 05 Milner Avenue, Suite 400",
      "location_quantity": NumberInt(5),
      "location_price": 19.89,
      "product_id": NumberInt(37),
      "product_image": "SCF11_252_Snowboard_45x28_Sims_02.jpg",
      "product_name": " - Dibond 0.2 cm",
      "tracking_url": "",
      "tracking_number": "",
      "tracking_company": "",
      "date_shipping": ISODate("2012-12-24T03:43:14.0Z"),
      "delete": NumberInt(0)
    }
  ],
  "company_id": NumberInt(0),
  "current_image_option": NumberInt(0),
  "current_price": 19.89,
  "current_size_option": NumberInt(0),
  "current_text_option": NumberInt(0),
  "custom_image_path": "",
  "customization_information": "",
  "description": "",
  "discount_per_unit": NumberInt(0),
  "discount_price": NumberInt(0),
  "discount_type": NumberInt(0),
  "extended_amount": NumberInt(0),
  "graphic_file": "SCF11_252_Snowboard_45x28_Sims_02.jpg",
  "height": 27,
  "location_id": NumberInt(0),
  "material_color": "Blue",
  "material_id": NumberInt(4),
  "material_name": "Dibond",
  "material_thickness_unit": "cm",
  "material_thickness_value": 0.2,
  "net_price": NumberInt(0),
  "order_id": NumberInt(118),
  "order_item_id": NumberInt(20),
  "original_price": NumberInt(0),
  "package_id": NumberInt(0),
  "product_code": "FGL-SNOWBPOP-011",
  "product_id": NumberInt(37),
  "product_image_option": NumberInt(0),
  "product_size_option": NumberInt(0),
  "product_text_option": NumberInt(0),
  "quantity": NumberInt(5),
  "status": NumberInt(0),
  "text": [
    
  ],
  "total_price": 99.45,
  "unit": "in",
  "unit_price": NumberInt(0),
  "width": 22
});
db.getCollection("tb_order_items").insert({
  "_id": ObjectId("50d7e2f83d5e559811000324"),
  "order_item_id": NumberInt(25),
  "order_id": NumberInt(123),
  "product_id": NumberInt(37),
  "package_id": NumberInt(0),
  "company_id": NumberInt(0),
  "location_id": NumberInt(0),
  "product_code": "FGL-SNOWBPOP-011",
  "quantity": NumberInt(4),
  "description": "",
  "customization_information": "",
  "width": 300,
  "height": 380,
  "unit": "cm",
  "product_size_option": NumberInt(0),
  "current_size_option": NumberInt(0),
  "graphic_file": "SCF11_252_Snowboard_45x28_Sims_02.jpg",
  "product_image_option": NumberInt(0),
  "current_image_option": NumberInt(0),
  "custom_image_path": "",
  "original_price": NumberInt(0),
  "discount_price": NumberInt(0),
  "current_price": 19.89,
  "unit_price": NumberInt(0),
  "status": NumberInt(0),
  "discount_type": NumberInt(0),
  "discount_per_unit": NumberInt(0),
  "net_price": NumberInt(0),
  "extended_amount": NumberInt(0),
  "material_id": NumberInt(4),
  "material_name": "Dibond",
  "material_color": "Blue",
  "material_thickness_value": 0.2,
  "material_thickness_unit": "cm",
  "total_price": 79.56,
  "product_text_option": NumberInt(0),
  "current_text_option": NumberInt(0),
  "text": [
    
  ],
  "allocation": [
    {
      "location_id": NumberInt(10000),
      "location_name": "FGL Sports Ltd #1",
      "location_address": "T2G5A7 - 05 Milner Avenue, Suite 400",
      "location_quantity": NumberInt(4),
      "location_price": 19.89,
      "product_id": NumberInt(37),
      "product_image": "SCF11_252_Snowboard_45x28_Sims_02.jpg",
      "product_name": " - Dibond 0.2 cm",
      "tracking_url": "",
      "tracking_number": "",
      "tracking_company": "",
      "date_shipping": ISODate("2012-12-24T05:07:04.0Z"),
      "delete": NumberInt(0)
    }
  ]
});
db.getCollection("tb_order_items").insert({
  "_id": ObjectId("50d7e4b73d5e559811000372"),
  "order_item_id": NumberInt(26),
  "order_id": NumberInt(118),
  "product_id": NumberInt(37),
  "package_id": NumberInt(0),
  "company_id": NumberInt(0),
  "location_id": NumberInt(0),
  "product_code": "FGL-SNOWBPOP-011",
  "quantity": NumberInt(5),
  "description": "",
  "customization_information": "",
  "width": 22,
  "height": 27,
  "unit": "in",
  "product_size_option": NumberInt(0),
  "current_size_option": NumberInt(0),
  "graphic_file": "SCF11_252_Snowboard_45x28_Sims_02.jpg",
  "product_image_option": NumberInt(0),
  "current_image_option": NumberInt(0),
  "custom_image_path": "",
  "original_price": NumberInt(0),
  "discount_price": NumberInt(0),
  "current_price": 19.89,
  "unit_price": NumberInt(0),
  "status": NumberInt(0),
  "discount_type": NumberInt(0),
  "discount_per_unit": NumberInt(0),
  "net_price": NumberInt(0),
  "extended_amount": NumberInt(0),
  "material_id": NumberInt(4),
  "material_name": "Dibond",
  "material_color": "Blue",
  "material_thickness_value": 0.2,
  "material_thickness_unit": "cm",
  "total_price": 99.45,
  "product_text_option": NumberInt(0),
  "current_text_option": NumberInt(0),
  "text": [
    
  ],
  "allocation": [
    {
      "location_id": NumberInt(10000),
      "location_name": "FGL Sports Ltd #1",
      "location_address": "T2G5A7 - 05 Milner Avenue, Suite 400",
      "location_quantity": NumberInt(5),
      "location_price": 19.89,
      "product_id": NumberInt(37),
      "product_image": "SCF11_252_Snowboard_45x28_Sims_02.jpg",
      "product_name": " - Dibond 0.2 cm",
      "tracking_url": "",
      "tracking_number": "",
      "tracking_company": "",
      "date_shipping": ISODate("2012-12-24T05:14:31.0Z"),
      "delete": NumberInt(0)
    }
  ]
});
db.getCollection("tb_order_items").insert({
  "_id": ObjectId("50dd502b9c768440290000a4"),
  "order_item_id": NumberInt(27),
  "order_id": NumberInt(125),
  "product_id": NumberInt(37),
  "package_type": NumberInt(0),
  "company_id": NumberInt(10006),
  "location_id": NumberInt(10000),
  "product_code": "FGL-SNOWBPOP-011",
  "quantity": NumberInt(2),
  "description": "",
  "customization_information": "",
  "width": 22,
  "height": 27,
  "unit": "in",
  "product_size_option": NumberInt(0),
  "current_size_option": NumberInt(0),
  "graphic_file": "resources\/FGL\/products\/\/SCF11_252_Snowboard_45x28_Sims_02.jpg",
  "graphic_id": NumberInt(0),
  "product_image_option": NumberInt(0),
  "current_image_option": NumberInt(0),
  "custom_image_path": "",
  "original_price": NumberInt(0),
  "discount_price": NumberInt(0),
  "current_price": 19.89,
  "unit_price": NumberInt(0),
  "status": NumberInt(0),
  "discount_type": NumberInt(0),
  "discount_per_unit": NumberInt(0),
  "net_price": NumberInt(0),
  "extended_amount": NumberInt(0),
  "material_id": NumberInt(4),
  "material_name": "Dibond",
  "material_color": "Blue",
  "material_thickness_value": 0.2,
  "material_thickness_unit": "cm",
  "total_price": 39.78,
  "product_text_option": NumberInt(0),
  "current_text_option": NumberInt(0),
  "text": [
    
  ],
  "allocation": [
    {
      "location_id": NumberInt(10000),
      "location_name": "FGL Sports Ltd #1",
      "location_address": "T2G5A7 - 05 Milner Avenue, Suite 400",
      "location_quantity": NumberInt(1),
      "location_price": 19.89,
      "product_id": NumberInt(37),
      "product_image": "resources\/FGL\/products\/\/SCF11_252_Snowboard_45x28_Sims_02.jpg",
      "product_name": " - Dibond 0.2 cm",
      "tracking_url": "",
      "tracking_number": "",
      "tracking_company": "",
      "date_shipping": ISODate("2013-01-27T07:53:07.0Z"),
      "shipping_status": NumberInt(0)
    },
    {
      "location_id": NumberInt(10002),
      "location_name": "Leaside",
      "location_address": "M4G 4K1 - 147 Laird Drive",
      "location_quantity": NumberInt(1),
      "location_price": 19.89,
      "product_id": NumberInt(37),
      "product_image": "resources\/FGL\/products\/\/SCF11_252_Snowboard_45x28_Sims_02.jpg",
      "product_name": " - Dibond 0.2 cm",
      "tracking_url": "",
      "tracking_number": "",
      "tracking_company": "",
      "date_shipping": ISODate("2013-01-27T07:53:07.0Z"),
      "shipping_status": NumberInt(0)
    }
  ]
});
db.getCollection("tb_order_items").insert({
  "_id": ObjectId("50dd502b9c768440290000a5"),
  "order_item_id": NumberInt(28),
  "order_id": NumberInt(125),
  "product_id": NumberInt(7),
  "package_type": NumberInt(0),
  "company_id": NumberInt(10006),
  "location_id": NumberInt(10000),
  "product_code": "NC-POP_06",
  "quantity": NumberInt(3),
  "description": "",
  "customization_information": "",
  "width": 48,
  "height": 72,
  "unit": "in",
  "product_size_option": NumberInt(0),
  "current_size_option": NumberInt(0),
  "graphic_file": "resources\/FGL\/products\/\/thumbnail_sc03.jpg",
  "graphic_id": NumberInt(0),
  "product_image_option": NumberInt(0),
  "current_image_option": NumberInt(0),
  "custom_image_path": "",
  "original_price": NumberInt(0),
  "discount_price": NumberInt(0),
  "current_price": 96,
  "unit_price": NumberInt(0),
  "status": NumberInt(0),
  "discount_type": NumberInt(0),
  "discount_per_unit": NumberInt(0),
  "net_price": NumberInt(0),
  "extended_amount": NumberInt(0),
  "material_id": NumberInt(2),
  "material_name": "Sintra",
  "material_color": "Navy",
  "material_thickness_value": 0.3,
  "material_thickness_unit": "cm",
  "total_price": 288,
  "product_text_option": NumberInt(0),
  "current_text_option": NumberInt(0),
  "text": [
    
  ],
  "allocation": [
    {
      "location_id": NumberInt(10000),
      "location_name": "FGL Sports Ltd #1",
      "location_address": "T2G5A7 - 05 Milner Avenue, Suite 400",
      "location_quantity": NumberInt(3),
      "location_price": 96,
      "product_id": NumberInt(7),
      "product_image": "resources\/FGL\/products\/\/thumbnail_sc03.jpg",
      "product_name": "Grand_Opening_POP - Sintra 0.3 cm",
      "tracking_url": "",
      "tracking_number": "",
      "tracking_company": "",
      "date_shipping": ISODate("2012-12-28T07:51:58.0Z"),
      "shipping_status": NumberInt(0)
    }
  ]
});

/** tb_product records **/
db.getCollection("tb_product").insert({
  "_id": ObjectId("50b48c3b3d5e559401000089"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10004),
  "date_created": ISODate("2012-12-26T10:20:34.0Z"),
  "default_price": 25,
  "image_desc": "Image for current product",
  "image_file": "",
  "image_option": NumberInt(0),
  "location_id": NumberInt(0),
  "long_description": "Blue_Mountain_Thermos_Wrap",
  "map_content": [
    
  ],
  "material": [
    {
      "id": NumberInt(5),
      "name": "Styrene",
      "color": "GoldenRod",
      "thickness": NumberInt(1),
      "unit": "cm",
      "price": NumberInt(35),
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(5),
      "name": "Styrene",
      "color": "DeepPink",
      "thickness": NumberInt(1),
      "unit": "cm",
      "price": NumberInt(32),
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(9),
      "name": "Foamcore",
      "color": "DarkRed",
      "thickness": 0.2,
      "unit": "cm",
      "price": NumberInt(22),
      "status": NumberInt(0)
    }
  ],
  "num_images": NumberInt(1),
  "package_content": [
    
  ],
  "package_quantity": NumberInt(1),
  "package_type": NumberInt(0),
  "product_detail": "Product_detail_for_Blue_Mountain_Thermos_Wrap",
  "product_id": NumberInt(1),
  "product_sku": "00-01-SR",
  "product_status": NumberInt(4),
  "saved_dir": "resources\/VHT\/products\/",
  "short_description": "Blue_Mountain_Thermos_Wrap",
  "size": [
    {
      "width": NumberInt(22),
      "height": NumberInt(9),
      "unit": "in",
      "status": NumberInt(0)
    },
    {
      "width": NumberInt(18),
      "height": NumberInt(7),
      "unit": "in",
      "status": NumberInt(0)
    }
  ],
  "size_option": NumberInt(0),
  "size_unit": "cm",
  "sold_by": "",
  "tag": [
    
  ],
  "taxonomy": [
    "3"
  ],
  "text": [
    {
      "text": "Text 1",
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
    {
      "id": NumberInt(2),
      "name": "Sintra",
      "color": "Navy",
      "thickness": 0.3,
      "unit": "cm",
      "price": NumberInt(10),
      "status": NumberInt(0)
    }
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
  "saved_dir": "resources\/FGL\/products\/",
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
  "_id": ObjectId("50c072a59c7684266f000030"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10004),
  "date_created": ISODate("2012-12-26T10:20:34.0Z"),
  "default_price": 0,
  "image_desc": "Image for current product",
  "image_file": "48c6cc8050734c4008866a687c416474.jpg",
  "image_option": NumberInt(0),
  "location_id": NumberInt(0),
  "long_description": "ADAGIO Sandwich Board - 24x32",
  "map_content": [
    
  ],
  "material": [
    
  ],
  "num_images": NumberInt(1),
  "package_content": [
    
  ],
  "package_quantity": NumberInt(1),
  "package_type": NumberInt(0),
  "product_detail": "ADAGIO Sandwich Board - 24x32",
  "product_id": NumberInt(11),
  "product_sku": "VHT - 0001",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/VHT\/products\/",
  "short_description": "ADAGIO Sandwich Board - 24x32",
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
  "_id": ObjectId("50c1487a9c7684f60e00000f"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10006),
  "date_created": ISODate("2012-12-26T10:20:34.0Z"),
  "default_price": 0,
  "image_desc": "Image for current product",
  "image_file": "SCF11_252_Snowboard_45x28_K2_02.jpg",
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
  "product_id": NumberInt(33),
  "product_sku": "FGL-SNOWBPOP-007",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/FGL\/products\/",
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
  "saved_dir": "resources\/FGL\/products\/",
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
  "saved_dir": "resources\/FGL\/products\/",
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
  "saved_dir": "resources\/FGL\/products\/",
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
  "saved_dir": "resources\/VHT\/products\/",
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
  "saved_dir": "resources\/FGL\/products\/",
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
  "saved_dir": "resources\/FGL\/products\/",
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
  "saved_dir": "resources\/FGL\/products\/",
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
  "saved_dir": "resources\/FGL\/products\/",
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
  "saved_dir": "resources\/FGL\/products\/",
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
  "saved_dir": "resources\/FGL\/products\/",
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
  "saved_dir": "resources\/FGL\/products\/",
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
  "saved_dir": "resources\/FGL\/products\/",
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
  "default_price": 0,
  "image_desc": "Image for current product",
  "image_file": "SCF11_252_Snowboard_45x28_Ride_02.jpg",
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
  "product_id": NumberInt(35),
  "product_sku": "FGL-SNOWBPOP-009",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/FGL\/products\/",
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
  "_id": ObjectId("50c148fb9c7684f60e000035"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10006),
  "date_created": ISODate("2012-12-26T10:20:34.0Z"),
  "default_price": 0,
  "image_desc": "Image for current product",
  "image_file": "SCF11_252_Snowboard_45x28_Sims_01.jpg",
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
  "product_id": NumberInt(36),
  "product_sku": "FGL-SNOWBPOP-010",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/FGL\/products\/",
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
  "_id": ObjectId("50b6e0bc3d5e55740c000035"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10004),
  "date_created": ISODate("2012-12-26T10:20:34.0Z"),
  "default_price": 15,
  "image_desc": "Image for current product",
  "image_file": "thumbnail_vh01.jpg",
  "image_option": NumberInt(0),
  "location_id": NumberInt(0),
  "long_description": "Very_long_description_for_Sintra_Adagio_Cup",
  "map_content": [
    
  ],
  "material": [
    {
      "id": NumberInt(3),
      "name": "Canvas",
      "color": "LimeGreen",
      "thickness": 0.1,
      "unit": "cm",
      "price": NumberInt(17),
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(5),
      "name": "Styrene",
      "color": "Red",
      "thickness": 0.3,
      "unit": "cm",
      "price": NumberInt(23),
      "status": NumberInt(0)
    }
  ],
  "num_images": NumberInt(1),
  "package_content": [
    
  ],
  "package_quantity": NumberInt(1),
  "package_type": NumberInt(0),
  "product_detail": "Product_detail_",
  "product_id": NumberInt(2),
  "product_sku": "BB-01-02",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/VHT\/products\/",
  "short_description": "Sintra_Adagio_Cup",
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
  "_id": ObjectId("50c02c439c76845763000064"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10006),
  "date_created": ISODate("2012-12-26T10:20:34.0Z"),
  "default_price": 15,
  "image_desc": "Image for current product",
  "image_file": "thumbnail_sc08.jpg",
  "image_option": NumberInt(0),
  "location_id": NumberInt(0),
  "long_description": "Ski Merchandising POP - 45x28 - CORE",
  "map_content": [
    
  ],
  "material": [
    {
      "id": NumberInt(12),
      "name": "Crezone",
      "color": "FireBrick",
      "thickness": NumberInt(1),
      "unit": "cm",
      "price": NumberInt(14),
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(12),
      "name": "Crezone",
      "color": "Magenta",
      "thickness": NumberInt(1),
      "unit": "cm",
      "price": NumberInt(15),
      "status": NumberInt(0)
    }
  ],
  "num_images": NumberInt(1),
  "package_content": [
    
  ],
  "package_quantity": NumberInt(1),
  "package_type": NumberInt(0),
  "product_detail": "Product_detail_",
  "product_id": NumberLong(3),
  "product_sku": "FGL-SKIPOP-002",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/FGL\/products\/",
  "short_description": "Ski Merchandising POP - 45x28 - CORE",
  "size": [
    {
      "width": NumberInt(3),
      "height": NumberInt(7),
      "unit": "in",
      "status": NumberInt(0)
    },
    {
      "width": NumberInt(10),
      "height": NumberInt(15),
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
  "image_desc": "Image for current product",
  "image_file": "thumbnail_sc05.jpg",
  "image_option": NumberInt(0),
  "location_id": NumberInt(0),
  "long_description": "Grand_Opening_POP_28x59",
  "map_content": [
    
  ],
  "material": [
    {
      "id": NumberInt(11),
      "name": "Gatorboard",
      "color": "BlueViolet",
      "thickness": NumberInt(2),
      "unit": "cm",
      "price": NumberInt(22),
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
  "product_sku": "NC-POP_02",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/FGL\/products\/",
  "short_description": "Grand_Opening_POP_28x59",
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
    {
      "id": NumberInt(2),
      "name": "Sintra",
      "color": "LawnGreen",
      "thickness": 0.02,
      "unit": "cm",
      "price": NumberInt(11),
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(2),
      "name": "Sintra",
      "color": "Red",
      "thickness": 0.01,
      "unit": "cm",
      "price": NumberInt(12),
      "status": NumberInt(0)
    }
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
  "saved_dir": "resources\/FGL\/products\/",
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
  "_id": ObjectId("50c02c5e9c7684a163000001"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10006),
  "date_created": ISODate("2012-12-26T10:20:34.0Z"),
  "default_price": 15,
  "image_desc": "Image for current product",
  "image_file": "thumbnail_sc07.jpg",
  "image_option": NumberInt(0),
  "location_id": NumberInt(0),
  "long_description": "Ski Merchandising POP - 45x28 - CORE",
  "map_content": [
    
  ],
  "material": [
    {
      "id": NumberInt(17),
      "name": "Backlit Film",
      "color": "BlueViolet",
      "thickness": 0.01,
      "unit": "cm",
      "price": NumberInt(30),
      "status": NumberInt(0)
    }
  ],
  "num_images": NumberInt(1),
  "package_content": [
    
  ],
  "package_quantity": NumberInt(1),
  "package_type": NumberInt(0),
  "product_detail": "Product_detail_",
  "product_id": NumberLong(4),
  "product_sku": "FGL-SKIPOP-001",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/FGL\/products\/",
  "short_description": "Ski Merchandising POP - 45x28 - CORE",
  "size": [
    {
      "width": NumberInt(40),
      "height": NumberInt(45),
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
  "saved_dir": "resources\/VHT\/products\/",
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
  "saved_dir": "resources\/VHT\/products\/",
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
  "saved_dir": "resources\/FGL\/products\/",
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
  "saved_dir": "resources\/FGL\/products\/",
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
  "saved_dir": "resources\/FGL\/products\/",
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
  "saved_dir": "resources\/FGL\/products\/",
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
  "saved_dir": "resources\/FGL\/products\/",
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
  "saved_dir": "resources\/FGL\/products\/",
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
  "saved_dir": "resources\/FGL\/products\/",
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
  "saved_dir": "resources\/FGL\/products\/",
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
  "saved_dir": "resources\/FGL\/products\/",
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
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10006),
  "date_created": ISODate("2012-12-26T10:20:34.0Z"),
  "default_price": 0,
  "image_desc": "Image for current product",
  "image_file": "SCF11_252_Snowboard_45x28_Ride_01.jpg",
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
  "product_id": NumberInt(34),
  "product_sku": "FGL-SNOWBPOP-008",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/FGL\/products\/",
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
  "_id": ObjectId("50c2c0a29c76848f2400001a"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10004),
  "date_created": ISODate("2012-12-26T10:20:34.0Z"),
  "default_price": 10,
  "image_desc": "Image for current product",
  "image_file": "sandwich_board_large.png",
  "image_option": NumberInt(0),
  "location_id": NumberInt(10000),
  "long_description": "Sandwich Board [AD] - 1\/2\" Crezone",
  "map_content": [
    
  ],
  "material": [
    {
      "id": NumberInt(2),
      "name": "Sintra",
      "color": "Gold",
      "thickness": 0.2,
      "unit": "cm",
      "price": NumberInt(17),
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(2),
      "name": "Sintra",
      "color": "FireBrick",
      "thickness": 0.5,
      "unit": "cm",
      "price": NumberInt(22),
      "status": NumberInt(0)
    }
  ],
  "num_images": NumberInt(1),
  "package_content": [
    
  ],
  "package_quantity": NumberInt(1),
  "package_type": NumberInt(0),
  "product_detail": "",
  "product_id": NumberInt(38),
  "product_sku": "Sandwich Board VH 001",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/VHT\/products\/",
  "short_description": "Sandwich Board [AD] - 1\/2\" Crezone",
  "size": [
    {
      "width": 22.5,
      "height": 34.7,
      "unit": "in",
      "status": NumberInt(0)
    },
    {
      "width": NumberInt(220),
      "height": NumberInt(350),
      "unit": "cm",
      "status": NumberInt(0)
    }
  ],
  "size_option": NumberInt(0),
  "size_unit": "cm",
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
  "_id": ObjectId("50c074d79c7684c57000000f"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10004),
  "date_created": ISODate("2012-12-26T10:20:34.0Z"),
  "default_price": 0,
  "image_desc": "Image for current product",
  "image_file": "1d95bcbd0e208ec92bd8e7be44d443f4.jpg",
  "image_option": NumberInt(0),
  "location_id": NumberInt(0),
  "long_description": "This_is_a_menu_board_made_out_of_3mm_Sintra_Adhesive_vinly_price_stickers_are_not_included_and_ordered_separately",
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
  "product_id": NumberInt(15),
  "product_sku": "VHT - 0005",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/VHT\/products\/",
  "short_description": "ADAGIO Standard 5-Line Menuboard",
  "size": [
    {
      "width": "22.5",
      "height": "12",
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
      "text": "1.99",
      "color": "#000000",
      "font-name": "Verdana",
      "font-size": "14pt",
      "font-bold": NumberInt(1),
      "font-italic": NumberInt(0),
      "left": NumberInt(0),
      "top": NumberInt(0)
    },
    {
      "text": "2.99",
      "color": "#000000",
      "font-name": "Verdana",
      "font-size": "14pt",
      "font-bold": NumberInt(1),
      "font-italic": NumberInt(0),
      "left": NumberInt(0),
      "top": NumberInt(0)
    },
    {
      "text": "3.99",
      "color": "#000000",
      "font-name": "Verdana",
      "font-size": "14pt",
      "font-bold": NumberInt(1),
      "font-italic": NumberInt(0),
      "left": NumberInt(0),
      "top": NumberInt(0)
    },
    {
      "text": "4.99",
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
  "_id": ObjectId("50c149109c7684320f00000f"),
  "allow_single": NumberInt(1),
  "company_id": NumberInt(10006),
  "date_created": ISODate("2012-12-26T10:20:34.0Z"),
  "default_price": 19.89,
  "image_desc": "Image for current product",
  "image_file": "SCF11_252_Snowboard_45x28_Sims_02.jpg",
  "image_option": NumberInt(0),
  "location_id": NumberInt(10000),
  "long_description": "Snowboard Merchandising POP 45x28 CORE",
  "map_content": [
    
  ],
  "material": [
    {
      "id": NumberInt(4),
      "name": "Dibond",
      "color": "Blue",
      "thickness": 0.2,
      "unit": "cm",
      "price": NumberInt(20),
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(4),
      "name": "Dibond",
      "color": "Tomato",
      "thickness": 0.3,
      "unit": "cm",
      "price": NumberInt(27),
      "status": NumberInt(0)
    }
  ],
  "num_images": NumberInt(1),
  "package_content": [
    
  ],
  "package_quantity": NumberInt(1),
  "package_type": NumberInt(0),
  "product_detail": "",
  "product_id": NumberInt(37),
  "product_sku": "FGL-SNOWBPOP-011",
  "product_status": NumberInt(3),
  "saved_dir": "resources\/FGL\/products\/",
  "short_description": "Snowboard Merchandising POP 45x28 CORE",
  "size": [
    {
      "width": NumberInt(22),
      "height": NumberInt(27),
      "unit": "in",
      "status": NumberInt(0)
    },
    {
      "width": NumberInt(300),
      "height": NumberInt(380),
      "unit": "cm",
      "status": NumberInt(0)
    }
  ],
  "size_option": NumberInt(0),
  "size_unit": "cm",
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

/** tb_product_desc records **/

/** tb_product_images records **/
db.getCollection("tb_product_images").insert({
  "_id": ObjectId("50d805e93d5e554808000099"),
  "product_images_id": NumberInt(1),
  "product_id": NumberInt(3),
  "company_id": NumberInt(10006),
  "location_id": NumberInt(0),
  "map_content": [
    
  ],
  "product_image": "department-footware-1(2)(1).jpg",
  "low_res_image": "200_department-footware-1(2)(1).jpg",
  "image_size": NumberInt(1896740),
  "image_width": NumberInt(3264),
  "image_height": NumberInt(2448),
  "saved_dir": "resources\/FGL\/products\/3\/",
  "status": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0),
  "date_created": ISODate("2012-12-24T07:36:09.0Z")
});
db.getCollection("tb_product_images").insert({
  "_id": ObjectId("50d806043d5e5548080000c3"),
  "product_images_id": NumberInt(2),
  "product_id": NumberInt(3),
  "company_id": NumberInt(10006),
  "location_id": NumberInt(0),
  "map_content": [
    
  ],
  "product_image": "department-footware-2(1).jpg",
  "low_res_image": "200_department-footware-2(1).jpg",
  "image_size": NumberInt(1805470),
  "image_width": NumberInt(3264),
  "image_height": NumberInt(2448),
  "saved_dir": "resources\/FGL\/products\/3\/",
  "status": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0),
  "date_created": ISODate("2012-12-24T07:36:36.0Z")
});
db.getCollection("tb_product_images").insert({
  "_id": ObjectId("50d806073d5e5548080000e2"),
  "product_images_id": NumberInt(3),
  "product_id": NumberInt(3),
  "company_id": NumberInt(10006),
  "location_id": NumberInt(0),
  "map_content": [
    
  ],
  "product_image": "department-golf-1(1).jpg",
  "low_res_image": "200_department-golf-1(1).jpg",
  "image_size": NumberInt(1838376),
  "image_width": NumberInt(3264),
  "image_height": NumberInt(2448),
  "saved_dir": "resources\/FGL\/products\/3\/",
  "status": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0),
  "date_created": ISODate("2012-12-24T07:36:39.0Z")
});
db.getCollection("tb_product_images").insert({
  "_id": ObjectId("50d8060a3d5e554808000101"),
  "product_images_id": NumberInt(4),
  "product_id": NumberInt(3),
  "company_id": NumberInt(10006),
  "location_id": NumberInt(0),
  "map_content": [
    
  ],
  "product_image": "department-hockey-1(1).jpg",
  "low_res_image": "200_department-hockey-1(1).jpg",
  "image_size": NumberInt(1837235),
  "image_width": NumberInt(3264),
  "image_height": NumberInt(2448),
  "saved_dir": "resources\/FGL\/products\/3\/",
  "status": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0),
  "date_created": ISODate("2012-12-24T07:36:42.0Z")
});
db.getCollection("tb_product_images").insert({
  "_id": ObjectId("50d8060e3d5e554808000120"),
  "product_images_id": NumberInt(5),
  "product_id": NumberInt(3),
  "company_id": NumberInt(10006),
  "location_id": NumberInt(0),
  "map_content": [
    
  ],
  "product_image": "department-hockey-2(1).jpg",
  "low_res_image": "200_department-hockey-2(1).jpg",
  "image_size": NumberInt(1906940),
  "image_width": NumberInt(3264),
  "image_height": NumberInt(2448),
  "saved_dir": "resources\/FGL\/products\/3\/",
  "status": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0),
  "date_created": ISODate("2012-12-24T07:36:46.0Z")
});
db.getCollection("tb_product_images").insert({
  "_id": ObjectId("50d806113d5e55480800013f"),
  "product_images_id": NumberInt(6),
  "product_id": NumberInt(3),
  "company_id": NumberInt(10006),
  "location_id": NumberInt(0),
  "map_content": [
    
  ],
  "product_image": "department-hockey-3(1).jpg",
  "low_res_image": "200_department-hockey-3(1).jpg",
  "image_size": NumberInt(1858193),
  "image_width": NumberInt(3264),
  "image_height": NumberInt(2448),
  "saved_dir": "resources\/FGL\/products\/3\/",
  "status": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0),
  "date_created": ISODate("2012-12-24T07:36:49.0Z")
});
db.getCollection("tb_product_images").insert({
  "_id": ObjectId("50d806143d5e55480800015e"),
  "product_images_id": NumberInt(7),
  "product_id": NumberInt(3),
  "company_id": NumberInt(10006),
  "location_id": NumberInt(0),
  "map_content": [
    
  ],
  "product_image": "department-hockey-4(1).jpg",
  "low_res_image": "200_department-hockey-4(1).jpg",
  "image_size": NumberInt(1884538),
  "image_width": NumberInt(3264),
  "image_height": NumberInt(2448),
  "saved_dir": "resources\/FGL\/products\/3\/",
  "status": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0),
  "date_created": ISODate("2012-12-24T07:36:52.0Z")
});
db.getCollection("tb_product_images").insert({
  "_id": ObjectId("50d806183d5e55480800017d"),
  "product_images_id": NumberInt(8),
  "product_id": NumberInt(3),
  "company_id": NumberInt(10006),
  "location_id": NumberInt(0),
  "map_content": [
    
  ],
  "product_image": "department-hockey-5(1).jpg",
  "low_res_image": "200_department-hockey-5(1).jpg",
  "image_size": NumberInt(1872061),
  "image_width": NumberInt(3264),
  "image_height": NumberInt(2448),
  "saved_dir": "resources\/FGL\/products\/3\/",
  "status": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0),
  "date_created": ISODate("2012-12-24T07:36:56.0Z")
});
db.getCollection("tb_product_images").insert({
  "_id": ObjectId("50d8061b3d5e55480800019c"),
  "product_images_id": NumberInt(9),
  "product_id": NumberInt(3),
  "company_id": NumberInt(10006),
  "location_id": NumberInt(0),
  "map_content": [
    
  ],
  "product_image": "department-seasonalapparel-1(1).jpg",
  "low_res_image": "200_department-seasonalapparel-1(1).jpg",
  "image_size": NumberInt(1931053),
  "image_width": NumberInt(3264),
  "image_height": NumberInt(2448),
  "saved_dir": "resources\/FGL\/products\/3\/",
  "status": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0),
  "date_created": ISODate("2012-12-24T07:36:59.0Z")
});
db.getCollection("tb_product_images").insert({
  "_id": ObjectId("50d8061f3d5e5548080001bb"),
  "product_images_id": NumberInt(10),
  "product_id": NumberInt(3),
  "company_id": NumberInt(10006),
  "location_id": NumberInt(0),
  "map_content": [
    
  ],
  "product_image": "department-seasonalsports-1.jpg",
  "low_res_image": "200_department-seasonalsports-1.jpg",
  "image_size": NumberInt(1825292),
  "image_width": NumberInt(3264),
  "image_height": NumberInt(2448),
  "saved_dir": "resources\/FGL\/products\/3\/",
  "status": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0),
  "date_created": ISODate("2012-12-24T07:37:03.0Z")
});
db.getCollection("tb_product_images").insert({
  "_id": ObjectId("50d806223d5e5548080001da"),
  "product_images_id": NumberInt(11),
  "product_id": NumberInt(3),
  "company_id": NumberInt(10006),
  "location_id": NumberInt(0),
  "map_content": [
    
  ],
  "product_image": "department-seasonalsports-2.jpg",
  "low_res_image": "200_department-seasonalsports-2.jpg",
  "image_size": NumberInt(1918911),
  "image_width": NumberInt(3264),
  "image_height": NumberInt(2448),
  "saved_dir": "resources\/FGL\/products\/3\/",
  "status": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0),
  "date_created": ISODate("2012-12-24T07:37:06.0Z")
});
db.getCollection("tb_product_images").insert({
  "_id": ObjectId("50d811693d5e55b80c000099"),
  "product_images_id": NumberInt(12),
  "product_id": NumberInt(4),
  "company_id": NumberInt(10006),
  "location_id": NumberInt(0),
  "map_content": [
    
  ],
  "product_image": "department-footware-1.jpg",
  "low_res_image": "200_department-footware-1.jpg",
  "image_size": NumberInt(1896740),
  "image_width": NumberInt(3264),
  "image_height": NumberInt(2448),
  "saved_dir": "resources\/FGL\/products\/4\/",
  "status": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0),
  "date_created": ISODate("2012-12-24T08:25:13.0Z")
});
db.getCollection("tb_product_images").insert({
  "_id": ObjectId("50d8116d3d5e55b80c0000b8"),
  "product_images_id": NumberInt(13),
  "product_id": NumberInt(4),
  "company_id": NumberInt(10006),
  "location_id": NumberInt(0),
  "map_content": [
    
  ],
  "product_image": "department-footware-2.jpg",
  "low_res_image": "200_department-footware-2.jpg",
  "image_size": NumberInt(1805470),
  "image_width": NumberInt(3264),
  "image_height": NumberInt(2448),
  "saved_dir": "resources\/FGL\/products\/4\/",
  "status": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0),
  "date_created": ISODate("2012-12-24T08:25:17.0Z")
});
db.getCollection("tb_product_images").insert({
  "_id": ObjectId("50d811713d5e55b80c0000d7"),
  "product_images_id": NumberInt(14),
  "product_id": NumberInt(4),
  "company_id": NumberInt(10006),
  "location_id": NumberInt(0),
  "map_content": [
    
  ],
  "product_image": "department-golf-1.jpg",
  "low_res_image": "200_department-golf-1.jpg",
  "image_size": NumberInt(1838376),
  "image_width": NumberInt(3264),
  "image_height": NumberInt(2448),
  "saved_dir": "resources\/FGL\/products\/4\/",
  "status": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0),
  "date_created": ISODate("2012-12-24T08:25:21.0Z")
});
db.getCollection("tb_product_images").insert({
  "_id": ObjectId("50d811743d5e55b80c0000f6"),
  "product_images_id": NumberInt(15),
  "product_id": NumberInt(4),
  "company_id": NumberInt(10006),
  "location_id": NumberInt(0),
  "map_content": [
    
  ],
  "product_image": "department-golf-2.jpg",
  "low_res_image": "200_department-golf-2.jpg",
  "image_size": NumberInt(1862016),
  "image_width": NumberInt(3264),
  "image_height": NumberInt(2448),
  "saved_dir": "resources\/FGL\/products\/4\/",
  "status": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0),
  "date_created": ISODate("2012-12-24T08:25:24.0Z")
});
db.getCollection("tb_product_images").insert({
  "_id": ObjectId("50d811783d5e55b80c000115"),
  "product_images_id": NumberInt(16),
  "product_id": NumberInt(4),
  "company_id": NumberInt(10006),
  "location_id": NumberInt(0),
  "map_content": [
    
  ],
  "product_image": "department-hockey-1.jpg",
  "low_res_image": "200_department-hockey-1.jpg",
  "image_size": NumberInt(1837235),
  "image_width": NumberInt(3264),
  "image_height": NumberInt(2448),
  "saved_dir": "resources\/FGL\/products\/4\/",
  "status": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0),
  "date_created": ISODate("2012-12-24T08:25:28.0Z")
});
db.getCollection("tb_product_images").insert({
  "_id": ObjectId("50d8117c3d5e55b80c000134"),
  "product_images_id": NumberInt(17),
  "product_id": NumberInt(4),
  "company_id": NumberInt(10006),
  "location_id": NumberInt(0),
  "map_content": [
    
  ],
  "product_image": "department-hockey-2.jpg",
  "low_res_image": "200_department-hockey-2.jpg",
  "image_size": NumberInt(1906940),
  "image_width": NumberInt(3264),
  "image_height": NumberInt(2448),
  "saved_dir": "resources\/FGL\/products\/4\/",
  "status": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0),
  "date_created": ISODate("2012-12-24T08:25:32.0Z")
});
db.getCollection("tb_product_images").insert({
  "_id": ObjectId("50d811803d5e55b80c000153"),
  "product_images_id": NumberInt(18),
  "product_id": NumberInt(4),
  "company_id": NumberInt(10006),
  "location_id": NumberInt(0),
  "map_content": [
    
  ],
  "product_image": "department-hockey-3.jpg",
  "low_res_image": "200_department-hockey-3.jpg",
  "image_size": NumberInt(1858193),
  "image_width": NumberInt(3264),
  "image_height": NumberInt(2448),
  "saved_dir": "resources\/FGL\/products\/4\/",
  "status": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0),
  "date_created": ISODate("2012-12-24T08:25:36.0Z")
});
db.getCollection("tb_product_images").insert({
  "_id": ObjectId("50d811843d5e55b80c000172"),
  "product_images_id": NumberInt(19),
  "product_id": NumberInt(4),
  "company_id": NumberInt(10006),
  "location_id": NumberInt(0),
  "map_content": [
    
  ],
  "product_image": "department-hockey-4.jpg",
  "low_res_image": "200_department-hockey-4.jpg",
  "image_size": NumberInt(1884538),
  "image_width": NumberInt(3264),
  "image_height": NumberInt(2448),
  "saved_dir": "resources\/FGL\/products\/4\/",
  "status": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0),
  "date_created": ISODate("2012-12-24T08:25:40.0Z")
});
db.getCollection("tb_product_images").insert({
  "_id": ObjectId("50d811883d5e55b80c000191"),
  "product_images_id": NumberInt(20),
  "product_id": NumberInt(4),
  "company_id": NumberInt(10006),
  "location_id": NumberInt(0),
  "map_content": [
    
  ],
  "product_image": "department-hockey-5.jpg",
  "low_res_image": "200_department-hockey-5.jpg",
  "image_size": NumberInt(1872061),
  "image_width": NumberInt(3264),
  "image_height": NumberInt(2448),
  "saved_dir": "resources\/FGL\/products\/4\/",
  "status": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0),
  "date_created": ISODate("2012-12-24T08:25:44.0Z")
});
db.getCollection("tb_product_images").insert({
  "_id": ObjectId("50d8118c3d5e55b80c0001b0"),
  "product_images_id": NumberInt(21),
  "product_id": NumberInt(4),
  "company_id": NumberInt(10006),
  "location_id": NumberInt(0),
  "map_content": [
    
  ],
  "product_image": "department-seasonalapparel-1.jpg",
  "low_res_image": "200_department-seasonalapparel-1.jpg",
  "image_size": NumberInt(1931053),
  "image_width": NumberInt(3264),
  "image_height": NumberInt(2448),
  "saved_dir": "resources\/FGL\/products\/4\/",
  "status": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0),
  "date_created": ISODate("2012-12-24T08:25:48.0Z")
});
db.getCollection("tb_product_images").insert({
  "_id": ObjectId("50d8118f3d5e55b80c0001cf"),
  "product_images_id": NumberInt(22),
  "product_id": NumberInt(4),
  "company_id": NumberInt(10006),
  "location_id": NumberInt(0),
  "map_content": [
    
  ],
  "product_image": "department-seasonalsports-1.jpg",
  "low_res_image": "200_department-seasonalsports-1.jpg",
  "image_size": NumberInt(1825292),
  "image_width": NumberInt(3264),
  "image_height": NumberInt(2448),
  "saved_dir": "resources\/FGL\/products\/4\/",
  "status": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0),
  "date_created": ISODate("2012-12-24T08:25:51.0Z")
});
db.getCollection("tb_product_images").insert({
  "_id": ObjectId("50d811933d5e55b80c0001ee"),
  "product_images_id": NumberInt(23),
  "product_id": NumberInt(4),
  "company_id": NumberInt(10006),
  "location_id": NumberInt(0),
  "map_content": [
    
  ],
  "product_image": "department-seasonalsports-2.jpg",
  "low_res_image": "200_department-seasonalsports-2.jpg",
  "image_size": NumberInt(1918911),
  "image_width": NumberInt(3264),
  "image_height": NumberInt(2448),
  "saved_dir": "resources\/FGL\/products\/4\/",
  "status": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0),
  "date_created": ISODate("2012-12-24T08:25:55.0Z")
});
db.getCollection("tb_product_images").insert({
  "_id": ObjectId("50d811973d5e55b80c00020d"),
  "product_images_id": NumberInt(24),
  "product_id": NumberInt(4),
  "company_id": NumberInt(10006),
  "location_id": NumberInt(0),
  "map_content": [
    
  ],
  "product_image": "department-seasonalsports-3.jpg",
  "low_res_image": "200_department-seasonalsports-3.jpg",
  "image_size": NumberInt(1908114),
  "image_width": NumberInt(3264),
  "image_height": NumberInt(2448),
  "saved_dir": "resources\/FGL\/products\/4\/",
  "status": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0),
  "date_created": ISODate("2012-12-24T08:25:59.0Z")
});
db.getCollection("tb_product_images").insert({
  "_id": ObjectId("50d8119b3d5e55b80c00022c"),
  "product_images_id": NumberInt(25),
  "product_id": NumberInt(4),
  "company_id": NumberInt(10006),
  "location_id": NumberInt(0),
  "map_content": [
    
  ],
  "product_image": "department-soccer-1.jpg",
  "low_res_image": "200_department-soccer-1.jpg",
  "image_size": NumberInt(1794874),
  "image_width": NumberInt(3264),
  "image_height": NumberInt(2448),
  "saved_dir": "resources\/FGL\/products\/4\/",
  "status": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0),
  "date_created": ISODate("2012-12-24T08:26:03.0Z")
});
db.getCollection("tb_product_images").insert({
  "_id": ObjectId("50d8119f3d5e55b80c00024b"),
  "product_images_id": NumberInt(26),
  "product_id": NumberInt(4),
  "company_id": NumberInt(10006),
  "location_id": NumberInt(0),
  "map_content": [
    
  ],
  "product_image": "department-soccer-2.jpg",
  "low_res_image": "200_department-soccer-2.jpg",
  "image_size": NumberInt(1784567),
  "image_width": NumberInt(3264),
  "image_height": NumberInt(2448),
  "saved_dir": "resources\/FGL\/products\/4\/",
  "status": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0),
  "date_created": ISODate("2012-12-24T08:26:07.0Z")
});
db.getCollection("tb_product_images").insert({
  "_id": ObjectId("50d811a23d5e55b80c00026a"),
  "product_images_id": NumberInt(27),
  "product_id": NumberInt(4),
  "company_id": NumberInt(10006),
  "location_id": NumberInt(0),
  "map_content": [
    
  ],
  "product_image": "department-soccer-3.jpg",
  "low_res_image": "200_department-soccer-3.jpg",
  "image_size": NumberInt(1860206),
  "image_width": NumberInt(2448),
  "image_height": NumberInt(3264),
  "saved_dir": "resources\/FGL\/products\/4\/",
  "status": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0),
  "date_created": ISODate("2012-12-24T08:26:10.0Z")
});
db.getCollection("tb_product_images").insert({
  "_id": ObjectId("50d811ab3d5e55b80c000289"),
  "product_images_id": NumberInt(28),
  "product_id": NumberInt(4),
  "company_id": NumberInt(10006),
  "location_id": NumberInt(0),
  "map_content": [
    
  ],
  "product_image": "department-soccer-4.jpg",
  "low_res_image": "200_department-soccer-4.jpg",
  "image_size": NumberInt(1875914),
  "image_width": NumberInt(2448),
  "image_height": NumberInt(3264),
  "saved_dir": "resources\/FGL\/products\/4\/",
  "status": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0),
  "date_created": ISODate("2012-12-24T08:26:19.0Z")
});
db.getCollection("tb_product_images").insert({
  "_id": ObjectId("50d811af3d5e55b80c0002a8"),
  "product_images_id": NumberInt(29),
  "product_id": NumberInt(4),
  "company_id": NumberInt(10006),
  "location_id": NumberInt(0),
  "map_content": [
    
  ],
  "product_image": "display-1.jpg",
  "low_res_image": "200_display-1.jpg",
  "image_size": NumberInt(1889544),
  "image_width": NumberInt(3264),
  "image_height": NumberInt(2448),
  "saved_dir": "resources\/FGL\/products\/4\/",
  "status": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0),
  "date_created": ISODate("2012-12-24T08:26:23.0Z")
});
db.getCollection("tb_product_images").insert({
  "_id": ObjectId("50d811b93d5e55b80c0002c7"),
  "product_images_id": NumberInt(30),
  "product_id": NumberInt(4),
  "company_id": NumberInt(10006),
  "location_id": NumberInt(0),
  "map_content": [
    
  ],
  "product_image": "entrance-golf-1.jpg",
  "low_res_image": "200_entrance-golf-1.jpg",
  "image_size": NumberInt(1936068),
  "image_width": NumberInt(2448),
  "image_height": NumberInt(3264),
  "saved_dir": "resources\/FGL\/products\/4\/",
  "status": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0),
  "date_created": ISODate("2012-12-24T08:26:33.0Z")
});
db.getCollection("tb_product_images").insert({
  "_id": ObjectId("50d811be3d5e55b80c0002e6"),
  "product_images_id": NumberInt(31),
  "product_id": NumberInt(4),
  "company_id": NumberInt(10006),
  "location_id": NumberInt(0),
  "map_content": [
    
  ],
  "product_image": "entrance-golf-2.jpg",
  "low_res_image": "200_entrance-golf-2.jpg",
  "image_size": NumberInt(1855429),
  "image_width": NumberInt(2448),
  "image_height": NumberInt(3264),
  "saved_dir": "resources\/FGL\/products\/4\/",
  "status": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0),
  "date_created": ISODate("2012-12-24T08:26:38.0Z")
});
db.getCollection("tb_product_images").insert({
  "_id": ObjectId("50d811c23d5e55b80c000305"),
  "product_images_id": NumberInt(32),
  "product_id": NumberInt(4),
  "company_id": NumberInt(10006),
  "location_id": NumberInt(0),
  "map_content": [
    
  ],
  "product_image": "entrance-golf-3.jpg",
  "low_res_image": "200_entrance-golf-3.jpg",
  "image_size": NumberInt(1887075),
  "image_width": NumberInt(3264),
  "image_height": NumberInt(2448),
  "saved_dir": "resources\/FGL\/products\/4\/",
  "status": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0),
  "date_created": ISODate("2012-12-24T08:26:42.0Z")
});
db.getCollection("tb_product_images").insert({
  "_id": ObjectId("50d811c93d5e55b80c000324"),
  "product_images_id": NumberInt(33),
  "product_id": NumberInt(4),
  "company_id": NumberInt(10006),
  "location_id": NumberInt(0),
  "map_content": [
    
  ],
  "product_image": "entrance-mall-1.jpg",
  "low_res_image": "200_entrance-mall-1.jpg",
  "image_size": NumberInt(1884787),
  "image_width": NumberInt(3264),
  "image_height": NumberInt(2448),
  "saved_dir": "resources\/FGL\/products\/4\/",
  "status": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0),
  "date_created": ISODate("2012-12-24T08:26:49.0Z")
});
db.getCollection("tb_product_images").insert({
  "_id": ObjectId("50d811cd3d5e55b80c000343"),
  "product_images_id": NumberInt(34),
  "product_id": NumberInt(4),
  "company_id": NumberInt(10006),
  "location_id": NumberInt(0),
  "map_content": [
    
  ],
  "product_image": "entrance-mall-2.jpg",
  "low_res_image": "200_entrance-mall-2.jpg",
  "image_size": NumberInt(1893117),
  "image_width": NumberInt(3264),
  "image_height": NumberInt(2448),
  "saved_dir": "resources\/FGL\/products\/4\/",
  "status": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0),
  "date_created": ISODate("2012-12-24T08:26:53.0Z")
});
db.getCollection("tb_product_images").insert({
  "_id": ObjectId("50d811d23d5e55b80c000362"),
  "product_images_id": NumberInt(35),
  "product_id": NumberInt(4),
  "company_id": NumberInt(10006),
  "location_id": NumberInt(0),
  "map_content": [
    
  ],
  "product_image": "entrance-mall-3.jpg",
  "low_res_image": "200_entrance-mall-3.jpg",
  "image_size": NumberInt(1839176),
  "image_width": NumberInt(3264),
  "image_height": NumberInt(2448),
  "saved_dir": "resources\/FGL\/products\/4\/",
  "status": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0),
  "date_created": ISODate("2012-12-24T08:26:58.0Z")
});
db.getCollection("tb_product_images").insert({
  "_id": ObjectId("50d811d63d5e55b80c000381"),
  "product_images_id": NumberInt(36),
  "product_id": NumberInt(4),
  "company_id": NumberInt(10006),
  "location_id": NumberInt(0),
  "map_content": [
    
  ],
  "product_image": "entrance-parkinglot-1.jpg",
  "low_res_image": "200_entrance-parkinglot-1.jpg",
  "image_size": NumberInt(1818086),
  "image_width": NumberInt(3264),
  "image_height": NumberInt(2448),
  "saved_dir": "resources\/FGL\/products\/4\/",
  "status": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0),
  "date_created": ISODate("2012-12-24T08:27:02.0Z")
});
db.getCollection("tb_product_images").insert({
  "_id": ObjectId("50d811da3d5e55b80c0003a0"),
  "product_images_id": NumberInt(37),
  "product_id": NumberInt(4),
  "company_id": NumberInt(10006),
  "location_id": NumberInt(0),
  "map_content": [
    
  ],
  "product_image": "entrance-parkinglot-2.jpg",
  "low_res_image": "200_entrance-parkinglot-2.jpg",
  "image_size": NumberInt(1677926),
  "image_width": NumberInt(3264),
  "image_height": NumberInt(2448),
  "saved_dir": "resources\/FGL\/products\/4\/",
  "status": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0),
  "date_created": ISODate("2012-12-24T08:27:06.0Z")
});
db.getCollection("tb_product_images").insert({
  "_id": ObjectId("50d811de3d5e55b80c0003bf"),
  "product_images_id": NumberInt(38),
  "product_id": NumberInt(4),
  "company_id": NumberInt(10006),
  "location_id": NumberInt(0),
  "map_content": [
    
  ],
  "product_image": "entrance-parkinglot-3.jpg",
  "low_res_image": "200_entrance-parkinglot-3.jpg",
  "image_size": NumberInt(1740997),
  "image_width": NumberInt(3264),
  "image_height": NumberInt(2448),
  "saved_dir": "resources\/FGL\/products\/4\/",
  "status": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0),
  "date_created": ISODate("2012-12-24T08:27:10.0Z")
});
db.getCollection("tb_product_images").insert({
  "_id": ObjectId("50d811e33d5e55b80c0003de"),
  "product_images_id": NumberInt(39),
  "product_id": NumberInt(4),
  "company_id": NumberInt(10006),
  "location_id": NumberInt(0),
  "map_content": [
    
  ],
  "product_image": "entrance-parkinglot-4.jpg",
  "low_res_image": "200_entrance-parkinglot-4.jpg",
  "image_size": NumberInt(1734434),
  "image_width": NumberInt(3264),
  "image_height": NumberInt(2448),
  "saved_dir": "resources\/FGL\/products\/4\/",
  "status": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0),
  "date_created": ISODate("2012-12-24T08:27:15.0Z")
});
db.getCollection("tb_product_images").insert({
  "_id": ObjectId("50d811e73d5e55b80c0003fd"),
  "product_images_id": NumberInt(40),
  "product_id": NumberInt(4),
  "company_id": NumberInt(10006),
  "location_id": NumberInt(0),
  "map_content": [
    
  ],
  "product_image": "entrance-parkinglot-5.jpg",
  "low_res_image": "200_entrance-parkinglot-5.jpg",
  "image_size": NumberInt(1823331),
  "image_width": NumberInt(3264),
  "image_height": NumberInt(2448),
  "saved_dir": "resources\/FGL\/products\/4\/",
  "status": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0),
  "date_created": ISODate("2012-12-24T08:27:19.0Z")
});
db.getCollection("tb_product_images").insert({
  "_id": ObjectId("50d811eb3d5e55b80c00041c"),
  "product_images_id": NumberInt(41),
  "product_id": NumberInt(4),
  "company_id": NumberInt(10006),
  "location_id": NumberInt(0),
  "map_content": [
    
  ],
  "product_image": "entrance-parkinglot-6.jpg",
  "low_res_image": "200_entrance-parkinglot-6.jpg",
  "image_size": NumberInt(1822597),
  "image_width": NumberInt(3264),
  "image_height": NumberInt(2448),
  "saved_dir": "resources\/FGL\/products\/4\/",
  "status": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0),
  "date_created": ISODate("2012-12-24T08:27:23.0Z")
});
db.getCollection("tb_product_images").insert({
  "_id": ObjectId("50d811ef3d5e55b80c00043b"),
  "product_images_id": NumberInt(42),
  "product_id": NumberInt(4),
  "company_id": NumberInt(10006),
  "location_id": NumberInt(0),
  "map_content": [
    
  ],
  "product_image": "entrance-parkinglot-inside.jpg",
  "low_res_image": "200_entrance-parkinglot-inside.jpg",
  "image_size": NumberInt(2003566),
  "image_width": NumberInt(3264),
  "image_height": NumberInt(2448),
  "saved_dir": "resources\/FGL\/products\/4\/",
  "status": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0),
  "date_created": ISODate("2012-12-24T08:27:27.0Z")
});

/** tb_product_packages records **/
db.getCollection("tb_product_packages").insert({
  "_id": ObjectId("50ced4329c7684910700001c"),
  "company_id": NumberInt(10006),
  "date_created": ISODate("2012-12-21T07:40:40.0Z"),
  "description": "FGL",
  "location_id": NumberInt(10000),
  "package_code": "                                   <map id=\"imgmap\" name=\"imgmap\"><area shape=\"rect\" alt=\"\" title=\"\" coords=\"93,52,196,257\" href=\"\" target=\"\" \/><area shape=\"rect\" alt=\"\" title=\"\" coords=\"300,57,397,284\" href=\"\" target=\"\" \/><\/map>                                         ",
  "package_content": [
    
  ],
  "package_id": NumberInt(1),
  "package_image": "7627237.jpg",
  "package_name": "Sign Layout FGL",
  "package_type": NumberInt(4),
  "price": NumberInt(0),
  "saved_dir": "",
  "status": NumberInt(0),
  "user_name": "admin"
});
db.getCollection("tb_product_packages").insert({
  "_id": ObjectId("50cff7759c76840d0700007a"),
  "company_id": NumberInt(10006),
  "date_created": ISODate("2012-12-18T05:19:14.0Z"),
  "description": "the last samurai's pano",
  "location_id": NumberInt(10000),
  "package_code": "<map id=\"imgmap\" name=\"imgmap\"><area shape=\"rect\" alt=\"\" title=\"\" coords=\"458,81,629,259\" href=\"\" target=\"\" \/><area shape=\"rect\" alt=\"\" title=\"\" coords=\"35,70,173,226\" href=\"\" target=\"\" \/><area shape=\"rect\" alt=\"\" title=\"\" coords=\"246,17,401,207\" href=\"\" target=\"\" \/><!-- Created by Online Image Map Editor (http:\/\/www.maschek.hu\/imagemap\/index) --><\/map>",
  "package_content": [
    
  ],
  "package_id": NumberInt(2),
  "package_image": "the_last_samurai_katsumoto.jpg",
  "package_name": "The last samurai",
  "package_type": NumberInt(4),
  "price": NumberInt(0),
  "saved_dir": "",
  "status": NumberInt(1),
  "user_name": "admin"
});

/** tb_province records **/
db.getCollection("tb_province").insert({
  "_id": ObjectId("50aa00e03d5e55180c000224"),
  "province_id": NumberInt(1),
  "province_name": "Alberta",
  "province_key": "ab",
  "province_status": NumberInt(0),
  "province_order": NumberInt(1),
  "country_id": NumberInt(15)
});
db.getCollection("tb_province").insert({
  "_id": ObjectId("50aa00e03d5e55180c000225"),
  "province_id": NumberInt(2),
  "province_name": "British Columbia",
  "province_key": "bc",
  "province_status": NumberInt(0),
  "province_order": NumberInt(2),
  "country_id": NumberInt(15)
});
db.getCollection("tb_province").insert({
  "_id": ObjectId("50aa00e03d5e55180c000226"),
  "province_id": NumberInt(3),
  "province_name": "Manitoba",
  "province_key": "mb",
  "province_status": NumberInt(0),
  "province_order": NumberInt(3),
  "country_id": NumberInt(15)
});
db.getCollection("tb_province").insert({
  "_id": ObjectId("50aa00e03d5e55180c000227"),
  "province_id": NumberInt(4),
  "province_name": "New Brunswick",
  "province_key": "nb",
  "province_status": NumberInt(0),
  "province_order": NumberInt(4),
  "country_id": NumberInt(15)
});
db.getCollection("tb_province").insert({
  "_id": ObjectId("50aa00e03d5e55180c000228"),
  "province_id": NumberInt(5),
  "province_name": "Newfoundland-Labrador",
  "province_key": "nl",
  "province_status": NumberInt(0),
  "province_order": NumberInt(5),
  "country_id": NumberInt(15)
});
db.getCollection("tb_province").insert({
  "_id": ObjectId("50aa00e03d5e55180c000229"),
  "province_id": NumberInt(6),
  "province_name": "Northwest Territories",
  "province_key": "nt",
  "province_status": NumberInt(0),
  "province_order": NumberInt(6),
  "country_id": NumberInt(15)
});
db.getCollection("tb_province").insert({
  "_id": ObjectId("50aa00e03d5e55180c00022a"),
  "province_id": NumberInt(7),
  "province_name": "Nova Scotia",
  "province_key": "ns",
  "province_status": NumberInt(0),
  "province_order": NumberInt(7),
  "country_id": NumberInt(15)
});
db.getCollection("tb_province").insert({
  "_id": ObjectId("50aa00e03d5e55180c00022b"),
  "province_id": NumberInt(8),
  "province_name": "Nunavut",
  "province_key": "nu",
  "province_status": NumberInt(0),
  "province_order": NumberInt(8),
  "country_id": NumberInt(15)
});
db.getCollection("tb_province").insert({
  "_id": ObjectId("50aa00e03d5e55180c00022c"),
  "province_id": NumberInt(9),
  "province_name": "Ontario",
  "province_key": "on",
  "province_status": NumberInt(0),
  "province_order": NumberInt(9),
  "country_id": NumberInt(15)
});
db.getCollection("tb_province").insert({
  "_id": ObjectId("50aa00e03d5e55180c00022d"),
  "country_id": NumberInt(15),
  "province_id": NumberInt(10),
  "province_key": "pei",
  "province_name": "Prince Edward Island",
  "province_order": NumberInt(10),
  "province_status": NumberInt(0)
});
db.getCollection("tb_province").insert({
  "_id": ObjectId("50aa00e03d5e55180c00022e"),
  "province_id": NumberInt(11),
  "province_name": "Quebec",
  "province_key": "qc",
  "province_status": NumberInt(0),
  "province_order": NumberInt(11),
  "country_id": NumberInt(15)
});
db.getCollection("tb_province").insert({
  "_id": ObjectId("50aa00e03d5e55180c00022f"),
  "province_id": NumberInt(12),
  "province_name": "Saskatchewan",
  "province_key": "sk",
  "province_status": NumberInt(0),
  "province_order": NumberInt(12),
  "country_id": NumberInt(15)
});
db.getCollection("tb_province").insert({
  "_id": ObjectId("50aa00e03d5e55180c000230"),
  "province_id": NumberInt(13),
  "province_name": "Yukon",
  "province_key": "yt",
  "province_status": NumberInt(0),
  "province_order": NumberInt(13),
  "country_id": NumberInt(15)
});
db.getCollection("tb_province").insert({
  "_id": ObjectId("50aa00e03d5e55180c000231"),
  "province_id": NumberInt(14),
  "province_name": "Wisconsin",
  "province_key": "wi",
  "province_status": NumberInt(0),
  "province_order": NumberInt(14),
  "country_id": NumberInt(72)
});

/** tb_rule records **/
db.getCollection("tb_rule").insert({
  "_id": ObjectId("50c84eae9c76843d07000007"),
  "rule_admin": NumberInt(0),
  "rule_id": NumberInt(1),
  "rule_key": "manage_company",
  "rule_menu": "company\/company",
  "rule_title": "Manage Company",
  "rule_type": NumberInt(0)
});
db.getCollection("tb_rule").insert({
  "_id": ObjectId("50c84ed29c76843c07000007"),
  "rule_admin": NumberInt(0),
  "rule_id": NumberInt(2),
  "rule_key": "manage_location",
  "rule_menu": "company\/location",
  "rule_title": "Manager Locations",
  "rule_type": NumberInt(1)
});
db.getCollection("tb_rule").insert({
  "_id": ObjectId("50c84f0a9c76841c0700003e"),
  "rule_admin": NumberInt(0),
  "rule_id": NumberInt(3),
  "rule_key": "manage_contact",
  "rule_menu": "user\/contact",
  "rule_title": "Manager Contacts",
  "rule_type": NumberInt(2)
});
db.getCollection("tb_rule").insert({
  "_id": ObjectId("50c84f489c7684360700001d"),
  "rule_admin": NumberInt(0),
  "rule_id": NumberInt(4),
  "rule_key": "manage_products",
  "rule_menu": "product\/products",
  "rule_title": "Manager Product",
  "rule_type": NumberInt(3)
});
db.getCollection("tb_rule").insert({
  "_id": ObjectId("50c84f9e9c7684f106000076"),
  "rule_admin": NumberInt(0),
  "rule_id": NumberInt(5),
  "rule_key": "manage_order",
  "rule_menu": "order\/order",
  "rule_title": "Manage Orders",
  "rule_type": NumberInt(4)
});
db.getCollection("tb_rule").insert({
  "_id": ObjectId("50c84fb79c7684100700005f"),
  "rule_admin": NumberInt(0),
  "rule_id": NumberInt(6),
  "rule_key": "manage_shipping",
  "rule_menu": "order\/shipping",
  "rule_title": "Manage Shipping",
  "rule_type": NumberInt(5)
});
db.getCollection("tb_rule").insert({
  "_id": ObjectId("50c84fcc9c76842507000028"),
  "rule_id": NumberInt(7),
  "rule_title": "Insert Company",
  "rule_type": NumberInt(0),
  "rule_key": "insert_company",
  "rule_admin": NumberInt(0)
});
db.getCollection("tb_rule").insert({
  "_id": ObjectId("50c850149c76841c07000060"),
  "rule_id": NumberInt(8),
  "rule_title": "Approve Order",
  "rule_type": NumberInt(4),
  "rule_key": "approve_order",
  "rule_admin": NumberInt(0)
});
db.getCollection("tb_rule").insert({
  "_id": ObjectId("50c850219c76843607000034"),
  "rule_id": NumberInt(9),
  "rule_title": "Cancel Order",
  "rule_type": NumberInt(4),
  "rule_key": "cancel_order",
  "rule_admin": NumberInt(0)
});
db.getCollection("tb_rule").insert({
  "_id": ObjectId("50c850309c7684120700003e"),
  "rule_id": NumberInt(10),
  "rule_title": "Edit Submitted Order",
  "rule_type": NumberInt(4),
  "rule_key": "edit_submitted_order",
  "rule_admin": NumberInt(0)
});
db.getCollection("tb_rule").insert({
  "_id": ObjectId("50c8503d9c76843b0700001d"),
  "rule_id": NumberInt(11),
  "rule_title": "Allocate to different locations",
  "rule_type": NumberInt(1),
  "rule_key": "allocate_to_different_locations",
  "rule_admin": NumberInt(0)
});
db.getCollection("tb_rule").insert({
  "_id": ObjectId("50c850ae9c76844007000007"),
  "rule_admin": NumberInt(0),
  "rule_id": NumberInt(12),
  "rule_key": "insert_edit_delete_order",
  "rule_title": "Insert, Edit, Delete Order",
  "rule_type": NumberInt(4)
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
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(2),
      "name": "New",
      "key": "new",
      "status": NumberInt(0)
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
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(6),
      "name": "Inactive Unpublished",
      "key": "inactive",
      "status": NumberInt(0)
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
      "name": "Package",
      "key": "package"
    },
    {
      "id": "3",
      "name": "Kit",
      "key": "kit"
    },
    {
      "id": "4",
      "name": "Signage Layout",
      "key": "signage_layout"
    }
  ],
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
      "name": "Submitted",
      "key": "submitted",
      "status": NumberInt(0)
    },
    {
      "id": NumberInt(3),
      "name": "Approved",
      "key": "approved",
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
  "_id": ObjectId("50dab2df3d5e550c07000091"),
  "tag_id": NumberInt(1),
  "tag_name": "Van Houtte - Brand",
  "tag_status": NumberInt(0),
  "tag_order": NumberInt(0),
  "location_id": NumberInt(0),
  "company_id": NumberInt(0),
  "user_name": "",
  "date_created": ISODate("2012-12-26T08:18:39.0Z")
});
db.getCollection("tb_tag").insert({
  "_id": ObjectId("50dab2df3d5e550c07000092"),
  "tag_id": NumberInt(2),
  "tag_name": "Adagio - Brand",
  "tag_status": NumberInt(0),
  "tag_order": NumberInt(1),
  "location_id": NumberInt(0),
  "company_id": NumberInt(0),
  "user_name": "",
  "date_created": ISODate("2012-12-26T08:18:39.0Z")
});
db.getCollection("tb_tag").insert({
  "_id": ObjectId("50dab2df3d5e550c07000093"),
  "tag_id": NumberInt(3),
  "tag_name": "Blue Mountain - Brand",
  "tag_status": NumberInt(0),
  "tag_order": NumberInt(2),
  "location_id": NumberInt(0),
  "company_id": NumberInt(0),
  "user_name": "",
  "date_created": ISODate("2012-12-26T08:18:39.0Z")
});
db.getCollection("tb_tag").insert({
  "_id": ObjectId("50dab2df3d5e550c07000094"),
  "tag_id": NumberInt(4),
  "tag_name": "Menu Board - Product Group",
  "tag_status": NumberInt(0),
  "tag_order": NumberInt(3),
  "location_id": NumberInt(0),
  "company_id": NumberInt(0),
  "user_name": "",
  "date_created": ISODate("2012-12-26T08:18:39.0Z")
});
db.getCollection("tb_tag").insert({
  "_id": ObjectId("50dab2df3d5e550c07000095"),
  "tag_id": NumberInt(5),
  "tag_name": "Logo - Product Group",
  "tag_status": NumberInt(0),
  "tag_order": NumberInt(4),
  "location_id": NumberInt(0),
  "company_id": NumberInt(0),
  "user_name": "",
  "date_created": ISODate("2012-12-26T08:18:39.0Z")
});
db.getCollection("tb_tag").insert({
  "_id": ObjectId("50dab2df3d5e550c07000096"),
  "tag_id": NumberInt(6),
  "tag_name": "Banner Stand - Product Group",
  "tag_status": NumberInt(0),
  "tag_order": NumberInt(5),
  "location_id": NumberInt(0),
  "company_id": NumberInt(0),
  "user_name": "",
  "date_created": ISODate("2012-12-26T08:18:39.0Z")
});
db.getCollection("tb_tag").insert({
  "_id": ObjectId("50dab2df3d5e550c07000097"),
  "tag_id": NumberInt(7),
  "tag_name": "Indoor - Application",
  "tag_status": NumberInt(0),
  "tag_order": NumberInt(6),
  "location_id": NumberInt(0),
  "company_id": NumberInt(0),
  "user_name": "",
  "date_created": ISODate("2012-12-26T08:18:39.0Z")
});
db.getCollection("tb_tag").insert({
  "_id": ObjectId("50dab2df3d5e550c07000098"),
  "tag_id": NumberInt(8),
  "tag_name": "Outdoor - Application",
  "tag_status": NumberInt(0),
  "tag_order": NumberInt(7),
  "location_id": NumberInt(0),
  "company_id": NumberInt(0),
  "user_name": "",
  "date_created": ISODate("2012-12-26T08:18:39.0Z")
});
db.getCollection("tb_tag").insert({
  "_id": ObjectId("50dab2df3d5e550c07000099"),
  "tag_id": NumberInt(9),
  "tag_name": "Graphics - Product Group",
  "tag_status": NumberInt(0),
  "tag_order": NumberInt(8),
  "location_id": NumberInt(0),
  "company_id": NumberInt(0),
  "user_name": "",
  "date_created": ISODate("2012-12-26T08:18:39.0Z")
});
db.getCollection("tb_tag").insert({
  "_id": ObjectId("50dab2df3d5e550c0700009a"),
  "tag_id": NumberInt(10),
  "tag_name": "Banner - Product Group",
  "tag_status": NumberInt(0),
  "tag_order": NumberInt(9),
  "location_id": NumberInt(0),
  "company_id": NumberInt(0),
  "user_name": "",
  "date_created": ISODate("2012-12-26T08:18:39.0Z")
});
db.getCollection("tb_tag").insert({
  "_id": ObjectId("50dab2df3d5e550c0700009b"),
  "tag_id": NumberInt(11),
  "tag_name": "Vehicle Graphics - Product Group",
  "tag_status": NumberInt(0),
  "tag_order": NumberInt(10),
  "location_id": NumberInt(0),
  "company_id": NumberInt(0),
  "user_name": "",
  "date_created": ISODate("2012-12-26T08:18:39.0Z")
});
db.getCollection("tb_tag").insert({
  "_id": ObjectId("50dab2df3d5e550c0700009c"),
  "tag_id": NumberInt(13),
  "tag_name": "Custom - Product Group",
  "tag_status": NumberInt(0),
  "tag_order": NumberInt(11),
  "location_id": NumberInt(0),
  "company_id": NumberInt(0),
  "user_name": "",
  "date_created": ISODate("2012-12-26T08:18:39.0Z")
});
db.getCollection("tb_tag").insert({
  "_id": ObjectId("50dab2df3d5e550c0700009d"),
  "tag_id": NumberInt(14),
  "tag_name": "Price Kit - Product Group",
  "tag_status": NumberInt(0),
  "tag_order": NumberInt(12),
  "location_id": NumberInt(0),
  "company_id": NumberInt(0),
  "user_name": "",
  "date_created": ISODate("2012-12-26T08:18:39.0Z")
});
db.getCollection("tb_tag").insert({
  "_id": ObjectId("50dab2df3d5e550c0700009e"),
  "tag_id": NumberInt(15),
  "tag_name": "Cup - Product Group",
  "tag_status": NumberInt(0),
  "tag_order": NumberInt(13),
  "location_id": NumberInt(0),
  "company_id": NumberInt(0),
  "user_name": "",
  "date_created": ISODate("2012-12-26T08:18:39.0Z")
});
db.getCollection("tb_tag").insert({
  "_id": ObjectId("50dab2df3d5e550c0700009f"),
  "tag_id": NumberInt(16),
  "tag_name": "Decal - Product Group",
  "tag_status": NumberInt(0),
  "tag_order": NumberInt(14),
  "location_id": NumberInt(0),
  "company_id": NumberInt(0),
  "user_name": "",
  "date_created": ISODate("2012-12-26T08:18:39.0Z")
});
db.getCollection("tb_tag").insert({
  "_id": ObjectId("50dab2df3d5e550c070000a0"),
  "tag_id": NumberInt(17),
  "tag_name": "Mural - Product Group",
  "tag_status": NumberInt(0),
  "tag_order": NumberInt(15),
  "location_id": NumberInt(0),
  "company_id": NumberInt(0),
  "user_name": "",
  "date_created": ISODate("2012-12-26T08:18:39.0Z")
});
db.getCollection("tb_tag").insert({
  "_id": ObjectId("50dab2df3d5e550c070000a1"),
  "tag_id": NumberInt(18),
  "tag_name": "Sandwich Board - Product Group",
  "tag_status": NumberInt(0),
  "tag_order": NumberInt(16),
  "location_id": NumberInt(0),
  "company_id": NumberInt(0),
  "user_name": "",
  "date_created": ISODate("2012-12-26T08:18:39.0Z")
});
db.getCollection("tb_tag").insert({
  "_id": ObjectId("50dab2df3d5e550c070000a2"),
  "tag_id": NumberInt(19),
  "tag_name": "Thermos Wrap - Product Group",
  "tag_status": NumberInt(0),
  "tag_order": NumberInt(17),
  "location_id": NumberInt(0),
  "company_id": NumberInt(0),
  "user_name": "",
  "date_created": ISODate("2012-12-26T08:18:39.0Z")
});
db.getCollection("tb_tag").insert({
  "_id": ObjectId("50dab2df3d5e550c070000a3"),
  "tag_id": NumberInt(20),
  "tag_name": "Bello - Product Group",
  "tag_status": NumberInt(0),
  "tag_order": NumberInt(18),
  "location_id": NumberInt(0),
  "company_id": NumberInt(0),
  "user_name": "",
  "date_created": ISODate("2012-12-26T08:18:39.0Z")
});
db.getCollection("tb_tag").insert({
  "_id": ObjectId("50dab2df3d5e550c070000a4"),
  "tag_id": NumberInt(21),
  "tag_name": "W2P Core - Brand",
  "tag_status": NumberInt(0),
  "tag_order": NumberInt(19),
  "location_id": NumberInt(0),
  "company_id": NumberInt(0),
  "user_name": "",
  "date_created": ISODate("2012-12-26T08:18:39.0Z")
});
db.getCollection("tb_tag").insert({
  "_id": ObjectId("50dab2df3d5e550c070000a5"),
  "tag_id": NumberInt(22),
  "tag_name": "Chatters Backlit Posters - Product Group",
  "tag_status": NumberInt(0),
  "tag_order": NumberInt(20),
  "location_id": NumberInt(0),
  "company_id": NumberInt(0),
  "user_name": "",
  "date_created": ISODate("2012-12-26T08:18:39.0Z")
});
db.getCollection("tb_tag").insert({
  "_id": ObjectId("50dab2df3d5e550c070000a6"),
  "tag_id": NumberInt(23),
  "tag_name": "Chatters Logo Banner - Product Group",
  "tag_status": NumberInt(0),
  "tag_order": NumberInt(21),
  "location_id": NumberInt(0),
  "company_id": NumberInt(0),
  "user_name": "",
  "date_created": ISODate("2012-12-26T08:18:39.0Z")
});
db.getCollection("tb_tag").insert({
  "_id": ObjectId("50dab2df3d5e550c070000a7"),
  "tag_id": NumberInt(24),
  "tag_name": "Chatters Wall Banners - Product Group",
  "tag_status": NumberInt(0),
  "tag_order": NumberInt(22),
  "location_id": NumberInt(0),
  "company_id": NumberInt(0),
  "user_name": "",
  "date_created": ISODate("2012-12-26T08:18:39.0Z")
});
db.getCollection("tb_tag").insert({
  "_id": ObjectId("50dab2df3d5e550c070000a8"),
  "tag_id": NumberInt(25),
  "tag_name": "Fast Gas Pumptopper - Product Group",
  "tag_status": NumberInt(0),
  "tag_order": NumberInt(23),
  "location_id": NumberInt(0),
  "company_id": NumberInt(0),
  "user_name": "",
  "date_created": ISODate("2012-12-26T08:18:39.0Z")
});
db.getCollection("tb_tag").insert({
  "_id": ObjectId("50dab2df3d5e550c070000a9"),
  "tag_id": NumberInt(26),
  "tag_name": "Fast Gas Curb Signs - Product Group",
  "tag_status": NumberInt(0),
  "tag_order": NumberInt(24),
  "location_id": NumberInt(0),
  "company_id": NumberInt(0),
  "user_name": "",
  "date_created": ISODate("2012-12-26T08:18:39.0Z")
});
db.getCollection("tb_tag").insert({
  "_id": ObjectId("50dab2df3d5e550c070000aa"),
  "tag_id": NumberInt(27),
  "tag_name": "Fast Gas A-Frame - Product Group",
  "tag_status": NumberInt(0),
  "tag_order": NumberInt(25),
  "location_id": NumberInt(0),
  "company_id": NumberInt(0),
  "user_name": "",
  "date_created": ISODate("2012-12-26T08:18:39.0Z")
});
db.getCollection("tb_tag").insert({
  "_id": ObjectId("50dab2df3d5e550c070000ab"),
  "tag_id": NumberInt(28),
  "tag_name": "Fast Gas Hurriane - Product Group",
  "tag_status": NumberInt(0),
  "tag_order": NumberInt(26),
  "location_id": NumberInt(0),
  "company_id": NumberInt(0),
  "user_name": "",
  "date_created": ISODate("2012-12-26T08:18:39.0Z")
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

/** tb_thickness records **/
db.getCollection("tb_thickness").insert({
  "_id": ObjectId("50b090049c76846e0600000f"),
  "thickness_id": NumberInt(1),
  "thickness_name": "1\/8 inch",
  "thickness_size": "inch",
  "thickness_type": "2"
});

/** tb_user records **/
db.getCollection("tb_user").insert({
  "_id": ObjectId("50c159df9c76844c0600004f"),
  "user_id": NumberInt(101),
  "user_name": "demo_fgl",
  "user_password": "e10adc3949ba59abbe56e057f20f883e",
  "user_type": NumberInt(5),
  "user_status": NumberInt(0),
  "contact_id": NumberInt(4),
  "company_id": NumberInt(10006),
  "location_id": NumberInt(10000),
  "user_lastlog": ISODate("2012-12-28T08:49:28.0Z"),
  "user_rule": NumberInt(0)
});
db.getCollection("tb_user").insert({
  "_id": ObjectId("50a4480a9c76840d04000000"),
  "company_id": NumberInt(0),
  "contact_id": NumberInt(0),
  "location_id": NumberInt(0),
  "user_id": NumberInt(100),
  "user_lastlog": ISODate("2012-12-28T08:44:07.0Z"),
  "user_name": "admin",
  "user_password": "e10adc3949ba59abbe56e057f20f883e",
  "user_status": NumberInt(0),
  "user_type": NumberInt(0),
  "user_rule": NumberInt(0)
});
db.getCollection("tb_user").insert({
  "_id": ObjectId("50c982919c76847f06000065"),
  "company_id": NumberInt(10007),
  "contact_id": NumberInt(5),
  "location_id": NumberInt(10003),
  "user_id": NumberInt(103),
  "user_lastlog": ISODate("2012-12-13T10:24:40.0Z"),
  "user_name": "anvy_user",
  "user_password": "e10adc3949ba59abbe56e057f20f883e",
  "user_rule": "manage_order,manage_products,manage_contact,manage_location,manage_company,",
  "user_status": NumberInt(0),
  "user_type": NumberInt(1)
});
db.getCollection("tb_user").insert({
  "_id": ObjectId("50c15b2e9c76841512000074"),
  "company_id": NumberInt(10006),
  "contact_id": NumberInt(3),
  "location_id": NumberInt(10001),
  "user_id": NumberInt(102),
  "user_lastlog": ISODate("2012-12-10T01:27:33.0Z"),
  "user_name": "demo_vht0",
  "user_password": "202cb962ac59075b964b07152d234b70",
  "user_rule": "allocate_to_different_locations,edit_submitted_order,cancel_order,approve_order,insert_company,manager_locations,",
  "user_status": NumberInt(0),
  "user_type": NumberInt(5)
});

/** tb_user_log records **/
db.getCollection("tb_user_log").insert({
  "_id": ObjectId("50b2ef449c76841d0600007c"),
  "log_id": NumberInt(1),
  "user_id": "admin",
  "log_ipaddress": "192.168.0.105",
  "log_url": "http:\/\/192.168.0.113\/WorkTraq\/admin\/system\/log",
  "log_datetime": ISODate("2012-11-26T04:25:40.0Z")
});
db.getCollection("tb_user_log").insert({
  "_id": ObjectId("50b2ef479c76841d06000087"),
  "log_id": NumberInt(2),
  "user_id": "admin",
  "log_ipaddress": "192.168.0.105",
  "log_url": "http:\/\/192.168.0.113\/WorkTraq\/admin\/system\/log",
  "log_datetime": ISODate("2012-11-26T04:25:43.0Z")
});
db.getCollection("tb_user_log").insert({
  "_id": ObjectId("50b2ef489c76841d06000092"),
  "log_id": NumberInt(3),
  "user_id": "admin",
  "log_ipaddress": "192.168.0.105",
  "log_url": "http:\/\/192.168.0.113\/WorkTraq\/admin\/system\/log",
  "log_datetime": ISODate("2012-11-26T04:25:44.0Z")
});
db.getCollection("tb_user_log").insert({
  "_id": ObjectId("50b2ef499c76841d0600009d"),
  "log_id": NumberInt(4),
  "user_id": "admin",
  "log_ipaddress": "192.168.0.105",
  "log_url": "http:\/\/192.168.0.113\/WorkTraq\/admin\/system\/log",
  "log_datetime": ISODate("2012-11-26T04:25:45.0Z")
});
db.getCollection("tb_user_log").insert({
  "_id": ObjectId("50b2ef4a9c76841d060000a8"),
  "log_id": NumberInt(5),
  "user_id": "admin",
  "log_ipaddress": "192.168.0.105",
  "log_url": "http:\/\/192.168.0.113\/WorkTraq\/admin\/system\/log",
  "log_datetime": ISODate("2012-11-26T04:25:46.0Z")
});
db.getCollection("tb_user_log").insert({
  "_id": ObjectId("50b2ef4b9c76841d060000b3"),
  "log_id": NumberInt(6),
  "user_id": "admin",
  "log_ipaddress": "192.168.0.105",
  "log_url": "http:\/\/192.168.0.113\/WorkTraq\/admin\/system\/log",
  "log_datetime": ISODate("2012-11-26T04:25:47.0Z")
});
db.getCollection("tb_user_log").insert({
  "_id": ObjectId("50b2ef4c9c76841d060000be"),
  "log_id": NumberInt(7),
  "user_id": "admin",
  "log_ipaddress": "192.168.0.105",
  "log_url": "http:\/\/192.168.0.113\/WorkTraq\/admin\/system\/log",
  "log_datetime": ISODate("2012-11-26T04:25:48.0Z")
});
db.getCollection("tb_user_log").insert({
  "_id": ObjectId("50b2ef4d9c76841d060000c9"),
  "log_id": NumberInt(8),
  "user_id": "admin",
  "log_ipaddress": "192.168.0.105",
  "log_url": "http:\/\/192.168.0.113\/WorkTraq\/admin\/system\/log",
  "log_datetime": ISODate("2012-11-26T04:25:49.0Z")
});
db.getCollection("tb_user_log").insert({
  "_id": ObjectId("50b2ef4e9c76841d060000d4"),
  "log_id": NumberInt(9),
  "user_id": "admin",
  "log_ipaddress": "192.168.0.105",
  "log_url": "http:\/\/192.168.0.113\/WorkTraq\/admin\/system\/log",
  "log_datetime": ISODate("2012-11-26T04:25:50.0Z")
});
db.getCollection("tb_user_log").insert({
  "_id": ObjectId("50b2ef559c76843206000045"),
  "log_id": NumberInt(10),
  "user_id": "admin",
  "log_ipaddress": "192.168.0.105",
  "log_url": "http:\/\/192.168.0.113\/WorkTraq\/admin\/system\/log",
  "log_datetime": ISODate("2012-11-26T04:25:57.0Z")
});
db.getCollection("tb_user_log").insert({
  "_id": ObjectId("50b2ef569c76843206000050"),
  "log_id": NumberInt(11),
  "user_id": "admin",
  "log_ipaddress": "192.168.0.105",
  "log_url": "http:\/\/192.168.0.113\/WorkTraq\/admin\/system\/log",
  "log_datetime": ISODate("2012-11-26T04:25:58.0Z")
});
db.getCollection("tb_user_log").insert({
  "_id": ObjectId("50b2ef5f9c7684210600008c"),
  "log_id": NumberInt(12),
  "user_id": "admin",
  "log_ipaddress": "192.168.0.105",
  "log_url": "http:\/\/192.168.0.113\/WorkTraq\/admin\/system\/log",
  "log_datetime": ISODate("2012-11-26T04:26:07.0Z")
});
