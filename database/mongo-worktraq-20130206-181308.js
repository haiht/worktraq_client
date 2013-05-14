
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
db.getCollection("tb_color").insert({
  "_id": ObjectId("50b6bdea3d5e555015000088"),
  "color_code": "Clear",
  "color_code_hex": "#FFFFF1",
  "color_id": NumberInt(135),
  "color_name": "Clear",
  "color_order": NumberInt(0),
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
  "modules": "location_number,",
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
  "modules": "location_number,",
  "relationship": NumberInt(1),
  "sales_rep": "",
  "sales_rep_id": "5",
  "status": NumberInt(0),
  "website": "http:\/\/www.fglsports.com"
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
  "_id": ObjectId("510cbd053d5e556015000c16"),
  "contact_id": NumberInt(111),
  "location_id": NumberInt(10420),
  "contact_type": NumberInt(3),
  "first_name": "Wayne",
  "last_name": "Harke",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 27",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Warburg",
  "address_province": "Alberta",
  "address_postal": "T0C 2T0",
  "address_country": NumberInt(15),
  "direct_phone": "403.396.2006",
  "mobile_phone": "403.396.2006",
  "fax_number": "780-431-4971",
  "home_phone": "403.396.2006",
  "email": "",
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
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000aff"),
  "contact_id": NumberInt(18),
  "location_id": NumberInt(10327),
  "contact_type": NumberInt(3),
  "first_name": "Tabatha",
  "last_name": "Knox",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "5926 - 54th Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Red Deer",
  "address_province": "Alberta",
  "address_postal": "T4N 4M6",
  "address_country": NumberInt(15),
  "direct_phone": "403.391.1187",
  "mobile_phone": "403.391.1187",
  "fax_number": "403.346.2465",
  "home_phone": "403.391.1187",
  "email": "stn40001@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000b02"),
  "contact_id": NumberInt(19),
  "location_id": NumberInt(10328),
  "contact_type": NumberInt(3),
  "first_name": "Tabatha",
  "last_name": "Knox",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 6091, 5107, 50th Street",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Innisfail",
  "address_province": "Alberta",
  "address_postal": "T4G 1S7",
  "address_country": NumberInt(15),
  "direct_phone": "403.391.1187",
  "mobile_phone": "403.391.1187",
  "fax_number": "403.227.3700",
  "home_phone": "403.391.1187",
  "email": "stn40002@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000b05"),
  "contact_id": NumberInt(20),
  "location_id": NumberInt(10329),
  "contact_type": NumberInt(3),
  "first_name": "Michelle",
  "last_name": "Craig",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "4576 - 50th Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Lacombe",
  "address_province": "Alberta",
  "address_postal": "T4L 2B6",
  "address_country": NumberInt(15),
  "direct_phone": "780.361.8295",
  "mobile_phone": "780.361.8295",
  "fax_number": "403.782.4441",
  "home_phone": "780.361.8295",
  "email": "stn40003@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000b08"),
  "contact_id": NumberInt(21),
  "location_id": NumberInt(10330),
  "contact_type": NumberInt(3),
  "first_name": "Tabatha",
  "last_name": "Knox",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "4023 Ross St",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Red Deer",
  "address_province": "Alberta",
  "address_postal": "T4N 1W5",
  "address_country": NumberInt(15),
  "direct_phone": "403.391.1187",
  "mobile_phone": "403.391.1187",
  "fax_number": "403.347.1336",
  "home_phone": "403.391.1187",
  "email": "stn40004@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000b0b"),
  "contact_id": NumberInt(22),
  "location_id": NumberInt(10331),
  "contact_type": NumberInt(3),
  "first_name": "Tabatha",
  "last_name": "Knox",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "4503 - 47th Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Rocky Mountain House",
  "address_province": "Alberta",
  "address_postal": "T4T 1C5",
  "address_country": NumberInt(15),
  "direct_phone": "403.391.1187",
  "mobile_phone": "403.391.1187",
  "fax_number": "403.845.2036",
  "home_phone": "403.391.1187",
  "email": "stn40005@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000b0e"),
  "contact_id": NumberInt(23),
  "location_id": NumberInt(10332),
  "contact_type": NumberInt(3),
  "first_name": "Michelle",
  "last_name": "Craig",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "6002 - 50th Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Stettler",
  "address_province": "Alberta",
  "address_postal": "T0C 2L2",
  "address_country": NumberInt(15),
  "direct_phone": "780.361.8295",
  "mobile_phone": "780.361.8295",
  "fax_number": "403.742.5516",
  "home_phone": "780.361.8295",
  "email": "stn40006@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000b11"),
  "contact_id": NumberInt(24),
  "location_id": NumberInt(10333),
  "contact_type": NumberInt(3),
  "first_name": "Michelle",
  "last_name": "Craig",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 2188",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Drumheller",
  "address_province": "Alberta",
  "address_postal": "T0J 0Y0",
  "address_country": NumberInt(15),
  "direct_phone": "780.361.8295",
  "mobile_phone": "780.361.8295",
  "fax_number": "403.823.5655",
  "home_phone": "780.361.8295",
  "email": "stn40007@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000b14"),
  "contact_id": NumberInt(25),
  "location_id": NumberInt(10334),
  "contact_type": NumberInt(3),
  "first_name": "Tabatha",
  "last_name": "Knox",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "4305 - 55th Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Red Deer",
  "address_province": "Alberta",
  "address_postal": "T4N 4N7",
  "address_country": NumberInt(15),
  "direct_phone": "403.391.1187",
  "mobile_phone": "403.391.1187",
  "fax_number": "403.342.4481",
  "home_phone": "403.391.1187",
  "email": "stn40008@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000b17"),
  "contact_id": NumberInt(26),
  "location_id": NumberInt(10335),
  "contact_type": NumberInt(3),
  "first_name": "Michelle",
  "last_name": "Craig",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "5302 - 53rd Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Ponoka",
  "address_province": "Alberta",
  "address_postal": "T4J 1H7",
  "address_country": NumberInt(15),
  "direct_phone": "780.361.8295",
  "mobile_phone": "780.361.8295",
  "fax_number": "403.783.5316",
  "home_phone": "780.361.8295",
  "email": "stn40009@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000b1a"),
  "contact_id": NumberInt(27),
  "location_id": NumberInt(10336),
  "contact_type": NumberInt(3),
  "first_name": "Kelly",
  "last_name": "Kalynchuk",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 29 - Site 600 - R R 6",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Saskatoon",
  "address_province": "Saskatchewan",
  "address_postal": "S7K 3J9",
  "address_country": NumberInt(15),
  "direct_phone": "306.716.0815",
  "mobile_phone": "306.716.0815",
  "fax_number": "306.244.7376",
  "home_phone": "306.716.0815",
  "email": "amerrehman2002@yahoo.com",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000b1d"),
  "contact_id": NumberInt(28),
  "location_id": NumberInt(10337),
  "contact_type": NumberInt(3),
  "first_name": "Tabatha",
  "last_name": "Knox",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "4902 - 54th Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Olds",
  "address_province": "Alberta",
  "address_postal": "T4H 1H5",
  "address_country": NumberInt(15),
  "direct_phone": "403.391.1187",
  "mobile_phone": "403.391.1187",
  "fax_number": "403.556.8980",
  "home_phone": "403.391.1187",
  "email": "stn40011@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000b20"),
  "contact_id": NumberInt(29),
  "location_id": NumberInt(10338),
  "contact_type": NumberInt(3),
  "first_name": "Randy",
  "last_name": "Brown",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 1702",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Didsbury",
  "address_province": "Alberta",
  "address_postal": "T0M 0W0",
  "address_country": NumberInt(15),
  "direct_phone": "403.880.3631",
  "mobile_phone": "403.880.3631",
  "fax_number": "403.335.4661",
  "home_phone": "403.880.3631",
  "email": "stn40012@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000b23"),
  "contact_id": NumberInt(30),
  "location_id": NumberInt(10339),
  "contact_type": NumberInt(3),
  "first_name": "Michelle",
  "last_name": "Craig",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "4811 - 50th St",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Leduc",
  "address_province": "Alberta",
  "address_postal": "T9E 6W5",
  "address_country": NumberInt(15),
  "direct_phone": "780.361.8295",
  "mobile_phone": "780.361.8295",
  "fax_number": "780.986.7800",
  "home_phone": "780.361.8295",
  "email": "stn40014@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000b26"),
  "contact_id": NumberInt(31),
  "location_id": NumberInt(10340),
  "contact_type": NumberInt(3),
  "first_name": "John-Paul",
  "last_name": "Potestio",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 365",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Whitecourt",
  "address_province": "Alberta",
  "address_postal": "T7S 1N5",
  "address_country": NumberInt(15),
  "direct_phone": "780.718.8369",
  "mobile_phone": "780.718.8369",
  "fax_number": "780.778.5541",
  "home_phone": "780.718.8369",
  "email": "stn40015@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000b29"),
  "contact_id": NumberInt(32),
  "location_id": NumberInt(10341),
  "contact_type": NumberInt(3),
  "first_name": "Michelle",
  "last_name": "Craig",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "201 King Street",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Spruce Grove",
  "address_province": "Alberta",
  "address_postal": "T7X 2Y1",
  "address_country": NumberInt(15),
  "direct_phone": "780.361.8295",
  "mobile_phone": "780.361.8295",
  "fax_number": "780.962.2155",
  "home_phone": "780.361.8295",
  "email": "stn40016@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000b2c"),
  "contact_id": NumberInt(33),
  "location_id": NumberInt(10342),
  "contact_type": NumberInt(3),
  "first_name": "Michelle",
  "last_name": "Craig",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "4904 - 49th St",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Wetaskiwin",
  "address_province": "Alberta",
  "address_postal": "T9A 1H3",
  "address_country": NumberInt(15),
  "direct_phone": "780.361.8295",
  "mobile_phone": "780.361.8295",
  "fax_number": "780.352.7050",
  "home_phone": "780.361.8295",
  "email": "stn40017@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000b2f"),
  "contact_id": NumberInt(34),
  "location_id": NumberInt(10343),
  "contact_type": NumberInt(3),
  "first_name": "John-Paul",
  "last_name": "Potestio",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 5569",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Westlock",
  "address_province": "Alberta",
  "address_postal": "T7P 2P6",
  "address_country": NumberInt(15),
  "direct_phone": "780.718.8369",
  "mobile_phone": "780.718.8369",
  "fax_number": "780.348.5242",
  "home_phone": "780.718.8369",
  "email": "stn40019@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000b32"),
  "contact_id": NumberInt(35),
  "location_id": NumberInt(10344),
  "contact_type": NumberInt(3),
  "first_name": "Randy",
  "last_name": "Brown",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "128 Main St",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Airdrie",
  "address_province": "Alberta",
  "address_postal": "T4B 0P8",
  "address_country": NumberInt(15),
  "direct_phone": "403.880.3631",
  "mobile_phone": "403.880.3631",
  "fax_number": "403.948.7579",
  "home_phone": "403.880.3631",
  "email": "stn40020@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000b35"),
  "contact_id": NumberInt(36),
  "location_id": NumberInt(10345),
  "contact_type": NumberInt(3),
  "first_name": "Michelle",
  "last_name": "Craig",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "5807 - 48th Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Camrose",
  "address_province": "Alberta",
  "address_postal": "T4V 0J9",
  "address_country": NumberInt(15),
  "direct_phone": "780.361.8295",
  "mobile_phone": "780.361.8295",
  "fax_number": "780.672.2375",
  "home_phone": "780.361.8295",
  "email": "stn40021@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000b38"),
  "contact_id": NumberInt(37),
  "location_id": NumberInt(10346),
  "contact_type": NumberInt(3),
  "first_name": "Gord",
  "last_name": "Still",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 1229",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Moosomin",
  "address_province": "Saskatchewan",
  "address_postal": "S0G 3N0",
  "address_country": NumberInt(15),
  "direct_phone": "204.688.6446",
  "mobile_phone": "204.688.6446",
  "fax_number": "306.435.2547",
  "home_phone": "204.688.6446",
  "email": "stn40022@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000b3b"),
  "contact_id": NumberInt(38),
  "location_id": NumberInt(10347),
  "contact_type": NumberInt(3),
  "first_name": "Ryan",
  "last_name": "Lillies",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "5107 - 48th St",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Stony Plain",
  "address_province": "Alberta",
  "address_postal": "T7Z 1X7",
  "address_country": NumberInt(15),
  "direct_phone": "780.361.8295",
  "mobile_phone": "780.361.8295",
  "fax_number": "780.963.3531",
  "home_phone": "780.361.8295",
  "email": "mandersukh@yahoo.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000b3e"),
  "contact_id": NumberInt(39),
  "location_id": NumberInt(10348),
  "contact_type": NumberInt(3),
  "first_name": "Randy",
  "last_name": "Brown",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 508",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Cochrane",
  "address_province": "Alberta",
  "address_postal": "T0L 0W0",
  "address_country": NumberInt(15),
  "direct_phone": "403.880.3631",
  "mobile_phone": "403.880.3631",
  "fax_number": "403.932.6626",
  "home_phone": "403.880.3631",
  "email": "stn40024@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000b41"),
  "contact_id": NumberInt(40),
  "location_id": NumberInt(10349),
  "contact_type": NumberInt(3),
  "first_name": "John-Paul",
  "last_name": "Potestio",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 6128",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Drayton Valley",
  "address_province": "Alberta",
  "address_postal": "T7A 1R6",
  "address_country": NumberInt(15),
  "direct_phone": "780.718.8369",
  "mobile_phone": "780.718.8369",
  "fax_number": "780.542.7535",
  "home_phone": "780.718.8369",
  "email": "stn40025@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000b44"),
  "contact_id": NumberInt(41),
  "location_id": NumberInt(10350),
  "contact_type": NumberInt(3),
  "first_name": "Karl",
  "last_name": "Morrey",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "5014 - 47th Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Taber",
  "address_province": "Alberta",
  "address_postal": "T1G 1T9",
  "address_country": NumberInt(15),
  "direct_phone": "403.813.6646",
  "mobile_phone": "403.813.6646",
  "fax_number": "403.223.9307",
  "home_phone": "403.813.6646",
  "email": "stn40026@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000b47"),
  "contact_id": NumberInt(42),
  "location_id": NumberInt(10351),
  "contact_type": NumberInt(3),
  "first_name": "Kelly",
  "last_name": "Kalynchuk",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "1821 Broadway Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Saskatoon",
  "address_province": "Saskatchewan",
  "address_postal": "S7H 2B6",
  "address_country": NumberInt(15),
  "direct_phone": "306.716.0815",
  "mobile_phone": "306.716.0815",
  "fax_number": "306.586.5779",
  "home_phone": "306.716.0815",
  "email": "stn40028@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000b4a"),
  "contact_id": NumberInt(43),
  "location_id": NumberInt(10352),
  "contact_type": NumberInt(3),
  "first_name": "Mike",
  "last_name": "Meehan",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 60",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Hudson's Hope",
  "address_province": "British Columbia",
  "address_postal": "V0G 1V0",
  "address_country": NumberInt(15),
  "direct_phone": "250.565.4626",
  "mobile_phone": "250.565.4626",
  "fax_number": "250.783.9109",
  "home_phone": "250.565.4626",
  "email": "sunin@pris.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000b4d"),
  "contact_id": NumberInt(44),
  "location_id": NumberInt(10353),
  "contact_type": NumberInt(3),
  "first_name": "Gord",
  "last_name": "Still",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "1209 Richmond Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Brandon",
  "address_province": "Manitoba",
  "address_postal": "R7A 1M5",
  "address_country": NumberInt(15),
  "direct_phone": "204.688.6446",
  "mobile_phone": "204.688.6446",
  "fax_number": "204.728.7744",
  "home_phone": "204.688.6446",
  "email": "stn40035@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000b50"),
  "contact_id": NumberInt(45),
  "location_id": NumberInt(10354),
  "contact_type": NumberInt(3),
  "first_name": "Ryan",
  "last_name": "Lillies",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "15411 - 118th Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Edmonton",
  "address_province": "Alberta",
  "address_postal": "T5V 1C2",
  "address_country": NumberInt(15),
  "direct_phone": "780.719.6941",
  "mobile_phone": "780.719.6941",
  "fax_number": "780.461.1151",
  "home_phone": "780.719.6941",
  "email": "ih7625@hotmail.com",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000b53"),
  "contact_id": NumberInt(46),
  "location_id": NumberInt(10355),
  "contact_type": NumberInt(3),
  "first_name": "Gord",
  "last_name": "Still",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "#60 pth 52 west",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Steinbach",
  "address_province": "Manitoba",
  "address_postal": "R5G 1X7",
  "address_country": NumberInt(15),
  "direct_phone": "204.688.6446",
  "mobile_phone": "204.688.6446",
  "fax_number": "204.320.9873",
  "home_phone": "204.688.6446",
  "email": "stn40037@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000b56"),
  "contact_id": NumberInt(47),
  "location_id": NumberInt(10356),
  "contact_type": NumberInt(3),
  "first_name": "Gordon",
  "last_name": "Brauer",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "2831 - 66th St",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Edmonton",
  "address_province": "Alberta",
  "address_postal": "T6K 4C8",
  "address_country": NumberInt(15),
  "direct_phone": "780.721.3404",
  "mobile_phone": "780.721.3404",
  "fax_number": "780.461.1151",
  "home_phone": "780.721.3404",
  "email": "habibrmalik@shaw.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000b59"),
  "contact_id": NumberInt(48),
  "location_id": NumberInt(10357),
  "contact_type": NumberInt(3),
  "first_name": "Tabatha",
  "last_name": "Knox",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "3202 - 49th Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Red Deer",
  "address_province": "Alberta",
  "address_postal": "T4N 6R5",
  "address_country": NumberInt(15),
  "direct_phone": "403.391.1187",
  "mobile_phone": "403.391.1187",
  "fax_number": "403.340.1888",
  "home_phone": "403.391.1187",
  "email": "stn40044@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000b5c"),
  "contact_id": NumberInt(49),
  "location_id": NumberInt(10358),
  "contact_type": NumberInt(3),
  "first_name": "Randy",
  "last_name": "Brown",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "219 Centre St S",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "High River",
  "address_province": "Alberta",
  "address_postal": "T1V 1M3",
  "address_country": NumberInt(15),
  "direct_phone": "403.880.3631",
  "mobile_phone": "403.880.3631",
  "fax_number": "403-652-7525",
  "home_phone": "403.880.3631",
  "email": "stn40045@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000b5f"),
  "contact_id": NumberInt(50),
  "location_id": NumberInt(10359),
  "contact_type": NumberInt(3),
  "first_name": "Tabatha",
  "last_name": "Knox",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "4405 - 50th St",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Sylvan Lake",
  "address_province": "Alberta",
  "address_postal": "T4S 1J9",
  "address_country": NumberInt(15),
  "direct_phone": "403.391.1187",
  "mobile_phone": "403.391.1187",
  "fax_number": "403.887.4555",
  "home_phone": "403.391.1187",
  "email": "stn40046@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000b62"),
  "contact_id": NumberInt(51),
  "location_id": NumberInt(10360),
  "contact_type": NumberInt(3),
  "first_name": "Randy",
  "last_name": "Brown",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "125 Elizabeth St",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Okotoks",
  "address_province": "Alberta",
  "address_postal": "T0L 1T3",
  "address_country": NumberInt(15),
  "direct_phone": "403.880.3631",
  "mobile_phone": "403.880.3631",
  "fax_number": "403.938.2450",
  "home_phone": "403.880.3631",
  "email": "stn40047@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000b65"),
  "contact_id": NumberInt(52),
  "location_id": NumberInt(10361),
  "contact_type": NumberInt(3),
  "first_name": "Ellen",
  "last_name": "Nutter",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 29",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Demmitt",
  "address_province": "Alberta",
  "address_postal": "T0H 1C0",
  "address_country": NumberInt(15),
  "direct_phone": "780.512.6382",
  "mobile_phone": "780.512.6382",
  "fax_number": "780.356.2428",
  "home_phone": "780.512.6382",
  "email": "stn40048@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000b68"),
  "contact_id": NumberInt(53),
  "location_id": NumberInt(10362),
  "contact_type": NumberInt(3),
  "first_name": "Ryan",
  "last_name": "Lillies",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 1200",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Calmar",
  "address_province": "Alberta",
  "address_postal": "T0C 0V0",
  "address_country": NumberInt(15),
  "direct_phone": "780.719.6941",
  "mobile_phone": "780.719.6941",
  "fax_number": "780.985.3334",
  "home_phone": "780.719.6941",
  "email": "dkmills_123@hotmail.com",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000b6b"),
  "contact_id": NumberInt(54),
  "location_id": NumberInt(10363),
  "contact_type": NumberInt(3),
  "first_name": "Randy",
  "last_name": "Brown",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 1918",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Brooks",
  "address_province": "Alberta",
  "address_postal": "T1R 1C6",
  "address_country": NumberInt(15),
  "direct_phone": "403.880.3631",
  "mobile_phone": "403.880.3631",
  "fax_number": "403.362.6805",
  "home_phone": "403.880.3631",
  "email": "stn40051@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000b6e"),
  "contact_id": NumberInt(55),
  "location_id": NumberInt(10364),
  "contact_type": NumberInt(3),
  "first_name": "Barbara",
  "last_name": "Foret",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "4609 - 50th Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Bonnyville",
  "address_province": "Alberta",
  "address_postal": "T9N 1A5",
  "address_country": NumberInt(15),
  "direct_phone": "780.919.1581",
  "mobile_phone": "780.919.1581",
  "fax_number": "780.826.6244",
  "home_phone": "780.919.1581",
  "email": "stn40052@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000b71"),
  "contact_id": NumberInt(56),
  "location_id": NumberInt(10365),
  "contact_type": NumberInt(3),
  "first_name": "Barbara",
  "last_name": "Foret",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "4210 - 44th St",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Lloydminster",
  "address_province": "Saskatchewan",
  "address_postal": "S9V 1Z1",
  "address_country": NumberInt(15),
  "direct_phone": "780.919.1581",
  "mobile_phone": "780.919.1581",
  "fax_number": "306.825.6222",
  "home_phone": "780.919.1581",
  "email": "stn40053@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000b74"),
  "contact_id": NumberInt(57),
  "location_id": NumberInt(10366),
  "contact_type": NumberInt(3),
  "first_name": "Karl",
  "last_name": "Morrey",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "3 - 4103 - 4th Ave S",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Lethbridge",
  "address_province": "Alberta",
  "address_postal": "T1J 4B3",
  "address_country": NumberInt(15),
  "direct_phone": "403.813.6646",
  "mobile_phone": "403.813.6646",
  "fax_number": "403.329.6021",
  "home_phone": "403.813.6646",
  "email": "stn40055@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000b77"),
  "contact_id": NumberInt(58),
  "location_id": NumberInt(10367),
  "contact_type": NumberInt(3),
  "first_name": "John-Paul",
  "last_name": "Potestio",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 6868",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Edson",
  "address_province": "Alberta",
  "address_postal": "T7E 1V2",
  "address_country": NumberInt(15),
  "direct_phone": "780.718.8369",
  "mobile_phone": "780.718.8369",
  "fax_number": "780.723.4543",
  "home_phone": "780.718.8369",
  "email": "stn40057@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000b7a"),
  "contact_id": NumberInt(59),
  "location_id": NumberInt(10368),
  "contact_type": NumberInt(3),
  "first_name": "Raema",
  "last_name": "Racher",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 99, Hwy 88",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Red Earth Creek",
  "address_province": "Alberta",
  "address_postal": "T0G 1X0",
  "address_country": NumberInt(15),
  "direct_phone": "780.933.0101",
  "mobile_phone": "780.933.0101",
  "fax_number": "780.649.2220",
  "home_phone": "780.933.0101",
  "email": "",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000b7d"),
  "contact_id": NumberInt(60),
  "location_id": NumberInt(10369),
  "contact_type": NumberInt(3),
  "first_name": "Wayne",
  "last_name": "Harke",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "1046 - 14th Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Wainwright",
  "address_province": "Alberta",
  "address_postal": "T9W 1J8",
  "address_country": NumberInt(15),
  "direct_phone": "403.396.2006",
  "mobile_phone": "403.396.2006",
  "fax_number": "",
  "home_phone": "403.396.2006",
  "email": "hwy14cornerstore@telus.net",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000b80"),
  "contact_id": NumberInt(61),
  "location_id": NumberInt(10370),
  "contact_type": NumberInt(3),
  "first_name": "Ellen",
  "last_name": "Nutter",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "9702 - 100th St",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Grande Prairie",
  "address_province": "Alberta",
  "address_postal": "T8V 2L3",
  "address_country": NumberInt(15),
  "direct_phone": "780.512.6382",
  "mobile_phone": "780.512.6382",
  "fax_number": "780.539.1508",
  "home_phone": "780.512.6382",
  "email": "stn40062@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000b83"),
  "contact_id": NumberInt(62),
  "location_id": NumberInt(10371),
  "contact_type": NumberInt(3),
  "first_name": "John-Paul",
  "last_name": "Potestio",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "700 Main St SW",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Slave Lake",
  "address_province": "Alberta",
  "address_postal": "T0G 2A0",
  "address_country": NumberInt(15),
  "direct_phone": "780.718.8369",
  "mobile_phone": "780.718.8369",
  "fax_number": "780.849.3470",
  "home_phone": "780.718.8369",
  "email": "stn40063@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000b86"),
  "contact_id": NumberInt(63),
  "location_id": NumberInt(10372),
  "contact_type": NumberInt(3),
  "first_name": "Tabatha",
  "last_name": "Knox",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 810",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Penhold",
  "address_province": "Alberta",
  "address_postal": "T0M 1R0",
  "address_country": NumberInt(15),
  "direct_phone": "403.391.1187",
  "mobile_phone": "403.391.1187",
  "fax_number": "403 887 0801",
  "home_phone": "403.391.1187",
  "email": "stn40064@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000b89"),
  "contact_id": NumberInt(64),
  "location_id": NumberInt(10373),
  "contact_type": NumberInt(3),
  "first_name": "Gordon",
  "last_name": "Brauer",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "10102 Franklin Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Ft. McMurray",
  "address_province": "Alberta",
  "address_postal": "T9H 2K9",
  "address_country": NumberInt(15),
  "direct_phone": "780.721.3404",
  "mobile_phone": "780.721.3404",
  "fax_number": "780.791.0085",
  "home_phone": "780.721.3404",
  "email": "aimankhaleel@hotmail.com",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000b8c"),
  "contact_id": NumberInt(65),
  "location_id": NumberInt(10374),
  "contact_type": NumberInt(3),
  "first_name": "John-Paul",
  "last_name": "Potestio",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "1345 Switzer Dr",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Hinton",
  "address_province": "Alberta",
  "address_postal": "T7V 2B5",
  "address_country": NumberInt(15),
  "direct_phone": "780.718.8369",
  "mobile_phone": "780.718.8369",
  "fax_number": "780.865.5738",
  "home_phone": "780.718.8369",
  "email": "mnadeemjutt@hotmail.com",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000b8f"),
  "contact_id": NumberInt(66),
  "location_id": NumberInt(10375),
  "contact_type": NumberInt(3),
  "first_name": "Kelly",
  "last_name": "Kalynchuk",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "874 High St W",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Moose Jaw",
  "address_province": "Saskatchewan",
  "address_postal": "S6H 1T9",
  "address_country": NumberInt(15),
  "direct_phone": "306.716.0815",
  "mobile_phone": "306.716.0815",
  "fax_number": "306.694.4333",
  "home_phone": "306.716.0815",
  "email": "stn40069@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000b92"),
  "contact_id": NumberInt(67),
  "location_id": NumberInt(10376),
  "contact_type": NumberInt(3),
  "first_name": "Mike",
  "last_name": "Rouxel",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "431 Stafford Dr N",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Lethbridge",
  "address_province": "Alberta",
  "address_postal": "T1H 2A7",
  "address_country": NumberInt(15),
  "direct_phone": "403.660.4498",
  "mobile_phone": "403.660.4498",
  "fax_number": "403.320.0416",
  "home_phone": "403.660.4498",
  "email": "2738han@naver.com",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000b95"),
  "contact_id": NumberInt(68),
  "location_id": NumberInt(10377),
  "contact_type": NumberInt(3),
  "first_name": "Kelly",
  "last_name": "Kalynchuk",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "1240 - 6th St",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Estevan",
  "address_province": "Saskatchewan",
  "address_postal": "S4A 1B1",
  "address_country": NumberInt(15),
  "direct_phone": "306.716.0815",
  "mobile_phone": "306.716.0815",
  "fax_number": "306.634.2899",
  "home_phone": "306.716.0815",
  "email": "stn40073@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000b98"),
  "contact_id": NumberInt(69),
  "location_id": NumberInt(10378),
  "contact_type": NumberInt(3),
  "first_name": "Kelly",
  "last_name": "Kalynchuk",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 1716",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Tisdale",
  "address_province": "Saskatchewan",
  "address_postal": "S0E 1T0",
  "address_country": NumberInt(15),
  "direct_phone": "306.716.0815",
  "mobile_phone": "306.716.0815",
  "fax_number": "306.873.4500",
  "home_phone": "306.716.0815",
  "email": "benny@saskatel.net",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000b9b"),
  "contact_id": NumberInt(70),
  "location_id": NumberInt(10379),
  "contact_type": NumberInt(3),
  "first_name": "John-Paul",
  "last_name": "Potestio",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 4155",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Barrhead",
  "address_province": "Alberta",
  "address_postal": "T7N 1A2",
  "address_country": NumberInt(15),
  "direct_phone": "780.718.8369",
  "mobile_phone": "780.718.8369",
  "fax_number": "780.372.3747",
  "home_phone": "780.718.8369",
  "email": "stn40077@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000b9e"),
  "contact_id": NumberInt(71),
  "location_id": NumberInt(10380),
  "contact_type": NumberInt(3),
  "first_name": "Kelly",
  "last_name": "Kalynchuk",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "1 - 415 Circle Dr E",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Saskatoon",
  "address_province": "Saskatchewan",
  "address_postal": "S7K 1W5",
  "address_country": NumberInt(15),
  "direct_phone": "306.716.0815",
  "mobile_phone": "306.716.0815",
  "fax_number": "306.653.0302",
  "home_phone": "306.716.0815",
  "email": "stn40078@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000ba1"),
  "contact_id": NumberInt(72),
  "location_id": NumberInt(10381),
  "contact_type": NumberInt(3),
  "first_name": "Kelly",
  "last_name": "Kalynchuk",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "391 - Railway Ave E",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "North Battleford",
  "address_province": "Saskatchewan",
  "address_postal": "S9A 3C8",
  "address_country": NumberInt(15),
  "direct_phone": "306.716.0815",
  "mobile_phone": "306.716.0815",
  "fax_number": "306.445.6663",
  "home_phone": "306.716.0815",
  "email": "stn40081@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000ba4"),
  "contact_id": NumberInt(73),
  "location_id": NumberInt(10382),
  "contact_type": NumberInt(3),
  "first_name": "Wayne",
  "last_name": "Harke",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "101 Burnt Lake Trail",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Red Deer County",
  "address_province": "Alberta",
  "address_postal": "T4S 2L4",
  "address_country": NumberInt(15),
  "direct_phone": "403.396.2006",
  "mobile_phone": "403.396.2006",
  "fax_number": "403.347.3779",
  "home_phone": "403.396.2006",
  "email": "burntlkstore@telus.net",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000ba7"),
  "contact_id": NumberInt(74),
  "location_id": NumberInt(10383),
  "contact_type": NumberInt(3),
  "first_name": "Tabatha",
  "last_name": "Knox",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 368",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Bowden",
  "address_province": "Alberta",
  "address_postal": "T0M 0K0",
  "address_country": NumberInt(15),
  "direct_phone": "403.391.1187",
  "mobile_phone": "403.391.1187",
  "fax_number": "403.224.2100",
  "home_phone": "403.391.1187",
  "email": "stn40083@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000baa"),
  "contact_id": NumberInt(75),
  "location_id": NumberInt(10384),
  "contact_type": NumberInt(3),
  "first_name": "Kevin",
  "last_name": "Fitzpatrick",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 820",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Ste Rose du Lac",
  "address_province": "Manitoba",
  "address_postal": "R0L 1S0",
  "address_country": NumberInt(15),
  "direct_phone": "204.799.8820",
  "mobile_phone": "204.799.8820",
  "fax_number": "204.447.2519",
  "home_phone": "204.799.8820",
  "email": "",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000bad"),
  "contact_id": NumberInt(76),
  "location_id": NumberInt(10385),
  "contact_type": NumberInt(3),
  "first_name": "Gord",
  "last_name": "Still",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "2565 - 7th Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Regina",
  "address_province": "Saskatchewan",
  "address_postal": "S4R 1W3",
  "address_country": NumberInt(15),
  "direct_phone": "204.688.6446",
  "mobile_phone": "204.688.6446",
  "fax_number": "306.525.3230",
  "home_phone": "204.688.6446",
  "email": "stn40089@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000bb0"),
  "contact_id": NumberInt(77),
  "location_id": NumberInt(10386),
  "contact_type": NumberInt(3),
  "first_name": "Michelle",
  "last_name": "Craig",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "3rd St. Lawrence Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Devon",
  "address_province": "Alberta",
  "address_postal": "T9G 1H1",
  "address_country": NumberInt(15),
  "direct_phone": "780.361.8295",
  "mobile_phone": "780.361.8295",
  "fax_number": "780.987.2080",
  "home_phone": "780.361.8295",
  "email": "stn40090@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000bb3"),
  "contact_id": NumberInt(78),
  "location_id": NumberInt(10387),
  "contact_type": NumberInt(3),
  "first_name": "Michelle",
  "last_name": "Craig",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 1540",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Blackfalds",
  "address_province": "Alberta",
  "address_postal": "T0M 0J0",
  "address_country": NumberInt(15),
  "direct_phone": "780.361.8295",
  "mobile_phone": "780.361.8295",
  "fax_number": "403.885.4505",
  "home_phone": "780.361.8295",
  "email": "stn40093@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000bb6"),
  "contact_id": NumberInt(79),
  "location_id": NumberInt(10388),
  "contact_type": NumberInt(3),
  "first_name": "Barbara",
  "last_name": "Foret",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "4602 - 50th St",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Cold Lake",
  "address_province": "Alberta",
  "address_postal": "T9M 1S6",
  "address_country": NumberInt(15),
  "direct_phone": "780.919.1581",
  "mobile_phone": "780.919.1581",
  "fax_number": "780.594.2533",
  "home_phone": "780.919.1581",
  "email": "stn40094@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000bb9"),
  "contact_id": NumberInt(80),
  "location_id": NumberInt(10389),
  "contact_type": NumberInt(3),
  "first_name": "Kelly",
  "last_name": "Kalynchuk",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "150 Broadway St W",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Yorkton",
  "address_province": "Saskatchewan",
  "address_postal": "S3N 0M4",
  "address_country": NumberInt(15),
  "direct_phone": "306.716.0815",
  "mobile_phone": "306.716.0815",
  "fax_number": "306.786.6168",
  "home_phone": "306.716.0815",
  "email": "stn40096@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000bbc"),
  "contact_id": NumberInt(81),
  "location_id": NumberInt(10390),
  "contact_type": NumberInt(3),
  "first_name": "Gord",
  "last_name": "Still",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "103 - 1st St",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Winkler",
  "address_province": "Manitoba",
  "address_postal": "R6W 3M1",
  "address_country": NumberInt(15),
  "direct_phone": "204.688.6446",
  "mobile_phone": "204.688.6446",
  "fax_number": "204.325.8221",
  "home_phone": "204.688.6446",
  "email": "",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000bbf"),
  "contact_id": NumberInt(82),
  "location_id": NumberInt(10391),
  "contact_type": NumberInt(3),
  "first_name": "Randy",
  "last_name": "Brown",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "1020 T C H",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Golden",
  "address_province": "British Columbia",
  "address_postal": "V0A 1H1",
  "address_country": NumberInt(15),
  "direct_phone": "403.880.3631",
  "mobile_phone": "403.880.3631",
  "fax_number": "250.344.7102",
  "home_phone": "403.880.3631",
  "email": "stn40100@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000bc2"),
  "contact_id": NumberInt(83),
  "location_id": NumberInt(10392),
  "contact_type": NumberInt(3),
  "first_name": "Randy",
  "last_name": "Brown",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "340 - 3rd Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Strathmore",
  "address_province": "Alberta",
  "address_postal": "T1P 1B4",
  "address_country": NumberInt(15),
  "direct_phone": "403.880.3631",
  "mobile_phone": "403.880.3631",
  "fax_number": "403.934.5186",
  "home_phone": "403.880.3631",
  "email": "stn40101@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000bc5"),
  "contact_id": NumberInt(84),
  "location_id": NumberInt(10393),
  "contact_type": NumberInt(3),
  "first_name": "Kevin",
  "last_name": "Fitzpatrick",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "-",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Dryden",
  "address_province": "Ontario",
  "address_postal": "P8N 2Y8",
  "address_country": NumberInt(15),
  "direct_phone": "204.799.8820",
  "mobile_phone": "204.799.8820",
  "fax_number": "807-223-7266",
  "home_phone": "204.799.8820",
  "email": "bmckinstry@drytel.net",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000bc8"),
  "contact_id": NumberInt(85),
  "location_id": NumberInt(10394),
  "contact_type": NumberInt(3),
  "first_name": "Ellen",
  "last_name": "Nutter",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 1107",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Beaverlodge",
  "address_province": "Alberta",
  "address_postal": "T0H 0C0",
  "address_country": NumberInt(15),
  "direct_phone": "780.512.6382",
  "mobile_phone": "780.512.6382",
  "fax_number": "780.354.2159",
  "home_phone": "780.512.6382",
  "email": "colin.carroll@macs.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000bcb"),
  "contact_id": NumberInt(86),
  "location_id": NumberInt(10395),
  "contact_type": NumberInt(3),
  "first_name": "Kelly",
  "last_name": "Kalynchuk",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 452",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Biggar",
  "address_province": "Saskatchewan",
  "address_postal": "S0K 0M0",
  "address_country": NumberInt(15),
  "direct_phone": "306.716.0815",
  "mobile_phone": "306.716.0815",
  "fax_number": "306.948.3759",
  "home_phone": "306.716.0815",
  "email": "ctgoring@sasktel.net",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000bce"),
  "contact_id": NumberInt(87),
  "location_id": NumberInt(10396),
  "contact_type": NumberInt(3),
  "first_name": "Ellen",
  "last_name": "Nutter",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 269",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Chetwynd",
  "address_province": "British Columbia",
  "address_postal": "VOC 1J0",
  "address_country": NumberInt(15),
  "direct_phone": "780.512.6382",
  "mobile_phone": "780.512.6382",
  "fax_number": "250 788 2942",
  "home_phone": "780.512.6382",
  "email": "stn40109@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000bd1"),
  "contact_id": NumberInt(88),
  "location_id": NumberInt(10397),
  "contact_type": NumberInt(3),
  "first_name": "Rick",
  "last_name": "Sandhu",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 280",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Ashcroft",
  "address_province": "British Columbia",
  "address_postal": "VOK 1A0",
  "address_country": NumberInt(15),
  "direct_phone": "778.874.1958",
  "mobile_phone": "778.874.1958",
  "fax_number": "250.453.9502",
  "home_phone": "778.874.1958",
  "email": "supperbk@hotmail.com",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000bd4"),
  "contact_id": NumberInt(89),
  "location_id": NumberInt(10398),
  "contact_type": NumberInt(3),
  "first_name": "Barbara",
  "last_name": "Foret",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "4711 - 50th St",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Athabasca",
  "address_province": "Alberta",
  "address_postal": "T9S 1A3",
  "address_country": NumberInt(15),
  "direct_phone": "780.919.1581",
  "mobile_phone": "780.919.1581",
  "fax_number": "780.675.2850",
  "home_phone": "780.919.1581",
  "email": "stn40112@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000bd7"),
  "contact_id": NumberInt(90),
  "location_id": NumberInt(10399),
  "contact_type": NumberInt(3),
  "first_name": "Karl",
  "last_name": "Morrey",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 2153",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Pincher Creek",
  "address_province": "Alberta",
  "address_postal": "T0K 1W0",
  "address_country": NumberInt(15),
  "direct_phone": "403.813.6646",
  "mobile_phone": "403.813.6646",
  "fax_number": "403.627.2867",
  "home_phone": "403.813.6646",
  "email": "stn40113@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000bda"),
  "contact_id": NumberInt(91),
  "location_id": NumberInt(10400),
  "contact_type": NumberInt(3),
  "first_name": "Ellen",
  "last_name": "Nutter",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 988",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Ft. Nelson",
  "address_province": "British Columbia",
  "address_postal": "V0C 1R0",
  "address_country": NumberInt(15),
  "direct_phone": "780.512.6382",
  "mobile_phone": "780.512.6382",
  "fax_number": "250.774.4305",
  "home_phone": "780.512.6382",
  "email": "stn40116@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000bdd"),
  "contact_id": NumberInt(92),
  "location_id": NumberInt(10401),
  "contact_type": NumberInt(3),
  "first_name": "Michelle",
  "last_name": "Craig",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 1510",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Hanna",
  "address_province": "Alberta",
  "address_postal": "T0J 1P0",
  "address_country": NumberInt(15),
  "direct_phone": "780.361.8295",
  "mobile_phone": "780.361.8295",
  "fax_number": "403.854.2850",
  "home_phone": "780.361.8295",
  "email": "leedongyen@hanmail.net",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000be0"),
  "contact_id": NumberInt(93),
  "location_id": NumberInt(10402),
  "contact_type": NumberInt(3),
  "first_name": "Randy",
  "last_name": "Brown",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "2711 Westsyde Rd",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Kamloops",
  "address_province": "British Columbia",
  "address_postal": "V2B 7E1",
  "address_country": NumberInt(15),
  "direct_phone": "403.880.3631",
  "mobile_phone": "403.880.3631",
  "fax_number": "250.579.5524",
  "home_phone": "403.880.3631",
  "email": "stn40120@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000be3"),
  "contact_id": NumberInt(94),
  "location_id": NumberInt(10403),
  "contact_type": NumberInt(3),
  "first_name": "Randy",
  "last_name": "Brown",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "510 Bow Valley Tr",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Canmore",
  "address_province": "Alberta",
  "address_postal": "T1W 1N9",
  "address_country": NumberInt(15),
  "direct_phone": "403.880.3631",
  "mobile_phone": "403.880.3631",
  "fax_number": "403.609.0034",
  "home_phone": "403.880.3631",
  "email": "stn40123@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000be6"),
  "contact_id": NumberInt(95),
  "location_id": NumberInt(10404),
  "contact_type": NumberInt(3),
  "first_name": "Michelle",
  "last_name": "Craig",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 337",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Millet",
  "address_province": "Alberta",
  "address_postal": "T0C 1Z0",
  "address_country": NumberInt(15),
  "direct_phone": "780.361.8295",
  "mobile_phone": "780.361.8295",
  "fax_number": "780.387.5329",
  "home_phone": "780.361.8295",
  "email": "stn40128@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000be9"),
  "contact_id": NumberInt(96),
  "location_id": NumberInt(10405),
  "contact_type": NumberInt(3),
  "first_name": "Wayne",
  "last_name": "Harke",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "4508 - 39th Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Ponoka",
  "address_province": "Alberta",
  "address_postal": "T4J 1B5",
  "address_country": NumberInt(15),
  "direct_phone": "403.396.2006",
  "mobile_phone": "403.396.2006",
  "fax_number": "403.783.8435",
  "home_phone": "403.396.2006",
  "email": "bbquinn@telusplanet.net",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000bec"),
  "contact_id": NumberInt(97),
  "location_id": NumberInt(10406),
  "contact_type": NumberInt(3),
  "first_name": "Barbara",
  "last_name": "Foret",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 1008",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Smoky Lake",
  "address_province": "Alberta",
  "address_postal": "T0A 3C0",
  "address_country": NumberInt(15),
  "direct_phone": "780.919.1581",
  "mobile_phone": "780.919.1581",
  "fax_number": "780.564.4333",
  "home_phone": "780.919.1581",
  "email": "stn40132@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000c31"),
  "contact_id": NumberInt(120),
  "location_id": NumberInt(10429),
  "contact_type": NumberInt(3),
  "first_name": "Raema",
  "last_name": "Racher",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 180",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "McLennan",
  "address_province": "Alberta",
  "address_postal": "T0H 2L0",
  "address_country": NumberInt(15),
  "direct_phone": "780.933.0101",
  "mobile_phone": "780.933.0101",
  "fax_number": "780-324-2967",
  "home_phone": "780.933.0101",
  "email": "",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000c61"),
  "contact_id": NumberInt(136),
  "location_id": NumberInt(10445),
  "contact_type": NumberInt(3),
  "first_name": "Gord",
  "last_name": "Still",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "12 Main St",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Selkirk",
  "address_province": "Manitoba",
  "address_postal": "R1A 1P4",
  "address_country": NumberInt(15),
  "direct_phone": "204.688.6446",
  "mobile_phone": "204.688.6446",
  "fax_number": "204.785.1543",
  "home_phone": "204.688.6446",
  "email": "",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000bef"),
  "contact_id": NumberInt(98),
  "location_id": NumberInt(10407),
  "contact_type": NumberInt(3),
  "first_name": "Ryan",
  "last_name": "Lillies",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "34 - 53222 - R R 272",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Spruce Grove",
  "address_province": "Alberta",
  "address_postal": "T7X 3N4",
  "address_country": NumberInt(15),
  "direct_phone": "780.719.6941",
  "mobile_phone": "780.719.6941",
  "fax_number": "780.962.2797",
  "home_phone": "780.719.6941",
  "email": "keith_halabi@hotmail.com",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000bf2"),
  "contact_id": NumberInt(99),
  "location_id": NumberInt(10408),
  "contact_type": NumberInt(3),
  "first_name": "Karl",
  "last_name": "Morrey",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "323 Van Horne St",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Cranbrook",
  "address_province": "British Columbia",
  "address_postal": "V1C 1Z6",
  "address_country": NumberInt(15),
  "direct_phone": "403.813.6646",
  "mobile_phone": "403.813.6646",
  "fax_number": "250.426.8294",
  "home_phone": "403.813.6646",
  "email": "stn40138@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000bf5"),
  "contact_id": NumberInt(100),
  "location_id": NumberInt(10409),
  "contact_type": NumberInt(3),
  "first_name": "Kelly",
  "last_name": "Kalynchuk",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 208",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Nipawin",
  "address_province": "Saskatchewan",
  "address_postal": "S0E 1E0",
  "address_country": NumberInt(15),
  "direct_phone": "306.716.0815",
  "mobile_phone": "306.716.0815",
  "fax_number": "",
  "home_phone": "306.716.0815",
  "email": "stn40139@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000bf8"),
  "contact_id": NumberInt(101),
  "location_id": NumberInt(10410),
  "contact_type": NumberInt(3),
  "first_name": "Karl",
  "last_name": "Morrey",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "1920 Kootenay St N",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Cranbrook",
  "address_province": "British Columbia",
  "address_postal": "V1C 3N6",
  "address_country": NumberInt(15),
  "direct_phone": "403.813.6646",
  "mobile_phone": "403.813.6646",
  "fax_number": "250.426.8296",
  "home_phone": "403.813.6646",
  "email": "stn40140@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000bfb"),
  "contact_id": NumberInt(102),
  "location_id": NumberInt(10411),
  "contact_type": NumberInt(3),
  "first_name": "Allan",
  "last_name": "Deacon",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "265 - 32nd St W",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Prince Albert",
  "address_province": "Saskatchewan",
  "address_postal": "S6V 5Z2",
  "address_country": NumberInt(15),
  "direct_phone": "306.221.9714",
  "mobile_phone": "306.221.9714",
  "fax_number": "306.763.0562",
  "home_phone": "306.221.9714",
  "email": "dkowalski@sasktel.net",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000bfe"),
  "contact_id": NumberInt(103),
  "location_id": NumberInt(10412),
  "contact_type": NumberInt(3),
  "first_name": "Randy",
  "last_name": "Brown",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Unit H - 3215 Dunmore Rd SE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Medicine Hat",
  "address_province": "Alberta",
  "address_postal": "T1B 2H2",
  "address_country": NumberInt(15),
  "direct_phone": "403.880.3631",
  "mobile_phone": "403.880.3631",
  "fax_number": "403.527.9060",
  "home_phone": "403.880.3631",
  "email": "stn40143@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000c01"),
  "contact_id": NumberInt(104),
  "location_id": NumberInt(10413),
  "contact_type": NumberInt(3),
  "first_name": "Ryan",
  "last_name": "Lillies",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "3006 Calgary Tr SB",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Edmonton",
  "address_province": "Alberta",
  "address_postal": "T5J 5J5",
  "address_country": NumberInt(15),
  "direct_phone": "780.719.6941",
  "mobile_phone": "780.719.6941",
  "fax_number": "780.988.6909",
  "home_phone": "780.719.6941",
  "email": "fasgascalgarytrail@gmail.com",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000c04"),
  "contact_id": NumberInt(105),
  "location_id": NumberInt(10414),
  "contact_type": NumberInt(3),
  "first_name": "Randy",
  "last_name": "Brown",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "9925 Fairmount Dr SE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Calgary",
  "address_province": "Alberta",
  "address_postal": "T2J 0S2",
  "address_country": NumberInt(15),
  "direct_phone": "403.880.3631",
  "mobile_phone": "403.880.3631",
  "fax_number": "403.271.4317",
  "home_phone": "403.880.3631",
  "email": "stn40148@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000c07"),
  "contact_id": NumberInt(106),
  "location_id": NumberInt(10415),
  "contact_type": NumberInt(3),
  "first_name": "Kelly",
  "last_name": "Kalynchuk",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 657",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Meadow Lake",
  "address_province": "Saskatchewan",
  "address_postal": "S9X 1Y5",
  "address_country": NumberInt(15),
  "direct_phone": "306.716.0815",
  "mobile_phone": "306.716.0815",
  "fax_number": "",
  "home_phone": "306.716.0815",
  "email": "stn40150@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000c0a"),
  "contact_id": NumberInt(107),
  "location_id": NumberInt(10416),
  "contact_type": NumberInt(3),
  "first_name": "Perry",
  "last_name": "Kutz",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 303",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "St. Walburg",
  "address_province": "Saskatchewan",
  "address_postal": "S0M 2T0",
  "address_country": NumberInt(15),
  "direct_phone": "306.384.4626",
  "mobile_phone": "306.384.4626",
  "fax_number": "306.248.3421",
  "home_phone": "306.384.4626",
  "email": "jimkim@aski.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000c0d"),
  "contact_id": NumberInt(108),
  "location_id": NumberInt(10417),
  "contact_type": NumberInt(3),
  "first_name": "Tabatha",
  "last_name": "Knox",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 1839",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Sundre",
  "address_province": "Alberta",
  "address_postal": "T0M 1X0",
  "address_country": NumberInt(15),
  "direct_phone": "403.391.1187",
  "mobile_phone": "403.391.1187",
  "fax_number": "403.638.3677",
  "home_phone": "403.391.1187",
  "email": "stn40153@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000c10"),
  "contact_id": NumberInt(109),
  "location_id": NumberInt(10418),
  "contact_type": NumberInt(3),
  "first_name": "John",
  "last_name": "Gerlitz",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 951",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Black Diamond",
  "address_province": "Alberta",
  "address_postal": "T0L 0H0",
  "address_country": NumberInt(15),
  "direct_phone": "403.803.8055",
  "mobile_phone": "403.803.8055",
  "fax_number": "403.933.3768",
  "home_phone": "403.803.8055",
  "email": "oj5861@yahoo.com",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000c13"),
  "contact_id": NumberInt(110),
  "location_id": NumberInt(10419),
  "contact_type": NumberInt(3),
  "first_name": "Craig",
  "last_name": "Miller",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "PO Box 10",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Gravelbourg",
  "address_province": "Saskatchewan",
  "address_postal": "S0H 1X0",
  "address_country": NumberInt(15),
  "direct_phone": "306.533.3272",
  "mobile_phone": "306.533.3272",
  "fax_number": "306-648-2689",
  "home_phone": "306.533.3272",
  "email": "hbjgas@sasktel.net",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000c19"),
  "contact_id": NumberInt(112),
  "location_id": NumberInt(10421),
  "contact_type": NumberInt(3),
  "first_name": "Wayne",
  "last_name": "Harke",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 667",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Forestburg",
  "address_province": "Alberta",
  "address_postal": "T0B 1N0",
  "address_country": NumberInt(15),
  "direct_phone": "403.396.2006",
  "mobile_phone": "403.396.2006",
  "fax_number": "780.582.3732",
  "home_phone": "403.396.2006",
  "email": "badryfwm@persona.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000c1c"),
  "contact_id": NumberInt(113),
  "location_id": NumberInt(10422),
  "contact_type": NumberInt(3),
  "first_name": "Gordon",
  "last_name": "Brauer",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 757",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Lac La Biche",
  "address_province": "Alberta",
  "address_postal": "T0A 2C0",
  "address_country": NumberInt(15),
  "direct_phone": "780.721.3404",
  "mobile_phone": "780.721.3404",
  "fax_number": "780.623.9647",
  "home_phone": "780.721.3404",
  "email": "squirrelys@telus.net",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000c1f"),
  "contact_id": NumberInt(114),
  "location_id": NumberInt(10423),
  "contact_type": NumberInt(3),
  "first_name": "Gord",
  "last_name": "Still",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 629",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Swan River",
  "address_province": "Manitoba",
  "address_postal": "R0L 1Z0",
  "address_country": NumberInt(15),
  "direct_phone": "204.688.6446",
  "mobile_phone": "204.688.6446",
  "fax_number": "204.734.2032",
  "home_phone": "204.688.6446",
  "email": "stn40165@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000c22"),
  "contact_id": NumberInt(115),
  "location_id": NumberInt(10424),
  "contact_type": NumberInt(3),
  "first_name": "Karl",
  "last_name": "Morrey",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 677",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Raymond",
  "address_province": "Alberta",
  "address_postal": "T0K 2S0",
  "address_country": NumberInt(15),
  "direct_phone": "403.813.6646",
  "mobile_phone": "403.813.6646",
  "fax_number": "403-752-4928",
  "home_phone": "403.813.6646",
  "email": "stn40166@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000c25"),
  "contact_id": NumberInt(116),
  "location_id": NumberInt(10425),
  "contact_type": NumberInt(3),
  "first_name": "Gordon",
  "last_name": "Brauer",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 539",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Two Hills",
  "address_province": "Alberta",
  "address_postal": "T0B 4K0",
  "address_country": NumberInt(15),
  "direct_phone": "780.721.3404",
  "mobile_phone": "780.721.3404",
  "fax_number": "780.657.2388",
  "home_phone": "780.721.3404",
  "email": "bma2001@hanmail.net",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000c28"),
  "contact_id": NumberInt(117),
  "location_id": NumberInt(10426),
  "contact_type": NumberInt(3),
  "first_name": "Kelly",
  "last_name": "Kalynchuk",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "300 Ave H S",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Saskatoon",
  "address_province": "Saskatchewan",
  "address_postal": "S7M 1W3",
  "address_country": NumberInt(15),
  "direct_phone": "306.716.0815",
  "mobile_phone": "306.716.0815",
  "fax_number": "",
  "home_phone": "306.716.0815",
  "email": "stn40169@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000c2b"),
  "contact_id": NumberInt(118),
  "location_id": NumberInt(10427),
  "contact_type": NumberInt(3),
  "first_name": "Ellen",
  "last_name": "Nutter",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 209",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Grande Cache",
  "address_province": "Alberta",
  "address_postal": "T0E 0Y0",
  "address_country": NumberInt(15),
  "direct_phone": "780.718.8369",
  "mobile_phone": "780.718.8369",
  "fax_number": "780.827.3680",
  "home_phone": "780.718.8369",
  "email": "stn40171@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000c2e"),
  "contact_id": NumberInt(119),
  "location_id": NumberInt(10428),
  "contact_type": NumberInt(3),
  "first_name": "Mike",
  "last_name": "Meehan",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "1977 Queensway St",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Prince George",
  "address_province": "British Columbia",
  "address_postal": "V2L 1M1",
  "address_country": NumberInt(15),
  "direct_phone": "250.565.4626",
  "mobile_phone": "250.565.4626",
  "fax_number": "",
  "home_phone": "250.565.4626",
  "email": "",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000c34"),
  "contact_id": NumberInt(121),
  "location_id": NumberInt(10430),
  "contact_type": NumberInt(3),
  "first_name": "Karl",
  "last_name": "Morrey",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "545 Wallinger Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Kimberley",
  "address_province": "British Columbia",
  "address_postal": "V1A 1Z8",
  "address_country": NumberInt(15),
  "direct_phone": "403.813.6646",
  "mobile_phone": "403.813.6646",
  "fax_number": "250.427.4914",
  "home_phone": "403.813.6646",
  "email": "stn40177@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000c37"),
  "contact_id": NumberInt(122),
  "location_id": NumberInt(10431),
  "contact_type": NumberInt(3),
  "first_name": "Mike",
  "last_name": "Rouxel",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 1299",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Elkford",
  "address_province": "British Columbia",
  "address_postal": "V0B 1H0",
  "address_country": NumberInt(15),
  "direct_phone": "403.660.4498",
  "mobile_phone": "403.660.4498",
  "fax_number": "250.865.7888",
  "home_phone": "403.660.4498",
  "email": "elkminim@telus.net",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000c3a"),
  "contact_id": NumberInt(123),
  "location_id": NumberInt(10432),
  "contact_type": NumberInt(3),
  "first_name": "Karl",
  "last_name": "Morrey",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 300",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Blairmore",
  "address_province": "Alberta",
  "address_postal": "T0K 0E0",
  "address_country": NumberInt(15),
  "direct_phone": "403.813.6646",
  "mobile_phone": "403.813.6646",
  "fax_number": "403.562.7781",
  "home_phone": "403.813.6646",
  "email": "stn40182@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000c3d"),
  "contact_id": NumberInt(124),
  "location_id": NumberInt(10433),
  "contact_type": NumberInt(3),
  "first_name": "Gord",
  "last_name": "Still",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 2120",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Carman",
  "address_province": "Manitoba",
  "address_postal": "R0G 0J0",
  "address_country": NumberInt(15),
  "direct_phone": "204.688.6446",
  "mobile_phone": "204.688.6446",
  "fax_number": "204.745.2371",
  "home_phone": "204.688.6446",
  "email": "stn40184@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000c40"),
  "contact_id": NumberInt(125),
  "location_id": NumberInt(10434),
  "contact_type": NumberInt(3),
  "first_name": "Gord",
  "last_name": "Still",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 658",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "The Pas",
  "address_province": "Manitoba",
  "address_postal": "R9A 1K7",
  "address_country": NumberInt(15),
  "direct_phone": "204.688.6446",
  "mobile_phone": "204.688.6446",
  "fax_number": "204.623.7130",
  "home_phone": "204.688.6446",
  "email": "stn40187@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000c43"),
  "contact_id": NumberInt(126),
  "location_id": NumberInt(10435),
  "contact_type": NumberInt(3),
  "first_name": "Gordon",
  "last_name": "Brauer",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "90 Granada Blvd",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Sherwood Park",
  "address_province": "Alberta",
  "address_postal": "T8A 5J2",
  "address_country": NumberInt(15),
  "direct_phone": "780.721.3404",
  "mobile_phone": "780.721.3404",
  "fax_number": "780.467.3505",
  "home_phone": "780.721.3404",
  "email": "ravi@dreamequity.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000c46"),
  "contact_id": NumberInt(127),
  "location_id": NumberInt(10436),
  "contact_type": NumberInt(3),
  "first_name": "Rick",
  "last_name": "Sandhu",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "3163 Hwy 3",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Keremeos",
  "address_province": "British Columbia",
  "address_postal": "V0X 1N1",
  "address_country": NumberInt(15),
  "direct_phone": "778.874.1958",
  "mobile_phone": "778.874.1958",
  "fax_number": "250.499.5815",
  "home_phone": "778.874.1958",
  "email": "gas2002@telus.net",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000c49"),
  "contact_id": NumberInt(128),
  "location_id": NumberInt(10437),
  "contact_type": NumberInt(3),
  "first_name": "Barbara",
  "last_name": "Foret",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "54 Brentwood Blvd",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Sherwood Park",
  "address_province": "Alberta",
  "address_postal": "T8A 2H6",
  "address_country": NumberInt(15),
  "direct_phone": "780.919.1581",
  "mobile_phone": "780.919.1581",
  "fax_number": "780.417.0647",
  "home_phone": "780.919.1581",
  "email": "stn40192@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000c4c"),
  "contact_id": NumberInt(129),
  "location_id": NumberInt(10438),
  "contact_type": NumberInt(3),
  "first_name": "Ellen",
  "last_name": "Nutter",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "10506 - 100th Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Grande Prairie",
  "address_province": "Alberta",
  "address_postal": "T8V OV9",
  "address_country": NumberInt(15),
  "direct_phone": "780.512.6382",
  "mobile_phone": "780.512.6382",
  "fax_number": "403.513.2431",
  "home_phone": "780.512.6382",
  "email": "stn40195@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000c4f"),
  "contact_id": NumberInt(130),
  "location_id": NumberInt(10439),
  "contact_type": NumberInt(3),
  "first_name": "Barbara",
  "last_name": "Foret",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "5640 - 50th Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Lloydminster",
  "address_province": "Alberta",
  "address_postal": "T9V 0X5",
  "address_country": NumberInt(15),
  "direct_phone": "780.919.1581",
  "mobile_phone": "780.919.1581",
  "fax_number": "780.808.2146",
  "home_phone": "780.919.1581",
  "email": "stn40196@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000c52"),
  "contact_id": NumberInt(131),
  "location_id": NumberInt(10440),
  "contact_type": NumberInt(3),
  "first_name": "Ellen",
  "last_name": "Nutter",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "10812 Alaska Rd",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Fort St. John",
  "address_province": "British Columbia",
  "address_postal": "V1J 5T5",
  "address_country": NumberInt(15),
  "direct_phone": "780.512.6382",
  "mobile_phone": "780.512.6382",
  "fax_number": "250 785 8828",
  "home_phone": "780.512.6382",
  "email": "stn40201@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000c55"),
  "contact_id": NumberInt(132),
  "location_id": NumberInt(10441),
  "contact_type": NumberInt(3),
  "first_name": "Gord",
  "last_name": "Still",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "1819 Saskatchewan Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Portage La Prairie",
  "address_province": "Manitoba",
  "address_postal": "R1N 0N9",
  "address_country": NumberInt(15),
  "direct_phone": "204.688.6446",
  "mobile_phone": "204.688.6446",
  "fax_number": "204.239.4960",
  "home_phone": "204.688.6446",
  "email": "stn40203@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000c58"),
  "contact_id": NumberInt(133),
  "location_id": NumberInt(10442),
  "contact_type": NumberInt(3),
  "first_name": "Kelly",
  "last_name": "Kalynchuk",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "455 - North Service Rd E",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Swift Current",
  "address_province": "Saskatchewan",
  "address_postal": "S9H 3T7",
  "address_country": NumberInt(15),
  "direct_phone": "306.716.0815",
  "mobile_phone": "306.716.0815",
  "fax_number": "",
  "home_phone": "306.716.0815",
  "email": "stn40204@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000c5b"),
  "contact_id": NumberInt(134),
  "location_id": NumberInt(10443),
  "contact_type": NumberInt(3),
  "first_name": "Kevin",
  "last_name": "Fitzpatrick",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "PO Box 520",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Onanole",
  "address_province": "Manitoba",
  "address_postal": "R0J 1N0",
  "address_country": NumberInt(15),
  "direct_phone": "204.799.8820",
  "mobile_phone": "204.799.8820",
  "fax_number": "204.848.4114",
  "home_phone": "204.799.8820",
  "email": "bgrserv@mts.net",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000c5e"),
  "contact_id": NumberInt(135),
  "location_id": NumberInt(10444),
  "contact_type": NumberInt(3),
  "first_name": "Gordon",
  "last_name": "Brauer",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "4808 - 48th St",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Redwater",
  "address_province": "Alberta",
  "address_postal": "T0A 2W0",
  "address_country": NumberInt(15),
  "direct_phone": "780.721.3404",
  "mobile_phone": "780.721.3404",
  "fax_number": "780.942.2106",
  "home_phone": "780.721.3404",
  "email": "daspicer@telusplanet.net",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000c64"),
  "contact_id": NumberInt(137),
  "location_id": NumberInt(10446),
  "contact_type": NumberInt(3),
  "first_name": "Gord",
  "last_name": "Still",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 487",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Neepawa",
  "address_province": "Manitoba",
  "address_postal": "R0J 1H0",
  "address_country": NumberInt(15),
  "direct_phone": "204.688.6446",
  "mobile_phone": "204.688.6446",
  "fax_number": "",
  "home_phone": "204.688.6446",
  "email": "stn40209@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000c67"),
  "contact_id": NumberInt(138),
  "location_id": NumberInt(10447),
  "contact_type": NumberInt(3),
  "first_name": "Raema",
  "last_name": "Racher",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "1, 10511 - 84 Avenue",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Grande Prairie",
  "address_province": "Alberta",
  "address_postal": "T8V 7G4",
  "address_country": NumberInt(15),
  "direct_phone": "780.933.0101",
  "mobile_phone": "780.933.0101",
  "fax_number": "780.833.9078",
  "home_phone": "780.933.0101",
  "email": "cindy.feldman@macs.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000c6a"),
  "contact_id": NumberInt(139),
  "location_id": NumberInt(10448),
  "contact_type": NumberInt(3),
  "first_name": "Tabatha",
  "last_name": "Knox",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "17 Gasoline Alley East",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Red Deer County",
  "address_province": "Alberta",
  "address_postal": "T4E 1B3",
  "address_country": NumberInt(15),
  "direct_phone": "403.391.1187",
  "mobile_phone": "403.391.1187",
  "fax_number": "403-347-5876",
  "home_phone": "403.391.1187",
  "email": "chsaeed7@hotmail.com",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000c6d"),
  "contact_id": NumberInt(140),
  "location_id": NumberInt(10449),
  "contact_type": NumberInt(3),
  "first_name": "Gord",
  "last_name": "Still",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "55 Cree Rd",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Thompson",
  "address_province": "Manitoba",
  "address_postal": "R8N 0B9",
  "address_country": NumberInt(15),
  "direct_phone": "204.688.6446",
  "mobile_phone": "204.688.6446",
  "fax_number": "",
  "home_phone": "204.688.6446",
  "email": "stn40214@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000c70"),
  "contact_id": NumberInt(141),
  "location_id": NumberInt(10450),
  "contact_type": NumberInt(3),
  "first_name": "Gord",
  "last_name": "Still",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "904 Main St S",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Dauphin",
  "address_province": "Manitoba",
  "address_postal": "R7N 1M2",
  "address_country": NumberInt(15),
  "direct_phone": "204.688.6446",
  "mobile_phone": "204.688.6446",
  "fax_number": "",
  "home_phone": "204.688.6446",
  "email": "stn40214@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000c73"),
  "contact_id": NumberInt(142),
  "location_id": NumberInt(10451),
  "contact_type": NumberInt(3),
  "first_name": "Barbara",
  "last_name": "Foret",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "10102 - 88th Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Ft. Saskatchewan",
  "address_province": "Alberta",
  "address_postal": "T8L 4J9",
  "address_country": NumberInt(15),
  "direct_phone": "780.919.1581",
  "mobile_phone": "780.919.1581",
  "fax_number": "780.992.1719",
  "home_phone": "780.919.1581",
  "email": "stn40217@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000c76"),
  "contact_id": NumberInt(143),
  "location_id": NumberInt(10452),
  "contact_type": NumberInt(3),
  "first_name": "Rick",
  "last_name": "Sandhu",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "6592 - Hwy 97A",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Enderby",
  "address_province": "British Columbia",
  "address_postal": "V0E 1V3",
  "address_country": NumberInt(15),
  "direct_phone": "778.874.1958",
  "mobile_phone": "778.874.1958",
  "fax_number": "250.838.6021",
  "home_phone": "778.874.1958",
  "email": "stn40219@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000c79"),
  "contact_id": NumberInt(144),
  "location_id": NumberInt(10453),
  "contact_type": NumberInt(3),
  "first_name": "John-Paul",
  "last_name": "Potestio",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 990",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Mayerthorpe",
  "address_province": "Alberta",
  "address_postal": "T0E 1N0",
  "address_country": NumberInt(15),
  "direct_phone": "780.718.8369",
  "mobile_phone": "780.718.8369",
  "fax_number": "780.786.2631",
  "home_phone": "780.718.8369",
  "email": "sherryrocks26@hotmail.com",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000c7c"),
  "contact_id": NumberInt(145),
  "location_id": NumberInt(10454),
  "contact_type": NumberInt(3),
  "first_name": "Sean",
  "last_name": "Meindl",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 5542",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Haines Junction",
  "address_province": "Yukon",
  "address_postal": "Y0B 1L0",
  "address_country": NumberInt(15),
  "direct_phone": "604.312.5068",
  "mobile_phone": "604.312.5068",
  "fax_number": "867.634.3834",
  "home_phone": "604.312.5068",
  "email": "vandoug@northwestel.net",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000c7f"),
  "contact_id": NumberInt(146),
  "location_id": NumberInt(10455),
  "contact_type": NumberInt(3),
  "first_name": "Sean",
  "last_name": "Meindl",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "2 Burns Rd",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Whitehorse",
  "address_province": "Yukon",
  "address_postal": "Y1A 4Z3",
  "address_country": NumberInt(15),
  "direct_phone": "604.312.5068",
  "mobile_phone": "604.312.5068",
  "fax_number": "",
  "home_phone": "604.312.5068",
  "email": "rodmalchow@klondiker.com",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000c82"),
  "contact_id": NumberInt(147),
  "location_id": NumberInt(10456),
  "contact_type": NumberInt(3),
  "first_name": "Sean",
  "last_name": "Meindl",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "91888 B Alaska Hwy",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Whitehorse",
  "address_province": "Yukon",
  "address_postal": "Y1A 5B7",
  "address_country": NumberInt(15),
  "direct_phone": "604.312.5068",
  "mobile_phone": "604.312.5068",
  "fax_number": "867.668.3976",
  "home_phone": "604.312.5068",
  "email": "rodmalchow@klondiker.com",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000c85"),
  "contact_id": NumberInt(148),
  "location_id": NumberInt(10457),
  "contact_type": NumberInt(3),
  "first_name": "Sean",
  "last_name": "Meindl",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Mile 1202 - Alaska Hwy",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Beaver Creek",
  "address_province": "Yukon",
  "address_postal": "Y0B 1A0",
  "address_country": NumberInt(15),
  "direct_phone": "604.312.5068",
  "mobile_phone": "604.312.5068",
  "fax_number": "867.862.7601",
  "home_phone": "604.312.5068",
  "email": "cbeatty@northwestel.net",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000c88"),
  "contact_id": NumberInt(149),
  "location_id": NumberInt(10458),
  "contact_type": NumberInt(3),
  "first_name": "Sean",
  "last_name": "Meindl",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "General Delivery",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Destruction Bay",
  "address_province": "Yukon",
  "address_postal": "Y0B 1H0",
  "address_country": NumberInt(15),
  "direct_phone": "604.312.5068",
  "mobile_phone": "604.312.5068",
  "fax_number": "867.841.4804",
  "home_phone": "604.312.5068",
  "email": "talbotarm@northwestel.net",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000c8b"),
  "contact_id": NumberInt(150),
  "location_id": NumberInt(10459),
  "contact_type": NumberInt(3),
  "first_name": "Sean",
  "last_name": "Meindl",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "7999 King George Highway",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Surrey",
  "address_province": "British Columbia",
  "address_postal": "V3W 5B3",
  "address_country": NumberInt(15),
  "direct_phone": "604.312.5068",
  "mobile_phone": "604.312.5068",
  "fax_number": "604.543.3784",
  "home_phone": "604.312.5068",
  "email": "dstg@live.com",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000c8e"),
  "contact_id": NumberInt(151),
  "location_id": NumberInt(10460),
  "contact_type": NumberInt(3),
  "first_name": "Karl",
  "last_name": "Morrey",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "PO Box 1749",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Cardston",
  "address_province": "Alberta",
  "address_postal": "T0K 0K0",
  "address_country": NumberInt(15),
  "direct_phone": "403.813.6646",
  "mobile_phone": "403.813.6646",
  "fax_number": "403.653.1319",
  "home_phone": "403.813.6646",
  "email": "stn40240@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000c91"),
  "contact_id": NumberInt(152),
  "location_id": NumberInt(10461),
  "contact_type": NumberInt(3),
  "first_name": "Ellen",
  "last_name": "Nutter",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "101-8314 Westpointe Drive",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Grande Prairie",
  "address_province": "Alberta",
  "address_postal": "T8W 2R2",
  "address_country": NumberInt(15),
  "direct_phone": "780.512.6382",
  "mobile_phone": "780.512.6382",
  "fax_number": "780.539.0353",
  "home_phone": "780.512.6382",
  "email": "stn40249@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000c94"),
  "contact_id": NumberInt(153),
  "location_id": NumberInt(10462),
  "contact_type": NumberInt(3),
  "first_name": "Ellen",
  "last_name": "Nutter",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "1304 Alaska Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Dawson Creek",
  "address_province": "British Columbia",
  "address_postal": "V1G 1Z3",
  "address_country": NumberInt(15),
  "direct_phone": "780.512.6382",
  "mobile_phone": "780.512.6382",
  "fax_number": "250.782.8829",
  "home_phone": "780.512.6382",
  "email": "stn40251@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000c97"),
  "contact_id": NumberInt(154),
  "location_id": NumberInt(10463),
  "contact_type": NumberInt(3),
  "first_name": "Barbara",
  "last_name": "Foret",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "6813 - Hwy 16A",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Vegreville",
  "address_province": "Alberta",
  "address_postal": "T9C 0A3",
  "address_country": NumberInt(15),
  "direct_phone": "780.919.1581",
  "mobile_phone": "780.919.1581",
  "fax_number": "780-608-0841",
  "home_phone": "780.919.1581",
  "email": "stn40252@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000c9a"),
  "contact_id": NumberInt(155),
  "location_id": NumberInt(10464),
  "contact_type": NumberInt(3),
  "first_name": "Sean",
  "last_name": "Meindl",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "11614 - 96 Avenue",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Delta",
  "address_province": "British Columbia",
  "address_postal": "V4C 3W7",
  "address_country": NumberInt(15),
  "direct_phone": "604.312.5068",
  "mobile_phone": "604.312.5068",
  "fax_number": "604.588.2003",
  "home_phone": "604.312.5068",
  "email": "avtchander@hotmail.com",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000c9d"),
  "contact_id": NumberInt(156),
  "location_id": NumberInt(10465),
  "contact_type": NumberInt(3),
  "first_name": "Wayne",
  "last_name": "Harke",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 995",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Rimbey",
  "address_province": "Alberta",
  "address_postal": "T0C 2J0",
  "address_country": NumberInt(15),
  "direct_phone": "403.396.2006",
  "mobile_phone": "403.396.2006",
  "fax_number": "403.843.3003",
  "home_phone": "403.396.2006",
  "email": "robrondeel@hotmail.com",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000ca0"),
  "contact_id": NumberInt(157),
  "location_id": NumberInt(10466),
  "contact_type": NumberInt(3),
  "first_name": "Gordon",
  "last_name": "Brauer",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 392",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Ardmore",
  "address_province": "Alberta",
  "address_postal": "T0A 0B0",
  "address_country": NumberInt(15),
  "direct_phone": "780.721.3404",
  "mobile_phone": "780.721.3404",
  "fax_number": "780.826.6150",
  "home_phone": "780.721.3404",
  "email": "delamarterd@yahoo.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000ca3"),
  "contact_id": NumberInt(158),
  "location_id": NumberInt(10467),
  "contact_type": NumberInt(3),
  "first_name": "Mathew",
  "last_name": "Brayman",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "747 Pharmacy Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Toronto",
  "address_province": "Ontario",
  "address_postal": "M1L 3J7",
  "address_country": NumberInt(15),
  "direct_phone": "416.797.4303",
  "mobile_phone": "416.797.4303",
  "fax_number": "416.757.8436",
  "home_phone": "416.797.4303",
  "email": "",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000ca6"),
  "contact_id": NumberInt(159),
  "location_id": NumberInt(10468),
  "contact_type": NumberInt(3),
  "first_name": "Rick",
  "last_name": "Sandhu",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "800 Schofield Highway",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Trail",
  "address_province": "British Columbia",
  "address_postal": "V1R 2G9",
  "address_country": NumberInt(15),
  "direct_phone": "778.874.1958",
  "mobile_phone": "778.874.1958",
  "fax_number": "250.368.6049",
  "home_phone": "778.874.1958",
  "email": "warfieldshell@shawbiz.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000ca9"),
  "contact_id": NumberInt(160),
  "location_id": NumberInt(10469),
  "contact_type": NumberInt(3),
  "first_name": "Craig",
  "last_name": "Miller",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "PO Box 2157",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Maple Creek",
  "address_province": "Saskatchewan",
  "address_postal": "S0N 1N0",
  "address_country": NumberInt(15),
  "direct_phone": "306.533.3272",
  "mobile_phone": "306.533.3272",
  "fax_number": "306.662.2421",
  "home_phone": "306.533.3272",
  "email": "senahc@yahoo.com",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000cac"),
  "contact_id": NumberInt(161),
  "location_id": NumberInt(10470),
  "contact_type": NumberInt(3),
  "first_name": "Raema",
  "last_name": "Racher",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 1176",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Valleyview",
  "address_province": "Alberta",
  "address_postal": "T0H 3N0",
  "address_country": NumberInt(15),
  "direct_phone": "780.933.0101",
  "mobile_phone": "780.933.0101",
  "fax_number": "780.524.3622",
  "home_phone": "780.933.0101",
  "email": "brianbsc1958@yahoo.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000caf"),
  "contact_id": NumberInt(162),
  "location_id": NumberInt(10471),
  "contact_type": NumberInt(3),
  "first_name": "Karl",
  "last_name": "Morrey",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "33A 155 Malcom Drive",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Quesnel",
  "address_province": "British Columbia",
  "address_postal": "V2J 3K2",
  "address_country": NumberInt(15),
  "direct_phone": "403.813.6646",
  "mobile_phone": "403.813.6646",
  "fax_number": "250-992-3152",
  "home_phone": "403.813.6646",
  "email": "stn40270@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000cb2"),
  "contact_id": NumberInt(163),
  "location_id": NumberInt(10472),
  "contact_type": NumberInt(3),
  "first_name": "Barbara",
  "last_name": "Foret",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "9618-160 Avenue",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Edmonton",
  "address_province": "Alberta",
  "address_postal": "T5Z 3S6",
  "address_country": NumberInt(15),
  "direct_phone": "780.919.1581",
  "mobile_phone": "780.919.1581",
  "fax_number": "780-484-6761",
  "home_phone": "780.919.1581",
  "email": "stn40271@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000cb5"),
  "contact_id": NumberInt(164),
  "location_id": NumberInt(10473),
  "contact_type": NumberInt(3),
  "first_name": "Tabatha",
  "last_name": "Knox",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "#100 6720 - 52nd Avenue",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Red Deer",
  "address_province": "Alberta",
  "address_postal": "T4N 4K9",
  "address_country": NumberInt(15),
  "direct_phone": "403.391.1187",
  "mobile_phone": "403.391.1187",
  "fax_number": "403-348-0473",
  "home_phone": "403.391.1187",
  "email": "stn40272@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000cb8"),
  "contact_id": NumberInt(165),
  "location_id": NumberInt(10474),
  "contact_type": NumberInt(3),
  "first_name": "Karl",
  "last_name": "Morrey",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "1501 Estevan Road",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Nanaimo",
  "address_province": "British Columbia",
  "address_postal": "V9S 5L6",
  "address_country": NumberInt(15),
  "direct_phone": "403.813.6646",
  "mobile_phone": "403.813.6646",
  "fax_number": "250-753-2670",
  "home_phone": "403.813.6646",
  "email": "stn40273@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000cbb"),
  "contact_id": NumberInt(166),
  "location_id": NumberInt(10475),
  "contact_type": NumberInt(3),
  "first_name": "Tabatha",
  "last_name": "Knox",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "3020 - 22nd Street",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Red Deer",
  "address_province": "Alberta",
  "address_postal": "T4R 3J5",
  "address_country": NumberInt(15),
  "direct_phone": "403.391.1187",
  "mobile_phone": "403.391.1187",
  "fax_number": "403-348-8062",
  "home_phone": "403.391.1187",
  "email": "stn40274@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000cbe"),
  "contact_id": NumberInt(167),
  "location_id": NumberInt(10476),
  "contact_type": NumberInt(3),
  "first_name": "Karl",
  "last_name": "Morrey",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "#144 - 32555 London Avenue",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Mission",
  "address_province": "British Columbia",
  "address_postal": "V2V 6M7",
  "address_country": NumberInt(15),
  "direct_phone": "403.813.6646",
  "mobile_phone": "403.813.6646",
  "fax_number": "604-820-0761",
  "home_phone": "403.813.6646",
  "email": "stn40275@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000cc1"),
  "contact_id": NumberInt(168),
  "location_id": NumberInt(10477),
  "contact_type": NumberInt(3),
  "first_name": "Karl",
  "last_name": "Morrey",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "6014 Vedder Road",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Chilliwack",
  "address_province": "British Columbia",
  "address_postal": "V2R 5M4",
  "address_country": NumberInt(15),
  "direct_phone": "403.813.6646",
  "mobile_phone": "403.813.6646",
  "fax_number": "604-847-0683",
  "home_phone": "403.813.6646",
  "email": "stn40276@parkland.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000cc4"),
  "contact_id": NumberInt(169),
  "location_id": NumberInt(10478),
  "contact_type": NumberInt(3),
  "first_name": "Ryan",
  "last_name": "Lillies",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "7520 - 104 St NW",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Edmonton",
  "address_province": "Alberta",
  "address_postal": "T6E 6J4",
  "address_country": NumberInt(15),
  "direct_phone": "780.719.6941",
  "mobile_phone": "780.719.6941",
  "fax_number": "",
  "home_phone": "780.719.6941",
  "email": "russ@gasland.com",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd053d5e556015000cc7"),
  "contact_id": NumberInt(170),
  "location_id": NumberInt(10479),
  "contact_type": NumberInt(3),
  "first_name": "Ryan",
  "last_name": "Lillies",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "104 South Avenue",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Spruce Grove",
  "address_province": "Alberta",
  "address_postal": "T7X 3A3",
  "address_country": NumberInt(15),
  "direct_phone": "780.719.6941",
  "mobile_phone": "780.719.6941",
  "fax_number": "",
  "home_phone": "780.719.6941",
  "email": "fasgas@telus.net",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd063d5e556015000cca"),
  "contact_id": NumberInt(171),
  "location_id": NumberInt(10480),
  "contact_type": NumberInt(3),
  "first_name": "John",
  "last_name": "Gerlitz",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "#130-49 Hinshaw Drive",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Sylvan Lake",
  "address_province": "Alberta",
  "address_postal": "T4S 0K5",
  "address_country": NumberInt(15),
  "direct_phone": "403.803.8055",
  "mobile_phone": "403.803.8055",
  "fax_number": "403.864.0306",
  "home_phone": "403.803.8055",
  "email": "twentyfourseven1972@yahoo.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd063d5e556015000ccd"),
  "contact_id": NumberInt(172),
  "location_id": NumberInt(10481),
  "contact_type": NumberInt(3),
  "first_name": "Mike",
  "last_name": "Rouxel",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "4808 - 12th St NE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Calgary",
  "address_province": "Alberta",
  "address_postal": "T2E 4R4",
  "address_country": NumberInt(15),
  "direct_phone": "403.660.4498",
  "mobile_phone": "403.660.4498",
  "fax_number": "403.398.3789",
  "home_phone": "403.660.4498",
  "email": "wasim_sadiq50@hotmail.com",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd063d5e556015000cd0"),
  "contact_id": NumberInt(173),
  "location_id": NumberInt(10482),
  "contact_type": NumberInt(3),
  "first_name": "Mike",
  "last_name": "Rouxel",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "7404 Ogden Rd SE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Calgary",
  "address_province": "Alberta",
  "address_postal": "T2C 1B8",
  "address_country": NumberInt(15),
  "direct_phone": "403.660.4498",
  "mobile_phone": "403.660.4498",
  "fax_number": "403-508-2358",
  "home_phone": "403.660.4498",
  "email": "jiyhwang68@gmail.com",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd063d5e556015000cd3"),
  "contact_id": NumberInt(174),
  "location_id": NumberInt(10483),
  "contact_type": NumberInt(3),
  "first_name": "Raema",
  "last_name": "Racher",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 179",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Ft. Assiniboine",
  "address_province": "Alberta",
  "address_postal": "T0G 1A0",
  "address_country": NumberInt(15),
  "direct_phone": "780.933.0101",
  "mobile_phone": "780.933.0101",
  "fax_number": "780.584.3744",
  "home_phone": "780.933.0101",
  "email": "lutianshun@hotmail.com",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd063d5e556015000cd6"),
  "contact_id": NumberInt(175),
  "location_id": NumberInt(10484),
  "contact_type": NumberInt(3),
  "first_name": "Raema",
  "last_name": "Racher",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 329",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Nampa",
  "address_province": "Alberta",
  "address_postal": "T0H 2R0",
  "address_country": NumberInt(15),
  "direct_phone": "780.933.0101",
  "mobile_phone": "780.933.0101",
  "fax_number": "780.322.3766",
  "home_phone": "780.933.0101",
  "email": "woorii@hotmail.com",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd063d5e556015000cd9"),
  "contact_id": NumberInt(176),
  "location_id": NumberInt(10485),
  "contact_type": NumberInt(3),
  "first_name": "Rick",
  "last_name": "Sandhu",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "PO Box 40",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Boston Bar",
  "address_province": "British Columbia",
  "address_postal": "V0K 1C0",
  "address_country": NumberInt(15),
  "direct_phone": "778.874.1958",
  "mobile_phone": "778.874.1958",
  "fax_number": "604-867-9742",
  "home_phone": "778.874.1958",
  "email": "kwsuh05@hotmail.com",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd063d5e556015000cdc"),
  "contact_id": NumberInt(177),
  "location_id": NumberInt(10486),
  "contact_type": NumberInt(3),
  "first_name": "Mike",
  "last_name": "Rouxel",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 1455",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Claresholm",
  "address_province": "Alberta",
  "address_postal": "T0L-0T0",
  "address_country": NumberInt(15),
  "direct_phone": "403.660.4498",
  "mobile_phone": "403.660.4498",
  "fax_number": "403-256-2342",
  "home_phone": "403.660.4498",
  "email": "fasgasclaresholm@gmail.com",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd063d5e556015000cdf"),
  "contact_id": NumberInt(178),
  "location_id": NumberInt(10487),
  "contact_type": NumberInt(3),
  "first_name": "Bill",
  "last_name": "McMackin",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "1017 Coverdale Road",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Riverview",
  "address_province": "New Brunswick",
  "address_postal": "E1B 5G1",
  "address_country": NumberInt(15),
  "direct_phone": "506.380.1132",
  "mobile_phone": "506.380.1132",
  "fax_number": "506.387.4777",
  "home_phone": "506.380.1132",
  "email": "crystaljonesnb@hotmail.com",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd063d5e556015000ce2"),
  "contact_id": NumberInt(179),
  "location_id": NumberInt(10488),
  "contact_type": NumberInt(3),
  "first_name": "Kevin",
  "last_name": "Fitzpatrick",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 24",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Lundar",
  "address_province": "Manitoba",
  "address_postal": "ROC 1YO",
  "address_country": NumberInt(15),
  "direct_phone": "204.799.8820",
  "mobile_phone": "204.799.8820",
  "fax_number": "204-762-5428",
  "home_phone": "204.799.8820",
  "email": "gudmundsonfarm@hotmail.com",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd063d5e556015000ce5"),
  "contact_id": NumberInt(180),
  "location_id": NumberInt(10489),
  "contact_type": NumberInt(3),
  "first_name": "Bill",
  "last_name": "McMackin",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "3823 Rt 115",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Notre Dame",
  "address_province": "New Brunswick",
  "address_postal": "E4V 2E7",
  "address_country": NumberInt(15),
  "direct_phone": "506.380.1132",
  "mobile_phone": "506.380.1132",
  "fax_number": "506-576-0819",
  "home_phone": "506.380.1132",
  "email": "jmcdowell@rogers.com",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd063d5e556015000ce8"),
  "contact_id": NumberInt(181),
  "location_id": NumberInt(10490),
  "contact_type": NumberInt(3),
  "first_name": "Rick",
  "last_name": "Sandhu",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "31313 Livingstone Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Abbotsford",
  "address_province": "British Columbia",
  "address_postal": "V2T 4T2",
  "address_country": NumberInt(15),
  "direct_phone": "778.874.1958",
  "mobile_phone": "778.874.1958",
  "fax_number": "604.854.6129",
  "home_phone": "778.874.1958",
  "email": "amlrinder28@yahoo.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd063d5e556015000ceb"),
  "contact_id": NumberInt(182),
  "location_id": NumberInt(10491),
  "contact_type": NumberInt(3),
  "first_name": "Mike",
  "last_name": "Meehan",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "PO Box 2018",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Tumbler Ridge",
  "address_province": "British Columbia",
  "address_postal": "V0C 2W0",
  "address_country": NumberInt(15),
  "direct_phone": "250.565.4626",
  "mobile_phone": "250.565.4626",
  "fax_number": "250-242-4952",
  "home_phone": "250.565.4626",
  "email": "inderjitnijjar@hotmail.com",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd063d5e556015000cee"),
  "contact_id": NumberInt(183),
  "location_id": NumberInt(10492),
  "contact_type": NumberInt(3),
  "first_name": "Raema",
  "last_name": "Racher",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "P.O. Box 6539",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Peace River",
  "address_province": "Alberta",
  "address_postal": "T8S 1S1",
  "address_country": NumberInt(15),
  "direct_phone": "780.933.0101",
  "mobile_phone": "780.933.0101",
  "fax_number": "780-624-5202",
  "home_phone": "780.933.0101",
  "email": "kangkimchi@yahoo.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd063d5e556015000cf1"),
  "contact_id": NumberInt(184),
  "location_id": NumberInt(10493),
  "contact_type": NumberInt(3),
  "first_name": "Kevin",
  "last_name": "Fitzpatrick",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "691 Dugald Road",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Dugald",
  "address_province": "Manitoba",
  "address_postal": "ROE OKO",
  "address_country": NumberInt(15),
  "direct_phone": "204.799.8820",
  "mobile_phone": "204.799.8820",
  "fax_number": "(204)853-7453",
  "home_phone": "204.799.8820",
  "email": "",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd063d5e556015000cf4"),
  "contact_id": NumberInt(185),
  "location_id": NumberInt(10494),
  "contact_type": NumberInt(3),
  "first_name": "John",
  "last_name": "Gerlitz",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 364",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Delburne",
  "address_province": "Alberta",
  "address_postal": "T0M 0V0",
  "address_country": NumberInt(15),
  "direct_phone": "403.803.8055",
  "mobile_phone": "403.803.8055",
  "fax_number": "403.749.3179",
  "home_phone": "403.803.8055",
  "email": "cka0607@gmail.com",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd063d5e556015000cf7"),
  "contact_id": NumberInt(186),
  "location_id": NumberInt(10495),
  "contact_type": NumberInt(3),
  "first_name": "Mike",
  "last_name": "Meehan",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 1877",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Ft. St. James",
  "address_province": "British Columbia",
  "address_postal": "V0J 1P0",
  "address_country": NumberInt(15),
  "direct_phone": "250.565.4626",
  "mobile_phone": "250.565.4626",
  "fax_number": "250.996.8088",
  "home_phone": "250.565.4626",
  "email": "dennisgladue@gmail.com",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd063d5e556015000cfa"),
  "contact_id": NumberInt(187),
  "location_id": NumberInt(10496),
  "contact_type": NumberInt(3),
  "first_name": "Bill",
  "last_name": "McMackin",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "PO Box 96",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "New Glasgow",
  "address_province": "Nova Scotia",
  "address_postal": "B2H 5E1",
  "address_country": NumberInt(15),
  "direct_phone": "506.380.1132",
  "mobile_phone": "506.380.1132",
  "fax_number": "902-752-7703",
  "home_phone": "506.380.1132",
  "email": "wade@hankinfuels.com",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd063d5e556015000cfd"),
  "contact_id": NumberInt(188),
  "location_id": NumberInt(10497),
  "contact_type": NumberInt(3),
  "first_name": "Kevin",
  "last_name": "Fitzpatrick",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 196",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Churchbridge",
  "address_province": "Saskatchewan",
  "address_postal": "SOA OMO",
  "address_country": NumberInt(15),
  "direct_phone": "204.799.8820",
  "mobile_phone": "204.799.8820",
  "fax_number": "306-896-2444",
  "home_phone": "204.799.8820",
  "email": "wojos@sasktel.net",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd063d5e556015000d00"),
  "contact_id": NumberInt(189),
  "location_id": NumberInt(10498),
  "contact_type": NumberInt(3),
  "first_name": "Wayne",
  "last_name": "Harke",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 547",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Buck Lake",
  "address_province": "Alberta",
  "address_postal": "T0C 0T0",
  "address_country": NumberInt(15),
  "direct_phone": "403.396.2006",
  "mobile_phone": "403.396.2006",
  "fax_number": "780.388.0028",
  "home_phone": "403.396.2006",
  "email": "brianlee@xplornet.com",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd063d5e556015000d03"),
  "contact_id": NumberInt(190),
  "location_id": NumberInt(10499),
  "contact_type": NumberInt(3),
  "first_name": "Sean",
  "last_name": "Meindl",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "7581 Pacific Rim Highway",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Port Alberni",
  "address_province": "British Columbia",
  "address_postal": "V9Y 8Y5",
  "address_country": NumberInt(15),
  "direct_phone": "604.312.5068",
  "mobile_phone": "604.312.5068",
  "fax_number": "",
  "home_phone": "604.312.5068",
  "email": "tseshahtmarket@shaw.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd063d5e556015000d06"),
  "contact_id": NumberInt(191),
  "location_id": NumberInt(10500),
  "contact_type": NumberInt(3),
  "first_name": "Perry",
  "last_name": "Kutz",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 398",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Provost",
  "address_province": "Alberta",
  "address_postal": "T0B 3S0",
  "address_country": NumberInt(15),
  "direct_phone": "306.384.4626",
  "mobile_phone": "306.384.4626",
  "fax_number": "780.753.6815",
  "home_phone": "306.384.4626",
  "email": "youngman1851@hanmail.net",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd063d5e556015000d09"),
  "contact_id": NumberInt(192),
  "location_id": NumberInt(10501),
  "contact_type": NumberInt(3),
  "first_name": "Gordon",
  "last_name": "Brauer",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "990 Lakeland Village Blvd",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Sherwood Park",
  "address_province": "Alberta",
  "address_postal": "T8H 1M1",
  "address_country": NumberInt(15),
  "direct_phone": "780.721.3404",
  "mobile_phone": "780.721.3404",
  "fax_number": "780.449.1919",
  "home_phone": "780.721.3404",
  "email": "bwl2000investments@gmail.com",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd063d5e556015000d0c"),
  "contact_id": NumberInt(193),
  "location_id": NumberInt(10502),
  "contact_type": NumberInt(3),
  "first_name": "Ryan",
  "last_name": "Lillies",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "10103 181 Street",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Edmonton",
  "address_province": "Alberta",
  "address_postal": "T5S 1N2",
  "address_country": NumberInt(15),
  "direct_phone": "780.719.6941",
  "mobile_phone": "780.719.6941",
  "fax_number": "780.443.3498",
  "home_phone": "780.719.6941",
  "email": "lsh500@hotmail.com",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd063d5e556015000d0f"),
  "contact_id": NumberInt(194),
  "location_id": NumberInt(10503),
  "contact_type": NumberInt(3),
  "first_name": "Wayne",
  "last_name": "Harke",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "7110 Gaetz Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Red Deer",
  "address_province": "Alberta",
  "address_postal": "T4N 4E4",
  "address_country": NumberInt(15),
  "direct_phone": "403.396.2006",
  "mobile_phone": "403.396.2006",
  "fax_number": "403.340.8247",
  "home_phone": "403.396.2006",
  "email": "mdavid@telus.net",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd063d5e556015000d12"),
  "contact_id": NumberInt(195),
  "location_id": NumberInt(10504),
  "contact_type": NumberInt(3),
  "first_name": "Kevin",
  "last_name": "Fitzpatrick",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 434",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Riverton",
  "address_province": "Manitoba",
  "address_postal": "R0C 2Ro",
  "address_country": NumberInt(15),
  "direct_phone": "204.799.8820",
  "mobile_phone": "204.799.8820",
  "fax_number": "(204) 378-5384",
  "home_phone": "204.799.8820",
  "email": "bev@gatewaygasbar.com",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd063d5e556015000d15"),
  "contact_id": NumberInt(196),
  "location_id": NumberInt(10505),
  "contact_type": NumberInt(3),
  "first_name": "Bill",
  "last_name": "McMackin",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "2065 Rt 2",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Fortune Briidge",
  "address_province": "Prince Edward Island",
  "address_postal": "C0A 2B0",
  "address_country": NumberInt(15),
  "direct_phone": "506.380.1132",
  "mobile_phone": "506.380.1132",
  "fax_number": "902-687-2747",
  "home_phone": "506.380.1132",
  "email": "",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd063d5e556015000d18"),
  "contact_id": NumberInt(197),
  "location_id": NumberInt(10506),
  "contact_type": NumberInt(3),
  "first_name": "Sean",
  "last_name": "Meindl",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "1101 Ewen Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "New Westminster",
  "address_province": "British Columbia",
  "address_postal": "V3M 5E4",
  "address_country": NumberInt(15),
  "direct_phone": "604.312.5068",
  "mobile_phone": "604.312.5068",
  "fax_number": "",
  "home_phone": "604.312.5068",
  "email": "meelee10155@hotmail.com",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd063d5e556015000d1b"),
  "contact_id": NumberInt(198),
  "location_id": NumberInt(10507),
  "contact_type": NumberInt(3),
  "first_name": "Gordon",
  "last_name": "Brauer",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 1440",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Gibbons",
  "address_province": "Alberta",
  "address_postal": "T0A 1N0",
  "address_country": NumberInt(15),
  "direct_phone": "780.721.3404",
  "mobile_phone": "780.721.3404",
  "fax_number": "780.923.2141",
  "home_phone": "780.721.3404",
  "email": "mrjoshuakim@gmail.com",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd063d5e556015000d1e"),
  "contact_id": NumberInt(199),
  "location_id": NumberInt(10508),
  "contact_type": NumberInt(3),
  "first_name": "Kevin",
  "last_name": "Fitzpatrick",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 670",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Carnduff",
  "address_province": "Saskatchewan",
  "address_postal": "S0C 0S0",
  "address_country": NumberInt(15),
  "direct_phone": "204.799.8820",
  "mobile_phone": "204.799.8820",
  "fax_number": "306.482.4040",
  "home_phone": "204.799.8820",
  "email": "hycanada@yahoo.com",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd063d5e556015000d21"),
  "contact_id": NumberInt(200),
  "location_id": NumberInt(10509),
  "contact_type": NumberInt(3),
  "first_name": "Sean",
  "last_name": "Meindl",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "10732 - 128th St",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Surrey",
  "address_province": "British Columbia",
  "address_postal": "V3T 3A2",
  "address_country": NumberInt(15),
  "direct_phone": "604.312.5068",
  "mobile_phone": "604.312.5068",
  "fax_number": "604.957.2705",
  "home_phone": "604.312.5068",
  "email": "binning_43@hotmail.com",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd063d5e556015000d24"),
  "contact_id": NumberInt(201),
  "location_id": NumberInt(10510),
  "contact_type": NumberInt(3),
  "first_name": "Raema",
  "last_name": "Racher",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 307",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Manning",
  "address_province": "Alberta",
  "address_postal": "T0H 1M1",
  "address_country": NumberInt(15),
  "direct_phone": "780.933.0101",
  "mobile_phone": "780.933.0101",
  "fax_number": "780.836.3481",
  "home_phone": "780.933.0101",
  "email": "yoofather@hotmail.com",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd063d5e556015000d27"),
  "contact_id": NumberInt(202),
  "location_id": NumberInt(10511),
  "contact_type": NumberInt(3),
  "first_name": "Rick",
  "last_name": "Sandhu",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Site A - Comp 1 - R R 2",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Chase",
  "address_province": "British Columbia",
  "address_postal": "V0E 1M0",
  "address_country": NumberInt(15),
  "direct_phone": "778.874.1958",
  "mobile_phone": "778.874.1958",
  "fax_number": "250.679.7884",
  "home_phone": "778.874.1958",
  "email": "quantumtec@hotmail.com",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd063d5e556015000d2a"),
  "contact_id": NumberInt(203),
  "location_id": NumberInt(10512),
  "contact_type": NumberInt(3),
  "first_name": "Raema",
  "last_name": "Racher",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 49",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Clairmont",
  "address_province": "Alberta",
  "address_postal": "T0H 0W0",
  "address_country": NumberInt(15),
  "direct_phone": "780.933.0101",
  "mobile_phone": "780.933.0101",
  "fax_number": "780.567.5101",
  "home_phone": "780.933.0101",
  "email": "redrob03@telus.net",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd063d5e556015000d2d"),
  "contact_id": NumberInt(204),
  "location_id": NumberInt(10513),
  "contact_type": NumberInt(3),
  "first_name": "Wayne",
  "last_name": "Harke",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "5101 - 76th St",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Red Deer",
  "address_province": "Alberta",
  "address_postal": "T4P 2J4",
  "address_country": NumberInt(15),
  "direct_phone": "403.396.2006",
  "mobile_phone": "403.396.2006",
  "fax_number": "403.346.8247",
  "home_phone": "403.396.2006",
  "email": "karonspace@hotmail.com",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd063d5e556015000d30"),
  "contact_id": NumberInt(205),
  "location_id": NumberInt(10514),
  "contact_type": NumberInt(3),
  "first_name": "Mike",
  "last_name": "Rouxel",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 48",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Longview",
  "address_province": "Alberta",
  "address_postal": "T0L 1H0",
  "address_country": NumberInt(15),
  "direct_phone": "403.660.4498",
  "mobile_phone": "403.660.4498",
  "fax_number": "403.558.2055",
  "home_phone": "403.660.4498",
  "email": "cdesign70@korea.com",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd063d5e556015000d33"),
  "contact_id": NumberInt(206),
  "location_id": NumberInt(10515),
  "contact_type": NumberInt(3),
  "first_name": "Wayne",
  "last_name": "Harke",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "153 Leva Avenue",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Red Deer County",
  "address_province": "Alberta",
  "address_postal": "T4E 1B9",
  "address_country": NumberInt(15),
  "direct_phone": "403.396.2006",
  "mobile_phone": "403.396.2006",
  "fax_number": "403.309.6652",
  "home_phone": "403.396.2006",
  "email": "pnelson@telus.net",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd063d5e556015000d36"),
  "contact_id": NumberInt(207),
  "location_id": NumberInt(10516),
  "contact_type": NumberInt(3),
  "first_name": "John",
  "last_name": "Gerlitz",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "General Delivery",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Carstairs",
  "address_province": "Alberta",
  "address_postal": "T0M 0N0",
  "address_country": NumberInt(15),
  "direct_phone": "403.803.8055",
  "mobile_phone": "403.803.8055",
  "fax_number": "403.337.2857",
  "home_phone": "403.803.8055",
  "email": "",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd063d5e556015000d39"),
  "contact_id": NumberInt(208),
  "location_id": NumberInt(10517),
  "contact_type": NumberInt(3),
  "first_name": "Mathew",
  "last_name": "Brayman",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "1111 Ogilvie Road",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Ottawa",
  "address_province": "Ontario",
  "address_postal": "K1J 7P7",
  "address_country": NumberInt(15),
  "direct_phone": "416.797.4303",
  "mobile_phone": "416.797.4303",
  "fax_number": "613-744-7201",
  "home_phone": "416.797.4303",
  "email": "fasgasottawa@rogers.com",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd063d5e556015000d3c"),
  "contact_id": NumberInt(209),
  "location_id": NumberInt(10518),
  "contact_type": NumberInt(3),
  "first_name": "Sean",
  "last_name": "Meindl",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "14935- 108th Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Surrey",
  "address_province": "British Columbia",
  "address_postal": "V3R 1W3",
  "address_country": NumberInt(15),
  "direct_phone": "604.312.5068",
  "mobile_phone": "604.312.5068",
  "fax_number": "778 285 4541",
  "home_phone": "604.312.5068",
  "email": "katodrummond@shaw.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd063d5e556015000d3f"),
  "contact_id": NumberInt(210),
  "location_id": NumberInt(10519),
  "contact_type": NumberInt(3),
  "first_name": "Allan",
  "last_name": "Deacon",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "PO Box 219",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Grandora",
  "address_province": "Saskatchewan",
  "address_postal": "S0K 1V0",
  "address_country": NumberInt(15),
  "direct_phone": "306.221.9714",
  "mobile_phone": "306.221.9714",
  "fax_number": "306.668.4362",
  "home_phone": "306.221.9714",
  "email": "ljtotter@yourlink.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd063d5e556015000d42"),
  "contact_id": NumberInt(211),
  "location_id": NumberInt(10520),
  "contact_type": NumberInt(3),
  "first_name": "Ryan",
  "last_name": "Lillies",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "1903 - 105th St",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Edmonton",
  "address_province": "Alberta",
  "address_postal": "T6J 5V9",
  "address_country": NumberInt(15),
  "direct_phone": "780.719.6941",
  "mobile_phone": "780.719.6941",
  "fax_number": "780.413.6378",
  "home_phone": "780.719.6941",
  "email": "wtaimuri@shaw.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd063d5e556015000d45"),
  "contact_id": NumberInt(212),
  "location_id": NumberInt(10521),
  "contact_type": NumberInt(3),
  "first_name": "Allan",
  "last_name": "Deacon",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "1604 Idylwyld Dr North",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Saskatoon",
  "address_province": "Saskatchewan",
  "address_postal": "S7L 1B1",
  "address_country": NumberInt(15),
  "direct_phone": "306.221.9714",
  "mobile_phone": "306.221.9714",
  "fax_number": "306-664-3637",
  "home_phone": "306.221.9714",
  "email": "israr999@gmail.com",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd063d5e556015000d48"),
  "contact_id": NumberInt(213),
  "location_id": NumberInt(10522),
  "contact_type": NumberInt(3),
  "first_name": "Perry",
  "last_name": "Kutz",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "102- 4402 - 52nd Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Lloydminster",
  "address_province": "Alberta",
  "address_postal": "T9V 0Y9",
  "address_country": NumberInt(15),
  "direct_phone": "306.384.4626",
  "mobile_phone": "306.384.4626",
  "fax_number": "780.875.3095",
  "home_phone": "306.384.4626",
  "email": "fasgas0556@gmail.com",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd063d5e556015000d4b"),
  "contact_id": NumberInt(214),
  "location_id": NumberInt(10523),
  "contact_type": NumberInt(3),
  "first_name": "Sean",
  "last_name": "Meindl",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "6221 King George Highway",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Surrey",
  "address_province": "British Columbia",
  "address_postal": "V3X1G1",
  "address_country": NumberInt(15),
  "direct_phone": "604.312.5068",
  "mobile_phone": "604.312.5068",
  "fax_number": "604.572.6311",
  "home_phone": "604.312.5068",
  "email": "",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd063d5e556015000d4e"),
  "contact_id": NumberInt(215),
  "location_id": NumberInt(10524),
  "contact_type": NumberInt(3),
  "first_name": "Kevin",
  "last_name": "Fitzpatrick",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 238",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Esterhazy",
  "address_province": "Saskatchewan",
  "address_postal": "SOA OXO",
  "address_country": NumberInt(15),
  "direct_phone": "204.799.8820",
  "mobile_phone": "204.799.8820",
  "fax_number": "306-745-3377",
  "home_phone": "204.799.8820",
  "email": "lhelmeczi@sasktel.net",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd063d5e556015000d51"),
  "contact_id": NumberInt(216),
  "location_id": NumberInt(10525),
  "contact_type": NumberInt(3),
  "first_name": "Richard",
  "last_name": "Lavoie",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "475 Main Street West",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Hamilton",
  "address_province": "Ontario",
  "address_postal": "L8P 1K8",
  "address_country": NumberInt(15),
  "direct_phone": "519.636.8261",
  "mobile_phone": "519.636.8261",
  "fax_number": "905-527-9269",
  "home_phone": "519.636.8261",
  "email": "nkara@bell.net",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd063d5e556015000d54"),
  "contact_id": NumberInt(217),
  "location_id": NumberInt(10526),
  "contact_type": NumberInt(3),
  "first_name": "Ryan",
  "last_name": "Lillies",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "106 Market Street",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Hinton",
  "address_province": "Alberta",
  "address_postal": "T7V 2A2",
  "address_country": NumberInt(15),
  "direct_phone": "780.719.6941",
  "mobile_phone": "780.719.6941",
  "fax_number": "780.865.4096",
  "home_phone": "780.719.6941",
  "email": "robertryu@gmail.com",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd063d5e556015000d57"),
  "contact_id": NumberInt(218),
  "location_id": NumberInt(10527),
  "contact_type": NumberInt(3),
  "first_name": "Mike",
  "last_name": "Meehan",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "3727 Highway 97",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Lac La Hache",
  "address_province": "British Columbia",
  "address_postal": "V0K 1T1",
  "address_country": NumberInt(15),
  "direct_phone": "250.565.4626",
  "mobile_phone": "250.565.4626",
  "fax_number": "250.396.4634",
  "home_phone": "250.565.4626",
  "email": "clancys@live.com",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd063d5e556015000d5a"),
  "contact_id": NumberInt(219),
  "location_id": NumberInt(10528),
  "contact_type": NumberInt(3),
  "first_name": "Sean",
  "last_name": "Meindl",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "5488 Patricia Bay Highway",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Saanich",
  "address_province": "British Columbia",
  "address_postal": "V8Y 1T1",
  "address_country": NumberInt(15),
  "direct_phone": "604.312.5068",
  "mobile_phone": "604.312.5068",
  "fax_number": "250.658.8245",
  "home_phone": "604.312.5068",
  "email": "charliecunningham@shaw.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd063d5e556015000d5d"),
  "contact_id": NumberInt(220),
  "location_id": NumberInt(10529),
  "contact_type": NumberInt(3),
  "first_name": "John",
  "last_name": "Gerlitz",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "PO Box 370",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Cluny",
  "address_province": "Alberta",
  "address_postal": "T0J0S0",
  "address_country": NumberInt(15),
  "direct_phone": "403.803.8055",
  "mobile_phone": "403.803.8055",
  "fax_number": "403.934.3884",
  "home_phone": "403.803.8055",
  "email": "munseongkim@yahoo.co.kr",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd063d5e556015000d60"),
  "contact_id": NumberInt(221),
  "location_id": NumberInt(10530),
  "contact_type": NumberInt(3),
  "first_name": "Mathew",
  "last_name": "Brayman",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "258 Park Road South",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Oshawa",
  "address_province": "Ontario",
  "address_postal": "L1J 4L9",
  "address_country": NumberInt(15),
  "direct_phone": "416.797.4303",
  "mobile_phone": "416.797.4303",
  "fax_number": "905.434.8129",
  "home_phone": "416.797.4303",
  "email": "raaga.sst@gmail.com",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd063d5e556015000d61"),
  "contact_id": NumberInt(222),
  "location_id": NumberInt(10002),
  "contact_type": NumberInt(3),
  "first_name": "Mathew",
  "last_name": "Brayman",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "258 Park Road South",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Oshawa",
  "address_province": "Ontario",
  "address_postal": "L1J 4L9",
  "address_country": NumberInt(15),
  "direct_phone": "416.797.4303",
  "mobile_phone": "416.797.4303",
  "fax_number": "905.434.8129",
  "home_phone": "416.797.4303",
  "email": "raaga.sst@gmail.com",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd063d5e556015000d63"),
  "contact_id": NumberInt(222),
  "location_id": NumberInt(10531),
  "contact_type": NumberInt(3),
  "first_name": "Sean",
  "last_name": "Meindl",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "PO Box 45,",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Westholme",
  "address_province": "British Columbia",
  "address_postal": "V0R 3C0",
  "address_country": NumberInt(15),
  "direct_phone": "604.312.5068",
  "mobile_phone": "604.312.5068",
  "fax_number": "250 246 4739",
  "home_phone": "604.312.5068",
  "email": "rogerkim@shaw.ca",
  "user_id": NumberInt(0)
});
db.getCollection("tb_contact").insert({
  "_id": ObjectId("510cbd063d5e556015000d66"),
  "contact_id": NumberInt(223),
  "location_id": NumberInt(10532),
  "contact_type": NumberInt(3),
  "first_name": "Karl",
  "last_name": "Morrey",
  "middle_name": "",
  "birth_date": ISODate("1969-12-31T17:00:00.0Z"),
  "address_type": NumberInt(1),
  "address_unit": "",
  "address_line_1": "Box 7004",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Fernie",
  "address_province": "British Columbia",
  "address_postal": "V0B 1M0",
  "address_country": NumberInt(15),
  "direct_phone": "403.813.6646",
  "mobile_phone": "403.813.6646",
  "fax_number": "250-423-3519",
  "home_phone": "403.813.6646",
  "email": "stn41034@parkland.ca",
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
  "country_key": "US",
  "country_order": NumberInt(0),
  "country_status": NumberInt(0)
});
db.getCollection("tb_country").insert({
  "_id": ObjectId("50a30ad93d5e55040200004b"),
  "country_id": NumberInt(75),
  "country_key": "VN",
  "country_name": "Viet Nam",
  "country_order": NumberInt(704),
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
  "address_province": "Saskatchewan",
  "address_unit": "",
  "close_date": null,
  "company_id": NumberInt(10004),
  "location_banner": "",
  "location_fax": "",
  "location_id": NumberInt(10006),
  "location_name": "Saskatoon",
  "location_number": NumberInt(3),
  "location_phone": "403.555.5555",
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
  "address_city": "Brandon",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "address_line_1": "1451 Richmond Avenue East",
  "address_line_2": "",
  "address_line_3": "",
  "address_postal": "R7A 7A3",
  "address_province": "Manitoba",
  "address_unit": "Unit 2",
  "close_date": null,
  "company_id": NumberInt(10004),
  "location_banner": "",
  "location_fax": "",
  "location_id": NumberInt(10010),
  "location_name": "Brandon",
  "location_number": NumberInt(7),
  "location_phone": "403.555.5555",
  "location_region": "MB",
  "location_type": NumberInt(3),
  "open_date": null,
  "status": NumberInt(0)
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
  "location_fax": "",
  "location_id": NumberInt(10012),
  "location_name": "Winipeg",
  "location_number": NumberInt(13),
  "location_phone": "403.555.5555",
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
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000b04"),
  "location_id": NumberInt(10329),
  "location_name": "Fas Gas Crossroads Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40003),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "4576 - 50th Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Lacombe",
  "address_province": "Alberta",
  "address_postal": "T4L 2B6",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000b07"),
  "location_id": NumberInt(10330),
  "location_name": "Fas Gas Ross Street",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40004),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "4023 Ross St",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Red Deer",
  "address_province": "Alberta",
  "address_postal": "T4N 1W5",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000b1c"),
  "location_id": NumberInt(10337),
  "location_name": "Fas Gas Mountview Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40011),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "4902 - 54th Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Olds",
  "address_province": "Alberta",
  "address_postal": "T4H 1H5",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000b25"),
  "location_id": NumberInt(10340),
  "location_name": "Fas Gas Hilltop Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40015),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 365",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Whitecourt",
  "address_province": "Alberta",
  "address_postal": "T7S 1N5",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000b3d"),
  "location_id": NumberInt(10348),
  "location_name": "Fas Gas Rockyview Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40024),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 508",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Cochrane",
  "address_province": "Alberta",
  "address_postal": "T0L 0W0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd063d5e556015000d20"),
  "location_id": NumberInt(10509),
  "location_name": "Fraserview Fas Gas Plus",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50459),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "10732 - 128th St",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Surrey",
  "address_province": "British Columbia",
  "address_postal": "V3T 3A2",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd063d5e556015000d35"),
  "location_id": NumberInt(10516),
  "location_name": "2A Gas",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50496),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "General Delivery",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Carstairs",
  "address_province": "Alberta",
  "address_postal": "T0M 0N0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd063d5e556015000d38"),
  "location_id": NumberInt(10517),
  "location_name": "Fas Gas & Crystal Wash",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50518),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "1111 Ogilvie Road",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Ottawa",
  "address_province": "Ontario",
  "address_postal": "K1J 7P7",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd063d5e556015000d3e"),
  "location_id": NumberInt(10519),
  "location_name": "Sandyridge Fas Gas Plus",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50533),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "PO Box 219",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Grandora",
  "address_province": "Saskatchewan",
  "address_postal": "S0K 1V0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd063d5e556015000d41"),
  "location_id": NumberInt(10520),
  "location_name": "Family Mart",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50540),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "1903 - 105th St",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Edmonton",
  "address_province": "Alberta",
  "address_postal": "T6J 5V9",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd063d5e556015000d44"),
  "location_id": NumberInt(10521),
  "location_name": "Idylwyld Fas Gas Plus",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50546),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "1604 Idylwyld Dr North",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Saskatoon",
  "address_province": "Saskatchewan",
  "address_postal": "S7L 1B1",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd063d5e556015000d4d"),
  "location_id": NumberInt(10524),
  "location_name": "Corner West Convenience Ltd.",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50582),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 238",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Esterhazy",
  "address_province": "Saskatchewan",
  "address_postal": "SOA OXO",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd063d5e556015000d53"),
  "location_id": NumberInt(10526),
  "location_name": "Hinton Gas and Car Wash",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50585),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "106 Market Street",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Hinton",
  "address_province": "Alberta",
  "address_postal": "T7V 2A2",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd063d5e556015000d56"),
  "location_id": NumberInt(10527),
  "location_name": "Clancys Holdings Ltd",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50587),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "3727 Highway 97",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Lac La Hache",
  "address_province": "British Columbia",
  "address_postal": "V0K 1T1",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd063d5e556015000d5c"),
  "location_id": NumberInt(10529),
  "location_name": "Cluny Fas Gas",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50591),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "PO Box 370",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Cluny",
  "address_province": "Alberta",
  "address_postal": "T0J0S0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd063d5e556015000d5f"),
  "location_id": NumberInt(10530),
  "location_name": "Raaga Fas Gas",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50603),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "258 Park Road South",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Oshawa",
  "address_province": "Ontario",
  "address_postal": "L1J 4L9",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd063d5e556015000d65"),
  "location_id": NumberInt(10532),
  "location_name": "Fas Gas Fernie Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(41034),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 7004",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Fernie",
  "address_province": "British Columbia",
  "address_postal": "V0B 1M0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070026b4"),
  "location_id": NumberInt(10023),
  "location_name": "Mac's Store # 11020",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "BC",
  "location_banner": "",
  "location_number": NumberInt(11020),
  "location_phone": "(604) 588-8849",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "9194 SCOTT ROAD",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "SURREY",
  "address_province": "British Columbia",
  "address_postal": "V3V 4B5",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1999-12-26T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070026b6"),
  "location_id": NumberInt(10024),
  "location_name": "Mac's Store # 11040",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "BC",
  "location_banner": "",
  "location_number": NumberInt(11040),
  "location_phone": "(250) 382-0912",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "265 MENZIES STREET",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "VICTORIA",
  "address_province": "British Columbia",
  "address_postal": "V8Y 2G6",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1996-08-11T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070026b8"),
  "location_id": NumberInt(10025),
  "location_name": "Mac's Store # 11070",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "BC",
  "location_banner": "",
  "location_number": NumberInt(11070),
  "location_phone": "(604) 687-0872",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "1695 DAVIE STREET",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "VANCOUVER",
  "address_province": "British Columbia",
  "address_postal": "V6G 1X8",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2004-04-22T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070026ba"),
  "location_id": NumberInt(10026),
  "location_name": "Mac's Store # 11084",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "BC",
  "location_banner": "",
  "location_number": NumberInt(11084),
  "location_phone": "(604) 826-6936",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "33093 7TH. AVENUE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "MISSION",
  "address_province": "British Columbia",
  "address_postal": "V2V 2C9",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1999-10-04T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070026bc"),
  "location_id": NumberInt(10027),
  "location_name": "Mac's Store # 11089",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "BC",
  "location_banner": "",
  "location_number": NumberInt(11089),
  "location_phone": "(250) 923-4141",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "314 ROCKLAND ROAD",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CAMPBELL RIVER",
  "address_province": "British Columbia",
  "address_postal": "V9W 1N8",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1997-10-26T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070026be"),
  "location_id": NumberInt(10028),
  "location_name": "Mac's Store # 11094",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "BC",
  "location_banner": "",
  "location_number": NumberInt(11094),
  "location_phone": "(604) 585-7334",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "13192 - 104TH AVE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "SURREY",
  "address_province": "British Columbia",
  "address_postal": "V3T 1T7",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1997-09-30T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070026c0"),
  "location_id": NumberInt(10029),
  "location_name": "Mac's Store # 11095",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "BC",
  "location_banner": "",
  "location_number": NumberInt(11095),
  "location_phone": "(604) 536-6622",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "1751 KING GEORGE HIGHWAY",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "SURREY",
  "address_province": "British Columbia",
  "address_postal": "V4A 4Z9",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1997-03-25T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070026c2"),
  "location_id": NumberInt(10030),
  "location_name": "Mac's Store # 11096",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "BC",
  "location_banner": "",
  "location_number": NumberInt(11096),
  "location_phone": "(604) 584-2440",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "14820 - 108TH. AVENUE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "SURREY",
  "address_province": "British Columbia",
  "address_postal": "V3R 1W1",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1998-03-16T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070026c4"),
  "location_id": NumberInt(10031),
  "location_name": "Mac's Store # 11104",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "BC",
  "location_banner": "",
  "location_number": NumberInt(11104),
  "location_phone": "(604) 736-9528",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "4464 DUNBAR STREET",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "VANCOUVER",
  "address_province": "British Columbia",
  "address_postal": "V6S 2G5",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1997-02-16T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070026c6"),
  "location_id": NumberInt(10032),
  "location_name": "Mac's Store # 11108",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "BC",
  "location_banner": "",
  "location_number": NumberInt(11108),
  "location_phone": "(250) 381-8631",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "324 COOK STREET",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "VICTORIA",
  "address_province": "British Columbia",
  "address_postal": "V8V 3X7",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1996-06-09T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070026c8"),
  "location_id": NumberInt(10033),
  "location_name": "Mac's Store # 11109",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "BC",
  "location_banner": "",
  "location_number": NumberInt(11109),
  "location_phone": "(604) 531-5226",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "13983 - 16TH AVENUE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "SURREY",
  "address_province": "British Columbia",
  "address_postal": "V4A 1P8",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1997-05-22T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070026ca"),
  "location_id": NumberInt(10034),
  "location_name": "Mac's Store # 11112",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "BC",
  "location_banner": "",
  "location_number": NumberInt(11112),
  "location_phone": "(604) 731-5614",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "1997 CORNWALL AVENUE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "VANCOUVER",
  "address_province": "British Columbia",
  "address_postal": "V6J 1C9",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1997-04-29T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070026cc"),
  "location_id": NumberInt(10035),
  "location_name": "Mac's Store # 11117",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "BC",
  "location_banner": "",
  "location_number": NumberInt(11117),
  "location_phone": "(250) 763-8666",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "2147 RICHTER STREET",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "KELOWNA",
  "address_province": "British Columbia",
  "address_postal": "V1Y 2N7",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2001-09-20T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070026ce"),
  "location_id": NumberInt(10036),
  "location_name": "Mac's Store # 11133",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "BC",
  "location_banner": "",
  "location_number": NumberInt(11133),
  "location_phone": "(604) 669-3874",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "1198 DAVIE STREET",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "VANCOUVER",
  "address_province": "British Columbia",
  "address_postal": "V6E 1N1",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2001-07-08T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070026d0"),
  "location_id": NumberInt(10037),
  "location_name": "Mac's Store # 11139",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "BC",
  "location_banner": "",
  "location_number": NumberInt(11139),
  "location_phone": "(604) 299-1625",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "5639 HASTINGS STREET",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "BURNABY",
  "address_province": "British Columbia",
  "address_postal": "V5B 1R5",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2001-07-12T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070026d2"),
  "location_id": NumberInt(10038),
  "location_name": "Mac's Store # 11144",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "BC",
  "location_banner": "",
  "location_number": NumberInt(11144),
  "location_phone": "(250) 474-4980",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "3198 JACKLIN ROAD",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "VICTORIA",
  "address_province": "British Columbia",
  "address_postal": "V9C 3H5",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1996-10-13T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070026d4"),
  "location_id": NumberInt(10039),
  "location_name": "Mac's Store # 11146",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "BC",
  "location_banner": "",
  "location_number": NumberInt(11146),
  "location_phone": "(250) 763-6446",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "5 - 1155 KLO ROAD",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "KELOWNA",
  "address_province": "British Columbia",
  "address_postal": "V1Y 4X6",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2000-04-29T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070026d6"),
  "location_id": NumberInt(10040),
  "location_name": "Mac's Store # 11147",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "BC",
  "location_banner": "",
  "location_number": NumberInt(11147),
  "location_phone": "(604) 736-5115",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "2515 HEMLOCK STREET",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "VANCOUVER",
  "address_province": "British Columbia",
  "address_postal": "V6H 2V2",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1996-12-22T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070026d8"),
  "location_id": NumberInt(10041),
  "location_name": "Mac's Store # 11150",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "BC",
  "location_banner": "PETROCAN",
  "location_number": NumberInt(11150),
  "location_phone": "(250) 758-2425",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "1 - 4286 DEPARTURE BAY RD.",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "NANAIMO",
  "address_province": "British Columbia",
  "address_postal": "V9T 5K7",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1998-02-24T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070026da"),
  "location_id": NumberInt(10042),
  "location_name": "Mac's Store # 11156",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "BC",
  "location_banner": "",
  "location_number": NumberInt(11156),
  "location_phone": "(604) 588-2663",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "169 10020 - 152ND STREET",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "SURREY",
  "address_province": "British Columbia",
  "address_postal": "V3R 8X8",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1997-10-26T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070026dc"),
  "location_id": NumberInt(10043),
  "location_name": "Mac's Store # 11157",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "BC",
  "location_banner": "PETROCAN",
  "location_number": NumberInt(11157),
  "location_phone": "(250) 494-0900",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "14405 ROSEDALE AVENUE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "SUMMERLAND",
  "address_province": "British Columbia",
  "address_postal": "V0H 1Z0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1998-10-10T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070026de"),
  "location_id": NumberInt(10044),
  "location_name": "Mac's Store # 11158",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "BC",
  "location_banner": "",
  "location_number": NumberInt(11158),
  "location_phone": "(604) 875-1015",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "601 EAST BROADWAY",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "VANCOUVER",
  "address_province": "British Columbia",
  "address_postal": "V5T 1X7",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2001-07-01T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070026e0"),
  "location_id": NumberInt(10045),
  "location_name": "Mac's Store # 11159",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "BC",
  "location_banner": "",
  "location_number": NumberInt(11159),
  "location_phone": "(604) 590-5336",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "8007 KING GEORGE HIGHWAY",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "SURREY",
  "address_province": "British Columbia",
  "address_postal": "V3W 5B4",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1998-07-23T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070026e2"),
  "location_id": NumberInt(10046),
  "location_name": "Mac's Store # 11160",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "BC",
  "location_banner": "ESSO",
  "location_number": NumberInt(11160),
  "location_phone": "(250) 769-5505",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "2220 BOUCHERIE ROAD",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "KELOWNA",
  "address_province": "British Columbia",
  "address_postal": "V1Z 2E5",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2001-10-18T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070026e4"),
  "location_id": NumberInt(10047),
  "location_name": "Mac's Store # 11162",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "BC",
  "location_banner": "PETROCAN",
  "location_number": NumberInt(11162),
  "location_phone": "(250) 381-5635",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "1520 ADMIRALS ROAD",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "VICTORIA",
  "address_province": "British Columbia",
  "address_postal": "V9A 7B1",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1996-11-17T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070026e6"),
  "location_id": NumberInt(10048),
  "location_name": "Mac's Store # 11166",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "BC",
  "location_banner": "",
  "location_number": NumberInt(11166),
  "location_phone": "(250) 381-1089",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "1515 COOK STREET",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "VICTORIA",
  "address_province": "British Columbia",
  "address_postal": "V8T 5E5",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1996-07-14T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070026e8"),
  "location_id": NumberInt(10049),
  "location_name": "Mac's Store # 11168",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "BC",
  "location_banner": "",
  "location_number": NumberInt(11168),
  "location_phone": "(604) 585-2115",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "15180 - 96 AVENUE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "SURREY",
  "address_province": "British Columbia",
  "address_postal": "V3R 5Y5",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1998-11-19T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070026ea"),
  "location_id": NumberInt(10050),
  "location_name": "Mac's Store # 11170",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "BC",
  "location_banner": "",
  "location_number": NumberInt(11170),
  "location_phone": "(604) 520-0471",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "435 COLUMBIA STREET",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "NEW WESTMINSTER",
  "address_province": "British Columbia",
  "address_postal": "V3L 1A9",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1998-12-17T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070026ec"),
  "location_id": NumberInt(10051),
  "location_name": "Mac's Store # 11175",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "BC",
  "location_banner": "HUSKY",
  "location_number": NumberInt(11175),
  "location_phone": "(604) 888-7302",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "20995 - 88TH AVENUE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "LANGLEY",
  "address_province": "British Columbia",
  "address_postal": "VOX 1J0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1999-05-06T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070026ee"),
  "location_id": NumberInt(10052),
  "location_name": "Mac's Store # 11177",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "BC",
  "location_banner": "",
  "location_number": NumberInt(11177),
  "location_phone": "(250) 381-5675",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "2635 QUADRA STREET",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "VICTORIA",
  "address_province": "British Columbia",
  "address_postal": "V8T 4E3",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1996-09-29T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070026f0"),
  "location_id": NumberInt(10053),
  "location_name": "Mac's Store # 11181",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "BC",
  "location_banner": "MACS",
  "location_number": NumberInt(11181),
  "location_phone": "(604) 460-9300",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "20318 DEWDNEY TRUNK RD",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "MAPLE RIDGE",
  "address_province": "British Columbia",
  "address_postal": "V2X 3E1",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2001-01-07T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070026f2"),
  "location_id": NumberInt(10054),
  "location_name": "Mac's Store # 11183",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "BC",
  "location_banner": "ESSO",
  "location_number": NumberInt(11183),
  "location_phone": "(250) 992-9700",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "285 ANDERSON DRIVE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "QUESNEL",
  "address_province": "British Columbia",
  "address_postal": "V2J 3K4",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2000-02-24T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070026f4"),
  "location_id": NumberInt(10055),
  "location_name": "Mac's Store # 11184",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "BC",
  "location_banner": "ESSO",
  "location_number": NumberInt(11184),
  "location_phone": "(250) 635-6670",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "2988 HIGHWAY 16 EAST",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "TERRACE",
  "address_province": "British Columbia",
  "address_postal": "V8G 3N7",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2000-03-09T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070026f6"),
  "location_id": NumberInt(10056),
  "location_name": "Mac's Store # 11185",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "BC",
  "location_banner": "",
  "location_number": NumberInt(11185),
  "location_phone": "(604) 675-9026",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "2601 COMMERCIAL DRIVE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "VANCOUVER",
  "address_province": "British Columbia",
  "address_postal": "V5N 4C3",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2001-10-04T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070026f8"),
  "location_id": NumberInt(10057),
  "location_name": "Mac's Store # 11187",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "BC",
  "location_banner": "",
  "location_number": NumberInt(11187),
  "location_phone": "(604) 572-3538",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "16013 FRASER HIGHWAY",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "SURREY",
  "address_province": "British Columbia",
  "address_postal": "V3S 2W9",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2000-11-02T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070026fa"),
  "location_id": NumberInt(10058),
  "location_name": "Mac's Store # 11189",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "BC",
  "location_banner": "",
  "location_number": NumberInt(11189),
  "location_phone": "(604) 461-8723",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "265 NEWPORT DRIVE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "PORT MOODY",
  "address_province": "British Columbia",
  "address_postal": "V3H 5C9",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2002-03-19T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070026fc"),
  "location_id": NumberInt(10059),
  "location_name": "Mac's Store # 11190",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "BC",
  "location_banner": "",
  "location_number": NumberInt(11190),
  "location_phone": "(604) 463-7931",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "22645 Dewdney Trunk Road",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "MAPLE RIDGE",
  "address_province": "British Columbia",
  "address_postal": "V2X 3K1",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2003-07-16T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070026fe"),
  "location_id": NumberInt(10060),
  "location_name": "Mac's Store # 11191",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "BC",
  "location_banner": "",
  "location_number": NumberInt(11191),
  "location_phone": "(250) 472-0988",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "3749 SHELBOURNE STREET",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "VICTORIA",
  "address_province": "British Columbia",
  "address_postal": "V8P 5N4",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2002-02-17T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e553807002700"),
  "location_id": NumberInt(10061),
  "location_name": "Mac's Store # 11193",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "BC",
  "location_banner": "ESSO",
  "location_number": NumberInt(11193),
  "location_phone": "(250) 723-2245",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "3955 JOHNSTON ROAD",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "PORT ALBERNI",
  "address_province": "British Columbia",
  "address_postal": "V9Y 5N4",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2003-04-23T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e553807002702"),
  "location_id": NumberInt(10062),
  "location_name": "Mac's Store # 11194",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "BC",
  "location_banner": "ESSO",
  "location_number": NumberInt(11194),
  "location_phone": "(250) 832-7226",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Unit #71, 2801 - 10 Avenue NE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "SALMON ARM",
  "address_province": "British Columbia",
  "address_postal": "V1E 2S3",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2002-12-12T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e553807002704"),
  "location_id": NumberInt(10063),
  "location_name": "Mac's Store # 11195",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "BC",
  "location_banner": "",
  "location_number": NumberInt(11195),
  "location_phone": "(250) 765-2718",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "1007 RUTLAND ROAD NORTH",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "KELOWNA",
  "address_province": "British Columbia",
  "address_postal": "V1X 4Y9",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2004-07-07T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e553807002706"),
  "location_id": NumberInt(10064),
  "location_name": "Mac's Store # 11196",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "BC",
  "location_banner": "",
  "location_number": NumberInt(11196),
  "location_phone": "(604) 984-3333",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Unit 900, 801 Marine Drive",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "NORTH VANCOUVER",
  "address_province": "British Columbia",
  "address_postal": "V7P 3K6",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2002-05-30T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e553807002708"),
  "location_id": NumberInt(10065),
  "location_name": "Mac's Store # 11197",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "BC",
  "location_banner": "",
  "location_number": NumberInt(11197),
  "location_phone": "(604) 241-8135",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "#110, 11000 Williams Road",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "RICHMOND",
  "address_province": "British Columbia",
  "address_postal": "V7A 1J1",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2003-04-29T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e55380700270a"),
  "location_id": NumberInt(10066),
  "location_name": "Mac's Store # 11199",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "BC",
  "location_banner": "",
  "location_number": NumberInt(11199),
  "location_phone": "(250) 658-0425",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Unit 10, 4144 WILKINSON ROAD",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "SAANICH",
  "address_province": "British Columbia",
  "address_postal": "V8Z 5A7",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2002-11-07T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e55380700270c"),
  "location_id": NumberInt(10067),
  "location_name": "Mac's Store # 11201",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "BC",
  "location_banner": "",
  "location_number": NumberInt(11201),
  "location_phone": "(604) 420-3161",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "#110, 3292 PRODUCTION WAY",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "BURNABY",
  "address_province": "British Columbia",
  "address_postal": "V5A 4R4",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2004-04-01T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e55380700270e"),
  "location_id": NumberInt(10068),
  "location_name": "Mac's Store # 11202",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "BC",
  "location_banner": "",
  "location_number": NumberInt(11202),
  "location_phone": "(604) 395-8110",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Unit #110, 485 EAST COLUMBIA  STREET",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "NEW WESTMINSTER",
  "address_province": "British Columbia",
  "address_postal": "V3L 3X5",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2005-07-06T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e553807002710"),
  "location_id": NumberInt(10069),
  "location_name": "Mac's Store # 11203",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "BC",
  "location_banner": "ESSO",
  "location_number": NumberInt(11203),
  "location_phone": "(250) 287-3112",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "190 Dogwood Street",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CAMPBELL RIVER",
  "address_province": "British Columbia",
  "address_postal": "V9W 2X8",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2003-02-02T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e553807002712"),
  "location_id": NumberInt(10070),
  "location_name": "Mac's Store # 11204",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "BC",
  "location_banner": "",
  "location_number": NumberInt(11204),
  "location_phone": "(250) 448-8099",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "106 - 1014 Glenmore Drive",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "KELOWNA",
  "address_province": "British Columbia",
  "address_postal": "V1Y 4P2",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2004-01-22T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e553807002714"),
  "location_id": NumberInt(10071),
  "location_name": "Mac's Store # 11206",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "BC",
  "location_banner": "ESSO",
  "location_number": NumberInt(11206),
  "location_phone": "(604) 703-0189",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "45970 - 1st AVENUE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CHILLIWACK",
  "address_province": "British Columbia",
  "address_postal": "V2P 1W1",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2004-04-29T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e553807002716"),
  "location_id": NumberInt(10072),
  "location_name": "Mac's Store # 11207",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "BC",
  "location_banner": "",
  "location_number": NumberInt(11207),
  "location_phone": "(604) 678-1481",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "#110, 7175 -138 STREET",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "SURREY",
  "address_province": "British Columbia",
  "address_postal": "V3W 2P2",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2003-12-17T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e553807002718"),
  "location_id": NumberInt(10073),
  "location_name": "Mac's Store # 11210",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "BC",
  "location_banner": "",
  "location_number": NumberInt(11210),
  "location_phone": "(604) 514-0610",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "7150 - 200 Street",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "LANGLEY",
  "address_province": "British Columbia",
  "address_postal": "V2Y 3B9",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2005-04-12T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e55380700271a"),
  "location_id": NumberInt(10074),
  "location_name": "Mac's Store # 11213",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "BC",
  "location_banner": "",
  "location_number": NumberInt(11213),
  "location_phone": "(250) 220-7255",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "1300 - 1304 Douglas Street",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "VICTORIA",
  "address_province": "British Columbia",
  "address_postal": "V8W 2E8",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2005-05-17T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e55380700271c"),
  "location_id": NumberInt(10075),
  "location_name": "Mac's Store # 11214",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "BC",
  "location_banner": "",
  "location_number": NumberInt(11214),
  "location_phone": "(604) 295-3870",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "9951 Williams Road",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "RICHMOND",
  "address_province": "British Columbia",
  "address_postal": "V7A 1H3",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2011-02-28T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e55380700271e"),
  "location_id": NumberInt(10076),
  "location_name": "Mac's Store # 11215",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "BC",
  "location_banner": "",
  "location_number": NumberInt(11215),
  "location_phone": "(250) 376-6810",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "205 Tranquille Rd",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "KAMLOOPS",
  "address_province": "British Columbia",
  "address_postal": "V2B 8J8",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2010-12-13T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e553807002720"),
  "location_id": NumberInt(10077),
  "location_name": "Mac's Store # 11216",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "BC",
  "location_banner": "SHELL",
  "location_number": NumberInt(11216),
  "location_phone": "(250) 448-4223",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "110, 2189 Springfield",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "KELOWNA",
  "address_province": "British Columbia",
  "address_postal": "V1Y 7X1",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2011-07-14T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e553807002722"),
  "location_id": NumberInt(10078),
  "location_name": "Mac's Store # 11219",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "BC",
  "location_banner": "SHELL",
  "location_number": NumberInt(11219),
  "location_phone": "(250) 547-6724",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "2087 Vernon Avenue",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Lumby",
  "address_province": "British Columbia",
  "address_postal": "V0E 2G0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2011-06-28T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e553807002724"),
  "location_id": NumberInt(10079),
  "location_name": "Mac's Store # 11220",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "BC",
  "location_banner": "SHELL",
  "location_number": NumberInt(11220),
  "location_phone": "(250) 632-2671",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "1065 Lahakas Blvd N",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Kitimat",
  "address_province": "British Columbia",
  "address_postal": "V8C 1E8",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2011-06-22T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e553807002726"),
  "location_id": NumberInt(10080),
  "location_name": "Mac's Store # 33330",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "MAN",
  "location_banner": "",
  "location_number": NumberInt(33330),
  "location_phone": "(204) 284-7617",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "48 OSBORNE STREET",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "WINNIPEG",
  "address_province": "Manitoba",
  "address_postal": "R3L 1Y3",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1998-10-08T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e553807002728"),
  "location_id": NumberInt(10081),
  "location_name": "Mac's Store # 33333",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "MAN",
  "location_banner": "",
  "location_number": NumberInt(33333),
  "location_phone": "(204) 668-8005",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "415 SPRINGFIELD ROAD",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "WINNIPEG",
  "address_province": "Manitoba",
  "address_postal": "R2G 0R9",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2003-03-30T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e55380700272a"),
  "location_id": NumberInt(10082),
  "location_name": "Mac's Store # 33334",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "MAN",
  "location_banner": "",
  "location_number": NumberInt(33334),
  "location_phone": "(204) 832-0322",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "829 CAVALIER DRIVE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "WINNIPEG",
  "address_province": "Manitoba",
  "address_postal": "R2Y 1C6",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2006-07-11T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e55380700272c"),
  "location_id": NumberInt(10083),
  "location_name": "Mac's Store # 33345",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "MAN",
  "location_banner": "",
  "location_number": NumberInt(33345),
  "location_phone": "(204) 339-2263",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "1021 MCGREGOR STREET",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "WINNIPEG",
  "address_province": "Manitoba",
  "address_postal": "R2V 3H4",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2003-04-24T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e55380700272e"),
  "location_id": NumberInt(10084),
  "location_name": "Mac's Store # 33364",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "MAN",
  "location_banner": "",
  "location_number": NumberInt(33364),
  "location_phone": "(204) 669-5119",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "529 LONDON STREET",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "WINNIPEG",
  "address_province": "Manitoba",
  "address_postal": "R2K 2Z4",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2000-03-23T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e553807002730"),
  "location_id": NumberInt(10085),
  "location_name": "Mac's Store # 33367",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "MAN",
  "location_banner": "",
  "location_number": NumberInt(33367),
  "location_phone": "(204) 943-7562",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "407 CARLTON STREET",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "WINNIPEG",
  "address_province": "Manitoba",
  "address_postal": "R3B 2K9",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2002-09-01T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e553807002732"),
  "location_id": NumberInt(10086),
  "location_name": "Mac's Store # 33369",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "MAN",
  "location_banner": "",
  "location_number": NumberInt(33369),
  "location_phone": "(204) 837-9584",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "2359 NESS AVE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "WINNIPEG",
  "address_province": "Manitoba",
  "address_postal": "R3J 1A5",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1999-10-14T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e553807002734"),
  "location_id": NumberInt(10087),
  "location_name": "Mac's Store # 33370",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "MAN",
  "location_banner": "",
  "location_number": NumberInt(33370),
  "location_phone": "(204) 256-4529",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "2 BRITANNICA ROAD",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "WINNIPEG",
  "address_province": "Manitoba",
  "address_postal": "R2N 1J4",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2003-03-09T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e553807002736"),
  "location_id": NumberInt(10088),
  "location_name": "Mac's Store # 33372",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "MAN",
  "location_banner": "",
  "location_number": NumberInt(33372),
  "location_phone": "(204) 489-9025",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "1670 CORYDON AVE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "WINNIPEG",
  "address_province": "Manitoba",
  "address_postal": "R3N 0J7",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2000-02-24T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e553807002738"),
  "location_id": NumberInt(10089),
  "location_name": "Mac's Store # 33373",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "MAN",
  "location_banner": "",
  "location_number": NumberInt(33373),
  "location_phone": "(204) 261-6140",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "1, 2077 PEMBINA HWY",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "WINNIPEG",
  "address_province": "Manitoba",
  "address_postal": "R3T 5J9",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1999-03-04T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e55380700273a"),
  "location_id": NumberInt(10090),
  "location_name": "Mac's Store # 33376",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "MAN",
  "location_banner": "",
  "location_number": NumberInt(33376),
  "location_phone": "(204) 257-5710",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "1035 AUTUMNWOOD DRIVE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "WINNIPEG",
  "address_province": "Manitoba",
  "address_postal": "R2J 1C6",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2003-03-09T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e55380700273c"),
  "location_id": NumberInt(10091),
  "location_name": "Mac's Store # 33377",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "MAN",
  "location_banner": "",
  "location_number": NumberInt(33377),
  "location_phone": "(204) 582-7355",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "810 SELKIRK AVE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "WINNIPEG",
  "address_province": "Manitoba",
  "address_postal": "R2X 0B7",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2004-04-10T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e55380700273e"),
  "location_id": NumberInt(10092),
  "location_name": "Mac's Store # 33378",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "MAN",
  "location_banner": "ESSO",
  "location_number": NumberInt(33378),
  "location_phone": "(204) 239-6404",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "327 SASKATCHEWAN AVE E.",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "PORTAGE LA PRAIRIE",
  "address_province": "Manitoba",
  "address_postal": "R1N 0L6",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2002-12-22T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e553807002740"),
  "location_id": NumberInt(10093),
  "location_name": "Mac's Store # 33380",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "MAN",
  "location_banner": "ESSO",
  "location_number": NumberInt(33380),
  "location_phone": "(204) 338-0173",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "2544 MAIN STREET",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "WINNIPEG",
  "address_province": "Manitoba",
  "address_postal": "R2V 4E2",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2002-09-22T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e553807002742"),
  "location_id": NumberInt(10094),
  "location_name": "Mac's Store # 33381",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "MAN",
  "location_banner": "",
  "location_number": NumberInt(33381),
  "location_phone": "(204) 255-5985",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "680 ST. ANNES RD",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "WINNIPEG",
  "address_province": "Manitoba",
  "address_postal": "R2N 3M6",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2005-11-03T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e553807002744"),
  "location_id": NumberInt(10095),
  "location_name": "Mac's Store # 33382",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "MAN",
  "location_banner": "",
  "location_number": NumberInt(33382),
  "location_phone": "(204) 785-8846",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "187 - 193 MAIN STREET",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "SELKIRK",
  "address_province": "Manitoba",
  "address_postal": "R1A 1R7",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2003-10-09T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e553807002746"),
  "location_id": NumberInt(10096),
  "location_name": "Mac's Store # 33385",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "MAN",
  "location_banner": "",
  "location_number": NumberInt(33385),
  "location_phone": "(204) 727-0162",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "855 - 1 STREET",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "BRANDON",
  "address_province": "Manitoba",
  "address_postal": "R7A 2X8",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2002-07-07T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e553807002748"),
  "location_id": NumberInt(10097),
  "location_name": "Mac's Store # 33388",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "MAN",
  "location_banner": "",
  "location_number": NumberInt(33388),
  "location_phone": "(204) 269-0629",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "3311 PEMBINA HIGHWAY",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "WINNIPEG",
  "address_province": "Manitoba",
  "address_postal": "R3V 1T7",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2002-04-28T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e55380700274a"),
  "location_id": NumberInt(10098),
  "location_name": "Mac's Store # 33389",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "MAN",
  "location_banner": "",
  "location_number": NumberInt(33389),
  "location_phone": "(204) 224-9112",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "1165 KILDARE AVE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "WINNIPEG",
  "address_province": "Manitoba",
  "address_postal": "R2C 5C1",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2000-02-13T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e55380700274c"),
  "location_id": NumberInt(10099),
  "location_name": "Mac's Store # 33392",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "MAN",
  "location_banner": "ESSO",
  "location_number": NumberInt(33392),
  "location_phone": "(204) 669-9675",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "737 GATEWAY ROAD",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "WINNIPEG",
  "address_province": "Manitoba",
  "address_postal": "R2K 2Y4",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2005-02-17T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e55380700274e"),
  "location_id": NumberInt(10100),
  "location_name": "Mac's Store # 33397",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "MAN",
  "location_banner": "",
  "location_number": NumberInt(33397),
  "location_phone": "(204) 254-0599",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "100 - 50 LAKEWOOD BLVD",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "WINNIPEG",
  "address_province": "Manitoba",
  "address_postal": "R2J 2M7",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2006-06-22T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e553807002750"),
  "location_id": NumberInt(10101),
  "location_name": "Mac's Store # 33399",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "MAN",
  "location_banner": "COOP",
  "location_number": NumberInt(33399),
  "location_phone": "(204) 642-4430",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "83 CENTER STREET",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "GIMLI",
  "address_province": "Manitoba",
  "address_postal": "R0C 1B0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1999-08-15T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e553807002752"),
  "location_id": NumberInt(10102),
  "location_name": "Mac's Store # 33400",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "MAN",
  "location_banner": "Shell",
  "location_number": NumberInt(33400),
  "location_phone": "(204) 677-8084",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "745 Thompson Drive",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "THOMPSON",
  "address_province": "Manitoba",
  "address_postal": "R8N 0C7",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2011-06-14T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e553807002754"),
  "location_id": NumberInt(10103),
  "location_name": "Mac's Store # 22503",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "",
  "location_number": NumberInt(22503),
  "location_phone": "(780) 476-4955",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "13120 66 STREET",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "EDMONTON",
  "address_province": "Alberta",
  "address_postal": "T5C 0A9",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2000-11-12T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e553807002756"),
  "location_id": NumberInt(10104),
  "location_name": "Mac's Store # 22505",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "",
  "location_number": NumberInt(22505),
  "location_phone": "(780) 426-0030",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "11310 JASPER AVENUE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "EDMONTON",
  "address_province": "Alberta",
  "address_postal": "T5K 0L8",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1996-12-15T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e553807002758"),
  "location_id": NumberInt(10105),
  "location_name": "Mac's Store # 22509",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "",
  "location_number": NumberInt(22509),
  "location_phone": "(780) 426-5411",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "10406 - 107 AVE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "EDMONTON",
  "address_province": "Alberta",
  "address_postal": "T5H 0W1",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1998-07-09T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e55380700275a"),
  "location_id": NumberInt(10106),
  "location_name": "Mac's Store # 22511",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "",
  "location_number": NumberInt(22511),
  "location_phone": "780-475-5257",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "8310 - 144 AVE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "EDMONTON",
  "address_province": "Alberta",
  "address_postal": "T5E 2H4",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2001-01-07T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e55380700275c"),
  "location_id": NumberInt(10107),
  "location_name": "Mac's Store # 22512",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "",
  "location_number": NumberInt(22512),
  "location_phone": "(780) 434-3223",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "3923 - 106 STREET",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "EDMONTON",
  "address_province": "Alberta",
  "address_postal": "T6J 2S3",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1997-08-10T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e55380700275e"),
  "location_id": NumberInt(10108),
  "location_name": "Mac's Store # 22523",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "",
  "location_number": NumberInt(22523),
  "location_phone": "(780) 489-3070",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "9554 - 163 STREET",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "EDMONTON",
  "address_province": "Alberta",
  "address_postal": "T5P 3M7",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2000-06-25T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e553807002760"),
  "location_id": NumberInt(10109),
  "location_name": "Mac's Store # 22525",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "",
  "location_number": NumberInt(22525),
  "location_phone": "(780) 479-3445",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "11822 - 103 STREET",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "EDMONTON",
  "address_province": "Alberta",
  "address_postal": "T5G 2J3",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1997-06-15T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e553807002762"),
  "location_id": NumberInt(10110),
  "location_name": "Mac's Store # 22530",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "",
  "location_number": NumberInt(22530),
  "location_phone": "(780) 487-6944",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "18208 - 89 AVE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "EDMONTON",
  "address_province": "Alberta",
  "address_postal": "T5T 2K6",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2000-02-13T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e553807002764"),
  "location_id": NumberInt(10111),
  "location_name": "Mac's Store # 22531",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "",
  "location_number": NumberInt(22531),
  "location_phone": "(780) 477-8164",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "11849 - 34 STREET",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "EDMONTON",
  "address_province": "Alberta",
  "address_postal": "T5W 4Y2",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2001-01-28T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e553807002766"),
  "location_id": NumberInt(10112),
  "location_name": "Mac's Store # 22544",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "",
  "location_number": NumberInt(22544),
  "location_phone": "(780) 463-4098",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "3208 - 82ND STREET",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "EDMONTON",
  "address_province": "Alberta",
  "address_postal": "T6K 3Y3",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1997-09-23T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e553807002768"),
  "location_id": NumberInt(10113),
  "location_name": "Mac's Store # 22545",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "",
  "location_number": NumberInt(22545),
  "location_phone": "(780) 962-0202",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "98 MACLEOD AVENUE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "SPRUCE GROVE",
  "address_province": "Alberta",
  "address_postal": "T7X 1R2",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1998-09-01T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e55380700276a"),
  "location_id": NumberInt(10114),
  "location_name": "Mac's Store # 22551",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "",
  "location_number": NumberInt(22551),
  "location_phone": "(780) 462-8347",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "4412 - 36TH AVENUE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "EDMONTON",
  "address_province": "Alberta",
  "address_postal": "T6L 3S1",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1997-09-23T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e55380700276c"),
  "location_id": NumberInt(10115),
  "location_name": "Mac's Store # 22560",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "",
  "location_number": NumberInt(22560),
  "location_phone": "(780) 473-1468",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "600 HERMITAGE ROAD",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "EDMONTON",
  "address_province": "Alberta",
  "address_postal": "T5A 4N2",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1999-02-04T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e55380700276e"),
  "location_id": NumberInt(10116),
  "location_name": "Mac's Store # 22563",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "",
  "location_number": NumberInt(22563),
  "location_phone": "(780) 467-4649",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "101 GRANADA BLVD.",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "SHERWOOD PARK",
  "address_province": "Alberta",
  "address_postal": "T8A 4W2",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1998-05-21T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e553807002770"),
  "location_id": NumberInt(10117),
  "location_name": "Mac's Store # 22565",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "PETROCAN",
  "location_number": NumberInt(22565),
  "location_phone": "(780) 481-9528",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "150, 6655 - 178 STREET",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "EDMONTON",
  "address_province": "Alberta",
  "address_postal": "T5T 4J5",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1998-03-15T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e553807002772"),
  "location_id": NumberInt(10118),
  "location_name": "Mac's Store # 22566",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "ESSO",
  "location_number": NumberInt(22566),
  "location_phone": "(780) 987-3388",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "73 SUPERIOR STREET",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "DEVON",
  "address_province": "Alberta",
  "address_postal": "T9G 1K9",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1998-11-18T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e553807002774"),
  "location_id": NumberInt(10119),
  "location_name": "Mac's Store # 22567",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "HUSKY",
  "location_number": NumberInt(22567),
  "location_phone": "(780) 474-0978",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "8118 - 120TH AVENUE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "EDMONTON",
  "address_province": "Alberta",
  "address_postal": "T5B 4T5",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1997-11-06T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e553807002776"),
  "location_id": NumberInt(10120),
  "location_name": "Mac's Store # 22568",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "",
  "location_number": NumberInt(22568),
  "location_phone": "(780) 433-2389",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "11638 87TH AVENUE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "EDMONTON",
  "address_province": "Alberta",
  "address_postal": "T6G 0Y2",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1999-06-03T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e553807002778"),
  "location_id": NumberInt(10121),
  "location_name": "Mac's Store # 22569",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "",
  "location_number": NumberInt(22569),
  "location_phone": "(780) 352-6106",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "4702 - 50TH AVENUE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "WETASKIWIN",
  "address_province": "Alberta",
  "address_postal": "T9A 0R7",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2001-05-03T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e55380700277a"),
  "location_id": NumberInt(10122),
  "location_name": "Mac's Store # 22573",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "",
  "location_number": NumberInt(22573),
  "location_phone": "(780) 487-5652",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "8226 - 175TH STREET",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "EDMONTON",
  "address_province": "Alberta",
  "address_postal": "T5T 1V1",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1998-07-09T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e55380700277c"),
  "location_id": NumberInt(10123),
  "location_name": "Mac's Store # 22574",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "",
  "location_number": NumberInt(22574),
  "location_phone": "(780) 488-1578",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "11615 - 104TH AVENUE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "EDMONTON",
  "address_province": "Alberta",
  "address_postal": "T5K 2R1",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1998-05-19T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e55380700277e"),
  "location_id": NumberInt(10124),
  "location_name": "Mac's Store # 22577",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "",
  "location_number": NumberInt(22577),
  "location_phone": "(780) 439-5453",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "10666 - 82ND AVENUE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "EDMONTON",
  "address_province": "Alberta",
  "address_postal": "T6E 2A7",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1997-08-24T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e553807002780"),
  "location_id": NumberInt(10125),
  "location_name": "Mac's Store # 22579",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "ESSO",
  "location_number": NumberInt(22579),
  "location_phone": "(780) 457-9394",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "16741 - 91 STREET",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "EDMONTON",
  "address_province": "Alberta",
  "address_postal": "T5Z 2W7",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1998-04-02T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e553807002782"),
  "location_id": NumberInt(10126),
  "location_name": "Mac's Store # 22580",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "",
  "location_number": NumberInt(22580),
  "location_phone": "(780) 433-4011",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "8177 - 99 STREET",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "EDMONTON",
  "address_province": "Alberta",
  "address_postal": "T6E 3S9",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1999-08-05T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e553807002784"),
  "location_id": NumberInt(10127),
  "location_name": "Mac's Store # 22581",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "ESSO",
  "location_number": NumberInt(22581),
  "location_phone": "(780) 988-6442",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "14703 - 40 AVE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "EDMONTON",
  "address_province": "Alberta",
  "address_postal": "T6R 1N1",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1998-05-12T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e553807002786"),
  "location_id": NumberInt(10128),
  "location_name": "Mac's Store # 22583",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "ESSO",
  "location_number": NumberInt(22583),
  "location_phone": "(780) 923-3693",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "4619 - 50 AVE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "GIBBONS",
  "address_province": "Alberta",
  "address_postal": "T0A 1N0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2001-01-07T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e553807002788"),
  "location_id": NumberInt(10129),
  "location_name": "Mac's Store # 22584",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "ESSO",
  "location_number": NumberInt(22584),
  "location_phone": "(780) 639-2750",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "1414 - 8 AVE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "COLD LAKE",
  "address_province": "Alberta",
  "address_postal": "T9M 1N6",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2001-07-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e55380700278a"),
  "location_id": NumberInt(10130),
  "location_name": "Mac's Store # 22585",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "",
  "location_number": NumberInt(22585),
  "location_phone": "(780) 433-0992",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "11105 - 87 AVE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "EDMONTON",
  "address_province": "Alberta",
  "address_postal": "T6G 0X8",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2000-06-15T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e55380700278c"),
  "location_id": NumberInt(10131),
  "location_name": "Mac's Store # 22586",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "",
  "location_number": NumberInt(22586),
  "location_phone": "(780) 538-1433",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "10005 - 105 AVE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "GRANDE PRAIRIE",
  "address_province": "Alberta",
  "address_postal": "T8V 1H1",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1999-10-28T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e55380700278e"),
  "location_id": NumberInt(10132),
  "location_name": "Mac's Store # 22589",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "",
  "location_number": NumberInt(22589),
  "location_phone": "(780) 425-8378",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "9910 - 104 STREET",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "EDMONTON",
  "address_province": "Alberta",
  "address_postal": "T5K 0Z3",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1998-02-11T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e553807002790"),
  "location_id": NumberInt(10133),
  "location_name": "Mac's Store # 22596",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "",
  "location_number": NumberInt(22596),
  "location_phone": "(780) 539-3011",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "9604 - 100 AVE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "GRANDE PRAIRIE",
  "address_province": "Alberta",
  "address_postal": "T8V 0T2",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2000-12-07T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e553807002792"),
  "location_id": NumberInt(10134),
  "location_name": "Mac's Store # 22597",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "",
  "location_number": NumberInt(22597),
  "location_phone": "(780) 461-9201",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "197, 7609 - 38 AVE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "EDMONTON",
  "address_province": "Alberta",
  "address_postal": "T6K 3Y7",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1997-08-10T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e553807002794"),
  "location_id": NumberInt(10135),
  "location_name": "Mac's Store # 22598",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "",
  "location_number": NumberInt(22598),
  "location_phone": "(780) 487-0074",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "7636 - 156 STREET",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "EDMONTON",
  "address_province": "Alberta",
  "address_postal": "T5R 4K7",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2001-03-08T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e553807002796"),
  "location_id": NumberInt(10136),
  "location_name": "Mac's Store # 22599",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "ESSO",
  "location_number": NumberInt(22599),
  "location_phone": "(780) 456-3488",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "15179 - 121 STREET",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "EDMONTON",
  "address_province": "Alberta",
  "address_postal": "T5X 3C8",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2001-03-25T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e553807002798"),
  "location_id": NumberInt(10137),
  "location_name": "Mac's Store # 22600",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "",
  "location_number": NumberInt(22600),
  "location_phone": "(780) 487-9377",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "6903 - 172 STREET",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "EDMONTON",
  "address_province": "Alberta",
  "address_postal": "T5T 5Y1",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1997-11-02T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e55380700279a"),
  "location_id": NumberInt(10138),
  "location_name": "Mac's Store # 22601",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "",
  "location_number": NumberInt(22601),
  "location_phone": "(780) 473-2016",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "5904 - 153 AVE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "EDMONTON",
  "address_province": "Alberta",
  "address_postal": "T5Y-2W1",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1999-05-13T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e55380700279c"),
  "location_id": NumberInt(10139),
  "location_name": "Mac's Store # 22602",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "",
  "location_number": NumberInt(22602),
  "location_phone": "(780) 436-7480",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "11835 - 40 AVE., N.W.",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "EDMONTON",
  "address_province": "Alberta",
  "address_postal": "T6J 0R8",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1998-10-02T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e55380700279e"),
  "location_id": NumberInt(10140),
  "location_name": "Mac's Store # 22603",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "",
  "location_number": NumberInt(22603),
  "location_phone": "(780) 444-0106",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "15810 - 87 AVE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "EDMONTON",
  "address_province": "Alberta",
  "address_postal": "T5R 5W9",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1999-11-11T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070027a0"),
  "location_id": NumberInt(10141),
  "location_name": "Mac's Store # 22604",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "HUSKY",
  "location_number": NumberInt(22604),
  "location_phone": "(780) 490-1912",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "4333 - 50 STREET",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "EDMONTON",
  "address_province": "Alberta",
  "address_postal": "T6L 7E8",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2000-03-02T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070027a2"),
  "location_id": NumberInt(10142),
  "location_name": "Mac's Store # 22605",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "ESSO",
  "location_number": NumberInt(22605),
  "location_phone": "(780) 487-7545",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "18904 - 87 AVE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "EDMONTON",
  "address_province": "Alberta",
  "address_postal": "T5T 6J1",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1999-06-11T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070027a4"),
  "location_id": NumberInt(10143),
  "location_name": "Mac's Store # 22606",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "HUSKY",
  "location_number": NumberInt(22606),
  "location_phone": "(780) 455-1298",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "11410 GROAT ROAD",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "EDMONTON",
  "address_province": "Alberta",
  "address_postal": "T5M 4B7",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2003-04-26T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070027a6"),
  "location_id": NumberInt(10144),
  "location_name": "Mac's Store # 22607",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "HUSKY",
  "location_number": NumberInt(22607),
  "location_phone": "(780) 460-8221",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "35 GIROUX ROAD",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "ST. ALBERT",
  "address_province": "Alberta",
  "address_postal": "T8N 6N3",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2002-03-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070027a8"),
  "location_id": NumberInt(10145),
  "location_name": "Mac's Store # 22608",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "HUSKY",
  "location_number": NumberInt(22608),
  "location_phone": "(780) 645-2899",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "4447 - 50 AVE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "ST. PAUL",
  "address_province": "Alberta",
  "address_postal": "T0A 3A3",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2006-07-09T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070027aa"),
  "location_id": NumberInt(10146),
  "location_name": "Mac's Store # 22609",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "",
  "location_number": NumberInt(22609),
  "location_phone": "(780) 926-3800",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "10202 - 97 STREET, Box 5 (W)",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "HIGH LEVEL",
  "address_province": "Alberta",
  "address_postal": "T0H 1Z0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1988-06-20T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070027ac"),
  "location_id": NumberInt(10147),
  "location_name": "Mac's Store # 22611",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "ESSO",
  "location_number": NumberInt(22611),
  "location_phone": "(867) 873-9393",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "5000 FORREST DRIVE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "YELLOWKNIFE",
  "address_province": "Alberta",
  "address_postal": "X1A 2A7",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2005-12-11T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070027ae"),
  "location_id": NumberInt(10148),
  "location_name": "Mac's Store # 22612",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "",
  "location_number": NumberInt(22612),
  "location_phone": "(780) 524-2559",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "5008 - 50 AVE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "VALLEYVIEW",
  "address_province": "Alberta",
  "address_postal": "T0H 3N0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2003-04-24T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070027b0"),
  "location_id": NumberInt(10149),
  "location_name": "Mac's Store # 22613",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "FASGAS",
  "location_number": NumberInt(22613),
  "location_phone": "(780) 354-2159",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "826 - 1 AVE (Winks)",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "BEAVERLODGE",
  "address_province": "Alberta",
  "address_postal": "T0H 0C0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1988-01-29T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070027b2"),
  "location_id": NumberInt(10150),
  "location_name": "Mac's Store # 22614",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "",
  "location_number": NumberInt(22614),
  "location_phone": "(780) 538-4733",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "7, 9701 - 84 AVE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "GRANDE PRAIRIE",
  "address_province": "Alberta",
  "address_postal": "T8V 4Z8",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2001-06-03T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070027b4"),
  "location_id": NumberInt(10151),
  "location_name": "Mac's Store # 22615",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "",
  "location_number": NumberInt(22615),
  "location_phone": "(780) 461-6101",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "3416 - 43 AVE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "EDMONTON",
  "address_province": "Alberta",
  "address_postal": "T6L 5W9",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2000-08-20T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070027b6"),
  "location_id": NumberInt(10152),
  "location_name": "Mac's Store # 22616",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "",
  "location_number": NumberInt(22616),
  "location_phone": "(780) 939-3377",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "9821 - 100 STREET",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "MORINVILLE",
  "address_province": "Alberta",
  "address_postal": "T8R 1R3",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2000-10-15T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070027b8"),
  "location_id": NumberInt(10153),
  "location_name": "Mac's Store # 22617",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "",
  "location_number": NumberInt(22617),
  "location_phone": "(780) 852-4223",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "617 PATRICIA STREET",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "JASPER",
  "address_province": "Alberta",
  "address_postal": "T0E 1E0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2001-05-03T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070027ba"),
  "location_id": NumberInt(10154),
  "location_name": "Mac's Store # 22618",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "",
  "location_number": NumberInt(22618),
  "location_phone": "(780) 437-7732",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "2807 - 116 STREET",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "EDMONTON",
  "address_province": "Alberta",
  "address_postal": "T6J 4R6",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2001-10-27T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070027bc"),
  "location_id": NumberInt(10155),
  "location_name": "Mac's Store # 22620",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "",
  "location_number": NumberInt(22620),
  "location_phone": "(780) 523-4190",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "5219 - 48 STREET",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "HIGH PRAIRIE",
  "address_province": "Alberta",
  "address_postal": "T0G 1E0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2001-08-02T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070027be"),
  "location_id": NumberInt(10156),
  "location_name": "Mac's Store # 22621",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "",
  "location_number": NumberInt(22621),
  "location_phone": "(780) 476-0990",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "14033 Victoria Trail NW",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "EDMONTON",
  "address_province": "Alberta",
  "address_postal": "T5Y 2B6",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1999-11-24T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070027c0"),
  "location_id": NumberInt(10157),
  "location_name": "Mac's Store # 22623",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "ESSO",
  "location_number": NumberInt(22623),
  "location_phone": "(780) 459-7355",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "2 SIR WINSTON CHURCHILL AVE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "ST. ALBERT",
  "address_province": "Alberta",
  "address_postal": "T8N 3T6",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2002-02-14T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070027c2"),
  "location_id": NumberInt(10158),
  "location_name": "Mac's Store # 22625",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "PETROCAN",
  "location_number": NumberInt(22625),
  "location_phone": "(780) 778-2655",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "5123 KEPLER ST WEST",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "WHITECOURT",
  "address_province": "Alberta",
  "address_postal": "T7S 1X7",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2002-10-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070027c4"),
  "location_id": NumberInt(10159),
  "location_name": "Mac's Store # 22626",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "HUSKY",
  "location_number": NumberInt(22626),
  "location_phone": "(780) 849-6954",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "100 - 12 AVE SW",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "SLAVE LAKE",
  "address_province": "Alberta",
  "address_postal": "T0G 2A0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2002-11-21T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070027c6"),
  "location_id": NumberInt(10160),
  "location_name": "Mac's Store # 22628",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "HUSKY",
  "location_number": NumberInt(22628),
  "location_phone": "(780) 622-2020",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "60 KAYBOB DRIVE SOUTH",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "FOX CREEK",
  "address_province": "Alberta",
  "address_postal": "T0H 1P0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2006-02-19T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070027c8"),
  "location_id": NumberInt(10161),
  "location_name": "Mac's Store # 22630",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "ESSO",
  "location_number": NumberInt(22630),
  "location_phone": "(780) 853-2741",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "5204 - 50 AVE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "VERMILLION",
  "address_province": "Alberta",
  "address_postal": "T9X 1V1",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2006-08-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070027ca"),
  "location_id": NumberInt(10162),
  "location_name": "Mac's Store # 22631",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "HUSKY",
  "location_number": NumberInt(22631),
  "location_phone": "(780) 672-2441",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "4730 - 65 STREET",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CAMROSE",
  "address_province": "Alberta",
  "address_postal": "T4V 4L4",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2003-11-12T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070027cc"),
  "location_id": NumberInt(10163),
  "location_name": "Mac's Store # 22632",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "MACS",
  "location_number": NumberInt(22632),
  "location_phone": "(780) 992-4986",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "9900 - 93 STREET",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "FT SASKATCHEWAN",
  "address_province": "Alberta",
  "address_postal": "T8L 4K8",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1999-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070027ce"),
  "location_id": NumberInt(10164),
  "location_name": "Mac's Store # 22634",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "HUSKY",
  "location_number": NumberInt(22634),
  "location_phone": "(780) 921-2280",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "5008 - 47 AVE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "BON ACCORD",
  "address_province": "Alberta",
  "address_postal": "T0A 0K0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2006-08-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070027d0"),
  "location_id": NumberInt(10165),
  "location_name": "Mac's Store # 22638",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "HUSKY",
  "location_number": NumberInt(22638),
  "location_phone": "(780) 432-5609",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "10845 - 61 AVE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "EDMONTON",
  "address_province": "Alberta",
  "address_postal": "T6H 1L9",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2000-01-25T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070027d2"),
  "location_id": NumberInt(10166),
  "location_name": "Mac's Store # 22640",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "MACS",
  "location_number": NumberInt(22640),
  "location_phone": "(780) 443-3119",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "17260 - 95 AVE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "EDMONTON",
  "address_province": "Alberta",
  "address_postal": "T5T 6P1",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2001-03-08T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070027d4"),
  "location_id": NumberInt(10167),
  "location_name": "Mac's Store # 22641",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "ESSO",
  "location_number": NumberInt(22641),
  "location_phone": "(780) 980-0852",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "#100, 4302 - 50 STREET",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "LEDUC",
  "address_province": "Alberta",
  "address_postal": "T9E 6J9",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2002-02-07T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070027d6"),
  "location_id": NumberInt(10168),
  "location_name": "Mac's Store # 22642",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "ESSO",
  "location_number": NumberInt(22642),
  "location_phone": "(780) 791-4501",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "9912 KING STREET",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "FT. MCMURRAY",
  "address_province": "Alberta",
  "address_postal": "T9H 5A8",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2001-10-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070027d8"),
  "location_id": NumberInt(10169),
  "location_name": "Mac's Store # 22643",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "ESSO",
  "location_number": NumberInt(22643),
  "location_phone": "(780) 799-3302",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "102 MILLENNIUM DRIVE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "FT. MCMURRAY",
  "address_province": "Alberta",
  "address_postal": "T9K 1Y8",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2001-10-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070027da"),
  "location_id": NumberInt(10170),
  "location_name": "Mac's Store # 22644",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "",
  "location_number": NumberInt(22644),
  "location_phone": "(780) 532-7823",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "1, 9301 - 76 AVE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "GRANDE PRAIRIE",
  "address_province": "Alberta",
  "address_postal": "T8V 6H1",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2001-11-05T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070027dc"),
  "location_id": NumberInt(10171),
  "location_name": "Mac's Store # 22646",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "",
  "location_number": NumberInt(22646),
  "location_phone": "(780) 457-3475",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "15399 CASTLEDOWNS RD",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "EDMONTON",
  "address_province": "Alberta",
  "address_postal": "T5X 3Y7",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2002-04-04T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070027de"),
  "location_id": NumberInt(10172),
  "location_name": "Mac's Store # 22650",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "HUSKY",
  "location_number": NumberInt(22650),
  "location_phone": "(780) 962-8246",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "624 KING STREET",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "SPRUCE GROVE",
  "address_province": "Alberta",
  "address_postal": "T7X 4K5",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2003-10-16T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070027e0"),
  "location_id": NumberInt(10173),
  "location_name": "Mac's Store # 22652",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "",
  "location_number": NumberInt(22652),
  "location_phone": "(780) 457-4457",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "3540 - 137 AVENUE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "EDMONTON",
  "address_province": "Alberta",
  "address_postal": "T5A 5G8",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2003-01-09T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070027e2"),
  "location_id": NumberInt(10174),
  "location_name": "Mac's Store # 22653",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "ESSO",
  "location_number": NumberInt(22653),
  "location_phone": "(780) 963-9205",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "4402 - 48 Street",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "STONY PLAIN",
  "address_province": "Alberta",
  "address_postal": "T7Z 1L4",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2003-04-16T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070027e4"),
  "location_id": NumberInt(10175),
  "location_name": "Mac's Store # 22655",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "",
  "location_number": NumberInt(22655),
  "location_phone": "(780) 482-7328",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "UNIT #1, 11653 Jasper Avenue",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "EDMONTON",
  "address_province": "Alberta",
  "address_postal": "T5K 0N5",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2004-04-21T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070027e6"),
  "location_id": NumberInt(10176),
  "location_name": "Mac's Store # 22657",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "ESSO",
  "location_number": NumberInt(22657),
  "location_phone": "(780) 490-6823",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "8403 ELLERSLIE ROAD SW",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "EDMONTON",
  "address_province": "Alberta",
  "address_postal": "T6X 1A3",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2005-06-14T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070027e8"),
  "location_id": NumberInt(10177),
  "location_name": "Mac's Store # 22658",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "HUSKY",
  "location_number": NumberInt(22658),
  "location_phone": "(780) 449-1926",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "7 JIM COMMON DRIVE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "SHERWOOD PARK",
  "address_province": "Alberta",
  "address_postal": "T8H 0P9",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2011-04-15T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070027ea"),
  "location_id": NumberInt(10178),
  "location_name": "Mac's Store # 22659",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "",
  "location_number": NumberInt(22659),
  "location_phone": "(780) 929-5921",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "5019 - 50TH STREET",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "BEAUMONT",
  "address_province": "Alberta",
  "address_postal": "T4X 1H6",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2004-04-04T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070027ec"),
  "location_id": NumberInt(10179),
  "location_name": "Mac's Store # 22660",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "",
  "location_number": NumberInt(22660),
  "location_phone": "(780) 743-4056",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "1 - 700 Signal Road",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "FT. MCMURRAY",
  "address_province": "Alberta",
  "address_postal": "T9H 4V3",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2003-11-05T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070027ee"),
  "location_id": NumberInt(10180),
  "location_name": "Mac's Store # 22661",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "",
  "location_number": NumberInt(22661),
  "location_phone": "(780) 409-8200",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "15531 - 118 AVENUE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "EDMONTON",
  "address_province": "Alberta",
  "address_postal": "T5V 1C5",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2004-10-14T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070027f0"),
  "location_id": NumberInt(10181),
  "location_name": "Mac's Store # 22662",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "",
  "location_number": NumberInt(22662),
  "location_phone": "(780) 409-9488",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "8405 - 112th STREET",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "EDMONTON",
  "address_province": "Alberta",
  "address_postal": "T6G 1K5",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2005-01-26T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070027f2"),
  "location_id": NumberInt(10182),
  "location_name": "Mac's Store # 22663",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "ESSO",
  "location_number": NumberInt(22663),
  "location_phone": "(780) 743-2345",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "100 REAL MARTIN DRIVE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "FT. MCMURRAY",
  "address_province": "Alberta",
  "address_postal": "T9K 2S1",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2004-03-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070027f4"),
  "location_id": NumberInt(10183),
  "location_name": "Mac's Store # 22664",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "",
  "location_number": NumberInt(22664),
  "location_phone": "(780) 458-8120",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "#110, 190 Boudreau Road",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "ST. ALBERT",
  "address_province": "Alberta",
  "address_postal": "T8N 6B9",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2006-11-23T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070027f6"),
  "location_id": NumberInt(10184),
  "location_name": "Mac's Store # 22668",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "",
  "location_number": NumberInt(22668),
  "location_phone": "(780) 989-3972",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "1704 Towne Centre Blvd NW",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "EDMONTON",
  "address_province": "Alberta",
  "address_postal": "T6R 3A0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2005-04-21T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070027f8"),
  "location_id": NumberInt(10185),
  "location_name": "Mac's Store # 22669",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "",
  "location_number": NumberInt(22669),
  "location_phone": "(250) 785-2099",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "9607 - 100 AVE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "FORT ST. JOHN",
  "address_province": "Alberta",
  "address_postal": "V1J 1Y2",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2000-06-11T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070027fa"),
  "location_id": NumberInt(10186),
  "location_name": "Mac's Store # 22672",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "",
  "location_number": NumberInt(22672),
  "location_phone": "(780) 430-7895",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "103 Haddow Close NW",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "EDMONTON",
  "address_province": "Alberta",
  "address_postal": "T6R 3W3",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2006-04-19T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070027fc"),
  "location_id": NumberInt(10187),
  "location_name": "Mac's Store # 22673",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "",
  "location_number": NumberInt(22673),
  "location_phone": "(780) 421-9241",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "11314 Jasper Avenue (LiquorStore)",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "EDMONTON",
  "address_province": "Alberta",
  "address_postal": "T5K 0L8",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2004-12-09T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e5538070027fe"),
  "location_id": NumberInt(10188),
  "location_name": "Mac's Store # 22674",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "",
  "location_number": NumberInt(22674),
  "location_phone": "(250) 782-3110",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "800 - 103 AVE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "DAWSON CREEK",
  "address_province": "Alberta",
  "address_postal": "VIG 2H5",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1997-10-13T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e553807002800"),
  "location_id": NumberInt(10189),
  "location_name": "Mac's Store # 22691",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "",
  "location_number": NumberInt(22691),
  "location_phone": "(780) 433-2471",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "864 - 119 Street SW",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "EDMONTON",
  "address_province": "Alberta",
  "address_postal": "T6W 0J1",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2008-01-22T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e553807002802"),
  "location_id": NumberInt(10190),
  "location_name": "Mac's Store # 22692",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "PETROCAN",
  "location_number": NumberInt(22692),
  "location_phone": "(780) 402-2960",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "6801 Pinnacle Street",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "GRANDE PRAIRIE",
  "address_province": "Alberta",
  "address_postal": "T8V 6V3",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2010-02-12T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e553807002804"),
  "location_id": NumberInt(10191),
  "location_name": "Mac's Store # 22694",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "",
  "location_number": NumberInt(22694),
  "location_phone": "(780) 483-0648",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "5220 - 199 Street",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "EDMONTON",
  "address_province": "Alberta",
  "address_postal": "T6M 0E4",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2008-04-24T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4def3d5e553807002806"),
  "location_id": NumberInt(10192),
  "location_name": "Mac's Store # 22695",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "",
  "location_number": NumberInt(22695),
  "location_phone": "(780) 532-0177",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "#101, 9215 Lakeland Drive",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "GRANDE PRAIRIE",
  "address_province": "Alberta",
  "address_postal": "T8X 0B8",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2011-03-03T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e553807002808"),
  "location_id": NumberInt(10193),
  "location_name": "Mac's Store # 22696",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "ESSO",
  "location_number": NumberInt(22696),
  "location_phone": "(780) 987-3673",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "#155, 180 Miquelon Avenue",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "DEVON",
  "address_province": "Alberta",
  "address_postal": "T9G 0A6",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2010-03-29T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e55380700280a"),
  "location_id": NumberInt(10194),
  "location_name": "Mac's Store # 22697",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "",
  "location_number": NumberInt(22697),
  "location_phone": "(780) 743-2984",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Suite 100 151 Loutit Road",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "FT. MCMURRAY",
  "address_province": "Alberta",
  "address_postal": "T9K 0K6",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2009-06-29T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e55380700280c"),
  "location_id": NumberInt(10195),
  "location_name": "Mac's Store # 22698",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "",
  "location_number": NumberInt(22698),
  "location_phone": "(780) 987-0289",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "#107, 180 Miquelon Avenue (Liquor Store)",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "DEVON",
  "address_province": "Alberta",
  "address_postal": "T9G 0A6",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2010-04-22T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e55380700280e"),
  "location_id": NumberInt(10196),
  "location_name": "Mac's Store # 22700",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "",
  "location_number": NumberInt(22700),
  "location_phone": "(780) 435-3142",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "10162 - 82 Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "EDMONTON",
  "address_province": "Alberta",
  "address_postal": "T6E 1Z4",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2010-04-16T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e553807002810"),
  "location_id": NumberInt(10197),
  "location_name": "Mac's Store # 22701",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "",
  "location_number": NumberInt(22701),
  "location_phone": "(780) 532-3068",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "#102, 8314 Westpointe Drive (LiquorStore)",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "GRANDE PRAIRIE",
  "address_province": "Alberta",
  "address_postal": "T8W 2R2",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2010-09-23T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e553807002812"),
  "location_id": NumberInt(10198),
  "location_name": "Mac's Store # 22702",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "PETROCAN",
  "location_number": NumberInt(22702),
  "location_phone": "(780) 377-2143",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "12631 Victoria Trail",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "EDMONTON",
  "address_province": "Alberta",
  "address_postal": "T5A 0T1",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e553807002814"),
  "location_id": NumberInt(10199),
  "location_name": "Mac's Store # 22706",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "HUSKY",
  "location_number": NumberInt(22706),
  "location_phone": "(780) 449-0402",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "10 Ridgemont Way",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "SHERWOOD PARK",
  "address_province": "Alberta",
  "address_postal": "T8A 6B3",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e553807002816"),
  "location_id": NumberInt(10200),
  "location_name": "Mac's Store # 22709",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "",
  "location_number": NumberInt(22709),
  "location_phone": "(780) 462-8980",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "7103 – 101 Ave.",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "EDMONTON",
  "address_province": "Alberta",
  "address_postal": "T6A 0H9",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2011-04-15T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e553807002818"),
  "location_id": NumberInt(10201),
  "location_name": "Mac's Store # 22710",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "",
  "location_number": NumberInt(22710),
  "location_phone": "(780) 890-7295",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Unit 1400, 1000 Airport Road",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "LEDUC",
  "address_province": "Alberta",
  "address_postal": "T9E 0V3",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e55380700281a"),
  "location_id": NumberInt(10202),
  "location_name": "Mac's Store # 22711",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "NALTA",
  "location_banner": "SHELL",
  "location_number": NumberInt(22711),
  "location_phone": "(780) 332-2471",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "5401 - 51 Street",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Grimshaw",
  "address_province": "Alberta",
  "address_postal": "T0H 1W0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2011-06-13T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e55380700281c"),
  "location_id": NumberInt(10203),
  "location_name": "Mac's Store # 22003",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22003),
  "location_phone": "(403) 264-7391",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "528 - 4 AVE. S.W.",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CALGARY",
  "address_province": "Alberta",
  "address_postal": "T2P 0J6",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1998-10-08T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e55380700281e"),
  "location_id": NumberInt(10204),
  "location_name": "Mac's Store # 22004",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22004),
  "location_phone": "(403) 242-2666",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "2104 - 33 AVE S.W.",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CALGARY",
  "address_province": "Alberta",
  "address_postal": "T2T 1Z6",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1997-09-21T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e553807002820"),
  "location_id": NumberInt(10205),
  "location_name": "Mac's Store # 22006",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22006),
  "location_phone": "(403) 289-7222",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "3616 - 52 AVE N.W.",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CALGARY",
  "address_province": "Alberta",
  "address_postal": "T2L 1V9",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1997-05-11T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e553807002822"),
  "location_id": NumberInt(10206),
  "location_name": "Mac's Store # 22011",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22011),
  "location_phone": "(403) 245-4242",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "1202 - 17 AVE S.W.",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CALGARY",
  "address_province": "Alberta",
  "address_postal": "T2T 0B8",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1997-11-15T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e553807002824"),
  "location_id": NumberInt(10207),
  "location_name": "Mac's Store # 22012",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22012),
  "location_phone": "(403) 262-3055",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "705 - 8 ST. S.W.",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CALGARY",
  "address_province": "Alberta",
  "address_postal": "T2P 2A8",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2001-01-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e553807002826"),
  "location_id": NumberInt(10208),
  "location_name": "Mac's Store # 22014",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22014),
  "location_phone": "(403) 282-4000",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Unit 14, 1941 UXBRIDGE DRIVE N.W.",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CALGARY",
  "address_province": "Alberta",
  "address_postal": "T2N 2V2",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2003-08-28T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e553807002828"),
  "location_id": NumberInt(10209),
  "location_name": "Mac's Store # 22020",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22020),
  "location_phone": "(403) 273-9330",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "4100 MARLBOROUGH DR N.E.",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CALGARY",
  "address_province": "Alberta",
  "address_postal": "T2A 2Z5",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1999-05-13T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e55380700282a"),
  "location_id": NumberInt(10210),
  "location_name": "Mac's Store # 22021",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22021),
  "location_phone": "(403) 286-2424",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "7930 BOWNESS ROAD N.W.",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CALGARY",
  "address_province": "Alberta",
  "address_postal": "T3B 0H2",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2000-04-27T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e55380700282c"),
  "location_id": NumberInt(10211),
  "location_name": "Mac's Store # 22027",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22027),
  "location_phone": "(403) 244-6266",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "2905 14 STREET S.W.",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CALGARY",
  "address_province": "Alberta",
  "address_postal": "T2T 3V5",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1998-07-08T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e55380700282e"),
  "location_id": NumberInt(10212),
  "location_name": "Mac's Store # 22028",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22028),
  "location_phone": "(403) 244-5312",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "1403 8TH. ST. S.W.",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CALGARY",
  "address_province": "Alberta",
  "address_postal": "T2R 1B8",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1999-02-11T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e553807002830"),
  "location_id": NumberInt(10213),
  "location_name": "Mac's Store # 22029",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22029),
  "location_phone": "(403) 243-6463",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "21, 2439 54TH. AVE S.W",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CALGARY",
  "address_province": "Alberta",
  "address_postal": "T3E 1M4",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1998-10-02T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e553807002832"),
  "location_id": NumberInt(10214),
  "location_name": "Mac's Store # 22037",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22037),
  "location_phone": "(403) 529-6210",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "1501 DUNMORE RD.S.E",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "MEDICINE HAT",
  "address_province": "Alberta",
  "address_postal": "T1A 1Z8",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1999-10-28T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e553807002834"),
  "location_id": NumberInt(10215),
  "location_name": "Mac's Store # 22038",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22038),
  "location_phone": "(403) 279-6761",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "4, 7005-18 STREET S.E.",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CALGARY",
  "address_province": "Alberta",
  "address_postal": "T2C 1Y1",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1999-06-29T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e553807002836"),
  "location_id": NumberInt(10216),
  "location_name": "Mac's Store # 22045",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22045),
  "location_phone": "(403) 285-5170",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "19, 3735 RUNDLEHORN DR.N.E",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CALGARY",
  "address_province": "Alberta",
  "address_postal": "T1Y 2K1",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1997-09-21T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e553807002838"),
  "location_id": NumberInt(10217),
  "location_name": "Mac's Store # 22046",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22046),
  "location_phone": "(403) 288-2535",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "7, 5720 SILVERSPRINGS BLVD.",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CALGARY",
  "address_province": "Alberta",
  "address_postal": "T3B 4N7",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1998-05-19T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e55380700283a"),
  "location_id": NumberInt(10218),
  "location_name": "Mac's Store # 22047",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22047),
  "location_phone": "(403) 381-7666",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "1, 170 COLUMBIA BLVD",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "LETHBRIDGE",
  "address_province": "Alberta",
  "address_postal": "T1K 4J4",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2000-05-16T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e55380700283c"),
  "location_id": NumberInt(10219),
  "location_name": "Mac's Store # 22048",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22048),
  "location_phone": "(403) 281-4902",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "1110 CANTERBURY DRIVE S.W.",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CALGARY",
  "address_province": "Alberta",
  "address_postal": "T2W 3P5",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1998-08-06T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e55380700283e"),
  "location_id": NumberInt(10220),
  "location_name": "Mac's Store # 22049",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "HUSKY",
  "location_number": NumberInt(22049),
  "location_phone": "(403) 248-7818",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "6098 MEMORIAL DR. N.E.",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CALGARY",
  "address_province": "Alberta",
  "address_postal": "T2A 3W1",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1999-08-26T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e553807002840"),
  "location_id": NumberInt(10221),
  "location_name": "Mac's Store # 22051",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22051),
  "location_phone": "(403) 248-5577",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "4415 MEMORIAL DRIVE N.E.",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CALGARY",
  "address_province": "Alberta",
  "address_postal": "T2A 6A4",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1999-10-28T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e553807002842"),
  "location_id": NumberInt(10222),
  "location_name": "Mac's Store # 22052",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22052),
  "location_phone": "(403) 362-2808",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "907 A SUTHERLAND DRIVE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "BROOKS",
  "address_province": "Alberta",
  "address_postal": "T1R 0A1",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1999-08-09T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e553807002844"),
  "location_id": NumberInt(10223),
  "location_name": "Mac's Store # 22053",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22053),
  "location_phone": "(403) 526-7691",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "717 20TH STREET N.E.",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "MEDICINE HAT",
  "address_province": "Alberta",
  "address_postal": "T1C 1P3",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1999-08-05T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e553807002846"),
  "location_id": NumberInt(10224),
  "location_name": "Mac's Store # 22054",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22054),
  "location_phone": "(403) 246-1973",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "4623 BOW TRAIL S.W.",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CALGARY",
  "address_province": "Alberta",
  "address_postal": "T3C 2G6",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2000-03-21T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e553807002848"),
  "location_id": NumberInt(10225),
  "location_name": "Mac's Store # 22056",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22056),
  "location_phone": "(403) 285-7117",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "3709 - 26TH AVENUE N.E.",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CALGARY",
  "address_province": "Alberta",
  "address_postal": "T1Y 4S3",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1998-03-23T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e55380700284a"),
  "location_id": NumberInt(10226),
  "location_name": "Mac's Store # 22057",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22057),
  "location_phone": "(403) 281-0144",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "4, 11440 BRAESIDE DR. S.W.",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CALGARY",
  "address_province": "Alberta",
  "address_postal": "T2W 3N4",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1997-06-25T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e55380700284c"),
  "location_id": NumberInt(10227),
  "location_name": "Mac's Store # 22058",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22058),
  "location_phone": "(403) 223-9511",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "5802 - 50 STREET",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "TABER",
  "address_province": "Alberta",
  "address_postal": "T1G 1E7",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1999-12-05T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e55380700284e"),
  "location_id": NumberInt(10228),
  "location_name": "Mac's Store # 22060",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22060),
  "location_phone": "(403) 247-3128",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "5403 CROWCHILD TRAIL N.W.",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CALGARY",
  "address_province": "Alberta",
  "address_postal": "T3B 4Z1",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1978-04-30T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e553807002850"),
  "location_id": NumberInt(10229),
  "location_name": "Mac's Store # 22063",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22063),
  "location_phone": "(403) 272-7118",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "838 - 68 STREET, N.E.",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CALGARY",
  "address_province": "Alberta",
  "address_postal": "T2A 6N7",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1997-07-06T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e553807002852"),
  "location_id": NumberInt(10230),
  "location_name": "Mac's Store # 22069",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22069),
  "location_phone": "(403) 273-6484",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "3012 17 AVENUE S.E.",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CALGARY",
  "address_province": "Alberta",
  "address_postal": "T2A 0P7",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2000-06-22T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e553807002854"),
  "location_id": NumberInt(10231),
  "location_name": "Mac's Store # 22076",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22076),
  "location_phone": "(403) 281-1933",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "523 WOODPARK BLVD S.W.",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CALGARY",
  "address_province": "Alberta",
  "address_postal": "T2W 4J3",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1997-07-06T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e553807002856"),
  "location_id": NumberInt(10232),
  "location_name": "Mac's Store # 22082",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22082),
  "location_phone": "403-938-7557",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "100 MILLIGAN DR",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "OKOTOKS",
  "address_province": "Alberta",
  "address_postal": "T1S 1C5",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1999-04-04T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e553807002858"),
  "location_id": NumberInt(10233),
  "location_name": "Mac's Store # 22088",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22088),
  "location_phone": "(403) 235-5171",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "4721 - 17TH AVENUE S.E.",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CALGARY",
  "address_province": "Alberta",
  "address_postal": "T2A 0T9",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1999-06-17T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e55380700285a"),
  "location_id": NumberInt(10234),
  "location_name": "Mac's Store # 22091",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22091),
  "location_phone": "(403) 948-3507",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "2145 SUMMERFIELD BLVD.",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "AIRDRIE",
  "address_province": "Alberta",
  "address_postal": "T4B 1X5",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1998-05-19T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e55380700285c"),
  "location_id": NumberInt(10235),
  "location_name": "Mac's Store # 22096",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22096),
  "location_phone": "(403) 652-2660",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "625A 5TH ST S.E.",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "HIGH RIVER",
  "address_province": "Alberta",
  "address_postal": "T1V 1H9",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2002-09-15T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e55380700285e"),
  "location_id": NumberInt(10236),
  "location_name": "Mac's Store # 22100",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22100),
  "location_phone": "(403) 526-7702",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "398 - 12TH STREET NE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "MEDICINE HAT",
  "address_province": "Alberta",
  "address_postal": "T1A 5V1",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2003-11-21T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e553807002860"),
  "location_id": NumberInt(10237),
  "location_name": "Mac's Store # 22107",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "PETROCAN",
  "location_number": NumberInt(22107),
  "location_phone": "(403) 263-7917",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "630 - 1ST AVENUE N.E.",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CALGARY",
  "address_province": "Alberta",
  "address_postal": "T2E 0B6",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1998-04-09T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e553807002862"),
  "location_id": NumberInt(10238),
  "location_name": "Mac's Store # 22108",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "HUSKY",
  "location_number": NumberInt(22108),
  "location_phone": "(403) 239-8989",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "900 - 20 CROWFOOT CRES. N.W.",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CALGARY",
  "address_province": "Alberta",
  "address_postal": "T3G 2P6",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2001-01-11T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e553807002864"),
  "location_id": NumberInt(10239),
  "location_name": "Mac's Store # 22111",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22111),
  "location_phone": "(403) 249-3224",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "4011 -  50TH STREET S.W.",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CALGARY",
  "address_province": "Alberta",
  "address_postal": "T3E 7C5",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2000-03-23T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e553807002866"),
  "location_id": NumberInt(10240),
  "location_name": "Mac's Store # 22112",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22112),
  "location_phone": "(403) 228-7775",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "1207 - 12 AVENUE S.W.",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CALGARY",
  "address_province": "Alberta",
  "address_postal": "T3C 3S7",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1997-10-13T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e553807002868"),
  "location_id": NumberInt(10241),
  "location_name": "Mac's Store # 22113",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22113),
  "location_phone": "(403) 291-9370",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "1904 - 19TH STREET N.E.",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CALGARY",
  "address_province": "Alberta",
  "address_postal": "T2E 8E1",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1997-10-19T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e55380700286a"),
  "location_id": NumberInt(10242),
  "location_name": "Mac's Store # 22114",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22114),
  "location_phone": "(403) 229-1101",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "1705 - 17 AVENUE S.W.",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CALGARY",
  "address_province": "Alberta",
  "address_postal": "T2T 0E6",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1998-04-16T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e55380700286c"),
  "location_id": NumberInt(10243),
  "location_name": "Mac's Store # 22116",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22116),
  "location_phone": "(403) 271-1105",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "9909 FAIRMOUNT DRIVE S.E.",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CALGARY",
  "address_province": "Alberta",
  "address_postal": "T2J 0S2",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1998-11-01T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e55380700286e"),
  "location_id": NumberInt(10244),
  "location_name": "Mac's Store # 22117",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22117),
  "location_phone": "(403) 295-3745",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "8286 CENTRE STREET NORTH",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CALGARY",
  "address_province": "Alberta",
  "address_postal": "T3K 1K5",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1999-04-22T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e553807002870"),
  "location_id": NumberInt(10245),
  "location_name": "Mac's Store # 22119",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22119),
  "location_phone": "(403) 228-1449",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "2005 - 4 STREET S.W.",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CALGARY",
  "address_province": "Alberta",
  "address_postal": "T2S 1W6",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1996-12-15T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e553807002872"),
  "location_id": NumberInt(10246),
  "location_name": "Mac's Store # 22120",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22120),
  "location_phone": "(403) 246-8129",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "204 -  6449 CROWCHILD TRAIL SW",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CALGARY",
  "address_province": "Alberta",
  "address_postal": "T3E 5R8",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1998-07-12T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e553807002874"),
  "location_id": NumberInt(10247),
  "location_name": "Mac's Store # 22121",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22121),
  "location_phone": "(403) 286-8110",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "209-8060 SILVER SPRINGS BLVD NW",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CALGARY",
  "address_province": "Alberta",
  "address_postal": "T3B 4N1",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1998-02-12T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e553807002876"),
  "location_id": NumberInt(10248),
  "location_name": "Mac's Store # 22122",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "HUSKY",
  "location_number": NumberInt(22122),
  "location_phone": "(403) 225-0656",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "14943 DEER RIDGE DR S.E.",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CALGARY",
  "address_province": "Alberta",
  "address_postal": "T2J 7C4",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1997-11-15T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e553807002878"),
  "location_id": NumberInt(10249),
  "location_name": "Mac's Store # 22123",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "ESSO",
  "location_number": NumberInt(22123),
  "location_phone": "(403) 625-3895",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "4940 - 1ST STREET",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CLARESHOLM",
  "address_province": "Alberta",
  "address_postal": "T0L 0T0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2001-07-05T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e55380700287a"),
  "location_id": NumberInt(10250),
  "location_name": "Mac's Store # 22124",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22124),
  "location_phone": "(403) 278-9455",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "755 LAKE BONAVISTA DR SE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CALGARY",
  "address_province": "Alberta",
  "address_postal": "T2J 0N3",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1997-10-02T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e55380700287c"),
  "location_id": NumberInt(10251),
  "location_name": "Mac's Store # 22125",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22125),
  "location_phone": "(403) 266-6290",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "555 - 11TH AVENUE S.W.",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CALGARY",
  "address_province": "Alberta",
  "address_postal": "T2R 0C8",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1999-04-25T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e55380700287e"),
  "location_id": NumberInt(10252),
  "location_name": "Mac's Store # 22126",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22126),
  "location_phone": "(403) 285-6353",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "5260 FALSBRIDGE DRIVE N.E.",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CALGARY",
  "address_province": "Alberta",
  "address_postal": "T3J 1C1",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1997-10-05T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e553807002880"),
  "location_id": NumberInt(10253),
  "location_name": "Mac's Store # 22128",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22128),
  "location_phone": "(403) 258-1331",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "56 - 6130 - 1A ST S.W.",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CALGARY",
  "address_province": "Alberta",
  "address_postal": "T2H-0G3",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1998-09-17T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e553807002882"),
  "location_id": NumberInt(10254),
  "location_name": "Mac's Store # 22130",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "HUSKY",
  "location_number": NumberInt(22130),
  "location_phone": "(403) 246-2878",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "#452, 1919 SIROCCO DR. S.W.",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CALGARY",
  "address_province": "Alberta",
  "address_postal": "T3H 2Y3",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1998-03-22T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e553807002884"),
  "location_id": NumberInt(10255),
  "location_name": "Mac's Store # 22135",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22135),
  "location_phone": "(403) 235-0430",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "#208, 1440 - 52 ST N.E.",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CALGARY",
  "address_province": "Alberta",
  "address_postal": "T2A 4T8",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2001-08-14T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e553807002886"),
  "location_id": NumberInt(10256),
  "location_name": "Mac's Store # 22136",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22136),
  "location_phone": "(403) 262-5063",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "BAY #3 - 140 11 AVE S.W.",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CALGARY",
  "address_province": "Alberta",
  "address_postal": "T2R 0B8",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1998-12-13T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e553807002888"),
  "location_id": NumberInt(10257),
  "location_name": "Mac's Store # 22137",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22137),
  "location_phone": "(403) 547-6741",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "#4, 34 EDGEDALE DR. N.W.",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CALGARY",
  "address_province": "Alberta",
  "address_postal": "T3A 2R4",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1997-02-14T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e55380700288a"),
  "location_id": NumberInt(10258),
  "location_name": "Mac's Store # 22143",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "MACS",
  "location_number": NumberInt(22143),
  "location_phone": "(403) 272-9485",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "1264 - 68 STREET SE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CALGARY",
  "address_province": "Alberta",
  "address_postal": "T2A 7X7",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1999-12-19T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e55380700288c"),
  "location_id": NumberInt(10259),
  "location_name": "Mac's Store # 22145",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "ESSO",
  "location_number": NumberInt(22145),
  "location_phone": "(403) 280-9848",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "3 CORAL SPRINGS BLVD NE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CALGARY",
  "address_province": "Alberta",
  "address_postal": "T3J 4J1",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2000-04-26T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e55380700288e"),
  "location_id": NumberInt(10260),
  "location_name": "Mac's Store # 22146",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "HUSKY",
  "location_number": NumberInt(22146),
  "location_phone": "(403) 932-9329",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "58 WEST AARSBY ROAD (Winks)",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "COCHRANE",
  "address_province": "Alberta",
  "address_postal": "T4C 1M1",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1992-09-18T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e553807002890"),
  "location_id": NumberInt(10261),
  "location_name": "Mac's Store # 22147",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "HUSKY",
  "location_number": NumberInt(22147),
  "location_phone": "(403) 823-2207",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "175 SOUTH RAILWAY AVENUE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "DRUMHELLER",
  "address_province": "Alberta",
  "address_postal": "T0J 0Y6",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2000-10-22T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e553807002892"),
  "location_id": NumberInt(10262),
  "location_name": "Mac's Store # 22149",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "MACS",
  "location_number": NumberInt(22149),
  "location_phone": "(403) 443-2185",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "702 - 2 STREET NORTH",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "THREE HILLS",
  "address_province": "Alberta",
  "address_postal": "T0M 2A0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1998-10-27T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e553807002894"),
  "location_id": NumberInt(10263),
  "location_name": "Mac's Store # 22150",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "HUSKY",
  "location_number": NumberInt(22150),
  "location_phone": "(403) 646-3252",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "2204 - 19 STREET (Winks)",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "NANTON",
  "address_province": "Alberta",
  "address_postal": "T0L 1R0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1998-06-23T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e553807002896"),
  "location_id": NumberInt(10264),
  "location_name": "Mac's Store # 22151",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "ESSO",
  "location_number": NumberInt(22151),
  "location_phone": "(403) 337-2960",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "520 - 10 AVE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CARSTAIRS",
  "address_province": "Alberta",
  "address_postal": "T0M 0N0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1998-09-08T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e553807002898"),
  "location_id": NumberInt(10265),
  "location_name": "Mac's Store # 22154",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "SHELL",
  "location_number": NumberInt(22154),
  "location_phone": "(403) 553-2660",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "2351 - 7 AVENUE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "FORT MACLEOD",
  "address_province": "Alberta",
  "address_postal": "T0L 0Z0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2000-02-27T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e55380700289a"),
  "location_id": NumberInt(10266),
  "location_name": "Mac's Store # 22156",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "HUSKY",
  "location_number": NumberInt(22156),
  "location_phone": "(403) 873-0862",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "16305 SOMERCREST STREET SW",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CALGARY",
  "address_province": "Alberta",
  "address_postal": "T2Y 3M7",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2001-10-09T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e55380700289c"),
  "location_id": NumberInt(10267),
  "location_name": "Mac's Store # 22157",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "PETROCAN",
  "location_number": NumberInt(22157),
  "location_phone": "(403) 257-8925",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "8 MCKENZIE TOWNE AVE SE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CALGARY",
  "address_province": "Alberta",
  "address_postal": "T2Z 3S7",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2001-02-14T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e55380700289e"),
  "location_id": NumberInt(10268),
  "location_name": "Mac's Store # 22158",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "ESSO",
  "location_number": NumberInt(22158),
  "location_phone": "(403) 938-2359",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "40 SOUTHRIDGE DRIVE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "OKOTOKS",
  "address_province": "Alberta",
  "address_postal": "T1S 1V4",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2003-06-25T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e5538070028a0"),
  "location_id": NumberInt(10269),
  "location_name": "Mac's Store # 22161",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22161),
  "location_phone": "(403) 760-8270",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "202 WOLF STREET",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "BANFF",
  "address_province": "Alberta",
  "address_postal": "T1L 1K4",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2000-12-08T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e5538070028a2"),
  "location_id": NumberInt(10270),
  "location_name": "Mac's Store # 22162",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "ESSO",
  "location_number": NumberInt(22162),
  "location_phone": "(403) 730-6303",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "UNIT 100, 11 HIDDEN CREEK DRIVE NW",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CALGARY",
  "address_province": "Alberta",
  "address_postal": "T3A 6K6",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2001-09-09T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e5538070028a4"),
  "location_id": NumberInt(10271),
  "location_name": "Mac's Store # 22163",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "SHELL",
  "location_number": NumberInt(22163),
  "location_phone": "(403) 380-3002",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "110 W.T. HILL BLVD SOUTH",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "LETHBRIDGE",
  "address_province": "Alberta",
  "address_postal": "T1J 4T4",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2002-01-17T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e5538070028a6"),
  "location_id": NumberInt(10272),
  "location_name": "Mac's Store # 22164",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "SHELL",
  "location_number": NumberInt(22164),
  "location_phone": "(403) 381-9300",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "2730 MAYOR MAGRATH DR S.",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "LETHBRIDGE",
  "address_province": "Alberta",
  "address_postal": "T1K 7J5",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2002-02-26T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e5538070028a8"),
  "location_id": NumberInt(10273),
  "location_name": "Mac's Store # 22165",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "ESSO",
  "location_number": NumberInt(22165),
  "location_phone": "(403) 327-1046",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "717 - 6 AVE SOUTH",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "LETHBRIDGE",
  "address_province": "Alberta",
  "address_postal": "T1J 0Z4",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2000-07-17T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e5538070028aa"),
  "location_id": NumberInt(10274),
  "location_name": "Mac's Store # 22166",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "ESSO",
  "location_number": NumberInt(22166),
  "location_phone": "(403) 256-8886",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "#300, 10 CHAPARRAL DRIVE S.E.",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CALGARY",
  "address_province": "Alberta",
  "address_postal": "T2X 3R7",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2000-09-10T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e5538070028ac"),
  "location_id": NumberInt(10275),
  "location_name": "Mac's Store # 22168",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "HUSKY",
  "location_number": NumberInt(22168),
  "location_phone": "(403) 201-8959",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "655 SHAWINIGAN DRIVE SW",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CALGARY",
  "address_province": "Alberta",
  "address_postal": "T2Y 4H2",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2001-04-25T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e5538070028ae"),
  "location_id": NumberInt(10276),
  "location_name": "Mac's Store # 22169",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22169),
  "location_phone": "(403) 257-7852",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "#101, 20 INVERNESS SQUARE SE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CALGARY",
  "address_province": "Alberta",
  "address_postal": "T2Z 1V6",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2001-09-18T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e5538070028b0"),
  "location_id": NumberInt(10277),
  "location_name": "Mac's Store # 22171",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "ESSO",
  "location_number": NumberInt(22171),
  "location_phone": "(403) 948-9750",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Unit 1, 905 - 1 Avenue NW",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "AIRDRIE",
  "address_province": "Alberta",
  "address_postal": "T4B 2X7",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2002-04-09T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e5538070028b2"),
  "location_id": NumberInt(10278),
  "location_name": "Mac's Store # 22172",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22172),
  "location_phone": "(403) 250-1078",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "2000AIRPORT ROAD NE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CALGARY",
  "address_province": "Alberta",
  "address_postal": "T2E 6W5",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2002-08-01T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e5538070028b4"),
  "location_id": NumberInt(10279),
  "location_name": "Mac's Store # 22173",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "SHELL",
  "location_number": NumberInt(22173),
  "location_phone": "(403) 526-7316",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "355 SOUTHRIDGE DRIVE SE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "MEDICINE HAT",
  "address_province": "Alberta",
  "address_postal": "T1B 3S1",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2002-07-17T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e5538070028b6"),
  "location_id": NumberInt(10280),
  "location_name": "Mac's Store # 22174",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "SHELL",
  "location_number": NumberInt(22174),
  "location_phone": "(403) 328-9742",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "329 Bluefox Blvd. North",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "LETHBRIDGE",
  "address_province": "Alberta",
  "address_postal": "T1H 6T3",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2003-02-13T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e5538070028b8"),
  "location_id": NumberInt(10281),
  "location_name": "Mac's Store # 22175",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "SHELL",
  "location_number": NumberInt(22175),
  "location_phone": "(403) 564-4304",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "10505A - 20 Avenue",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "BLAIRMORE",
  "address_province": "Alberta",
  "address_postal": "T0K 0E0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2003-06-11T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e5538070028ba"),
  "location_id": NumberInt(10282),
  "location_name": "Mac's Store # 22176",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22176),
  "location_phone": "(403) 678-4851",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "#117, 712 Bow Valley Trail",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CANMORE",
  "address_province": "Alberta",
  "address_postal": "T1W 2H4",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2004-04-18T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e5538070028bc"),
  "location_id": NumberInt(10283),
  "location_name": "Mac's Store # 22177",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "SHELL",
  "location_number": NumberInt(22177),
  "location_phone": "(403) 394-3851",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "2515 Highlands Road West",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "LETHBRIDGE",
  "address_province": "Alberta",
  "address_postal": "T1J 4X4",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2003-07-24T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e5538070028be"),
  "location_id": NumberInt(10284),
  "location_name": "Mac's Store # 22178",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "ESSO",
  "location_number": NumberInt(22178),
  "location_phone": "(403) 686-7371",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Unit 100, 677 COUGAR RIDGE DRIVE SW",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CALGARY",
  "address_province": "Alberta",
  "address_postal": "T3H 5J2",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2003-03-17T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e5538070028c0"),
  "location_id": NumberInt(10285),
  "location_name": "Mac's Store # 22180",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "PETROCAN",
  "location_number": NumberInt(22180),
  "location_phone": "(403) 241-5138",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "#6006, 11300 Tuscany Boulevard NW",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CALGARY",
  "address_province": "Alberta",
  "address_postal": "T3L 2V7",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2003-11-05T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e5538070028c2"),
  "location_id": NumberInt(10286),
  "location_name": "Mac's Store # 22181",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22181),
  "location_phone": "(403) 203-4706",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Unit #156, 5303 - 68 AVENUE SE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CALGARY",
  "address_province": "Alberta",
  "address_postal": "T2C 4Z2",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2004-08-12T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e5538070028c4"),
  "location_id": NumberInt(10287),
  "location_name": "Mac's Store # 22183",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "PETROCAN",
  "location_number": NumberInt(22183),
  "location_phone": "(403) 547-0070",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "8210 Edgebrook Drive NW",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CALGARY",
  "address_province": "Alberta",
  "address_postal": "T3A 4K9",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2005-01-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e5538070028c6"),
  "location_id": NumberInt(10288),
  "location_name": "Mac's Store # 22184",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22184),
  "location_phone": "(403) 250-8453",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "2000 Airport Road NE D Concourse",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CALGARY",
  "address_province": "Alberta",
  "address_postal": "T2E 6W5",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2005-04-21T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e5538070028c8"),
  "location_id": NumberInt(10289),
  "location_name": "Mac's Store # 22185",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22185),
  "location_phone": "(403) 257-6392",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Bay 3, 90 Cranleigh Drive SE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CALGARY",
  "address_province": "Alberta",
  "address_postal": "T3M 1J7",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2005-01-20T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e5538070028ca"),
  "location_id": NumberInt(10290),
  "location_name": "Mac's Store # 22186",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22186),
  "location_phone": "(403) 207-9142",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "#142, 4242 - 7th Street SE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CALGARY",
  "address_province": "Alberta",
  "address_postal": "T2G 2Y8",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2006-04-16T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e5538070028cc"),
  "location_id": NumberInt(10291),
  "location_name": "Mac's Store # 22187",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22187),
  "location_phone": "(403) 226-0587",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "#8, 20 Panatella Boulevard NW",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CALGARY",
  "address_province": "Alberta",
  "address_postal": "T3K 6K7",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2005-12-19T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e5538070028ce"),
  "location_id": NumberInt(10292),
  "location_name": "Mac's Store # 22188",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "ESSO",
  "location_number": NumberInt(22188),
  "location_phone": "(403) 262-5084",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "4000, 55 Skyview Ranch Road NE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "CALGARY",
  "address_province": "Alberta",
  "address_postal": "T3N 0A6",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2011-03-21T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e5538070028d0"),
  "location_id": NumberInt(10293),
  "location_name": "Mac's Store # 22190",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "SHELL",
  "location_number": NumberInt(22190),
  "location_phone": "(403) 388-4851",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "210 Scenic Dr. S",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "LETHBRIDGE",
  "address_province": "Alberta",
  "address_postal": "T1L 4L3",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e5538070028d2"),
  "location_id": NumberInt(10294),
  "location_name": "Mac's Store # 22556",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22556),
  "location_phone": "(403) 887-4145",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "1 SYLVAN DRIVE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "SYLVAN LAKE",
  "address_province": "Alberta",
  "address_postal": "T4S 1J9",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1999-06-10T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e5538070028d4"),
  "location_id": NumberInt(10295),
  "location_name": "Mac's Store # 22558",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22558),
  "location_phone": "(403) 346-8035",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "3801 ROSS STREET",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "RED DEER",
  "address_province": "Alberta",
  "address_postal": "T4P 1E4",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1999-11-28T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e5538070028d6"),
  "location_id": NumberInt(10296),
  "location_name": "Mac's Store # 22561",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22561),
  "location_phone": "(403) 227-1414",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "5204 - 41 STREET",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "INNISFAIL",
  "address_province": "Alberta",
  "address_postal": "T4G 1G3",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2000-06-25T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e5538070028d8"),
  "location_id": NumberInt(10297),
  "location_name": "Mac's Store # 22564",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22564),
  "location_phone": "(403) 342-2038",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "101, 2127 50TH AVENUE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "RED DEER",
  "address_province": "Alberta",
  "address_postal": "T4R 1Z4",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1999-08-05T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e5538070028da"),
  "location_id": NumberInt(10298),
  "location_name": "Mac's Store # 22645",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22645),
  "location_phone": "(403) 309-8321",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "BAY 3, 420 ALLEN STREET",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "RED DEER",
  "address_province": "Alberta",
  "address_postal": "T4R 2K7",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2002-01-21T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e5538070028dc"),
  "location_id": NumberInt(10299),
  "location_name": "Mac's Store # 22654",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22654),
  "location_phone": "(403) 755-7065",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "6888 - 50 Avenue",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "RED DEER",
  "address_province": "Alberta",
  "address_postal": "T4N 4E3",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2003-02-05T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e5538070028de"),
  "location_id": NumberInt(10300),
  "location_name": "Mac's Store # 22680",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "HUSKY",
  "location_number": NumberInt(22680),
  "location_phone": "(403) 845-2644",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "5107 - 46 Street",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "ROCKY MTN. HOUSE",
  "address_province": "Alberta",
  "address_postal": "T4T 1A6",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2006-01-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e5538070028e0"),
  "location_id": NumberInt(10301),
  "location_name": "Mac's Store # 22693",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22693),
  "location_phone": "(403) 314-1306",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Unit 140, 2950 - 22 Street",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "RED DEER",
  "address_province": "Alberta",
  "address_postal": "T4R 0H9",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2008-04-17T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e5538070028e2"),
  "location_id": NumberInt(10302),
  "location_name": "Mac's Store # 22703",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22703),
  "location_phone": "(403) 341-3945",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "#120, 3 Ironside Street",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "RED DEER",
  "address_province": "Alberta",
  "address_postal": "T4R 3G8",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2010-03-08T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e5538070028e4"),
  "location_id": NumberInt(10303),
  "location_name": "Mac's Store # 22704",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22704),
  "location_phone": "(403) 340-0169",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "#140, 2 Jewell Street",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "RED DEER",
  "address_province": "Alberta",
  "address_postal": "T4P 4G8",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2010-03-08T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e5538070028e6"),
  "location_id": NumberInt(10304),
  "location_name": "Mac's Store # 22705",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SALTA",
  "location_banner": "",
  "location_number": NumberInt(22705),
  "location_phone": "(403) 782-0829",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "#101, 5001 - 52 Street",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "LACOMBE",
  "address_province": "Alberta",
  "address_postal": "T4L 2A6",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2010-09-28T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e5538070028e8"),
  "location_id": NumberInt(10305),
  "location_name": "Mac's Store # 44001",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SASK",
  "location_banner": "",
  "location_number": NumberInt(44001),
  "location_phone": "(306) 922-3890",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "102, 2805 6TH AVE EAST",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "PRINCE ALBERT",
  "address_province": "Saskatchewan",
  "address_postal": "S6V 6Z6",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1998-02-09T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e5538070028ea"),
  "location_id": NumberInt(10306),
  "location_name": "Mac's Store # 44020",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SASK",
  "location_banner": "",
  "location_number": NumberInt(44020),
  "location_phone": "(306) 384-2411",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "2302 33RD STREET WEST",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "SASKATOON",
  "address_province": "Saskatchewan",
  "address_postal": "S7L 0X5",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1998-05-26T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e5538070028ec"),
  "location_id": NumberInt(10307),
  "location_name": "Mac's Store # 44021",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SASK",
  "location_banner": "",
  "location_number": NumberInt(44021),
  "location_phone": "(306) 693-6577",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "526 - 9TH AVENUE S.W.",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "MOOSE JAW",
  "address_province": "Saskatchewan",
  "address_postal": "S6H 5W9",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1998-04-28T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e5538070028ee"),
  "location_id": NumberInt(10308),
  "location_name": "Mac's Store # 44023",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SASK",
  "location_banner": "PETROCAN",
  "location_number": NumberInt(44023),
  "location_phone": "(306) 694-4330",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "1230 - 9TH AVENUE N.W.",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "MOOSE JAW",
  "address_province": "Saskatchewan",
  "address_postal": "S6H 4K1",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1998-04-26T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e5538070028f0"),
  "location_id": NumberInt(10309),
  "location_name": "Mac's Store # 44024",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SASK",
  "location_banner": "",
  "location_number": NumberInt(44024),
  "location_phone": "(306) 665-9060",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "402 - 3RD AVENUE NORTH",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "SASKATOON",
  "address_province": "Saskatchewan",
  "address_postal": "S7K 2T3",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1997-07-02T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e5538070028f2"),
  "location_id": NumberInt(10310),
  "location_name": "Mac's Store # 44025",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SASK",
  "location_banner": "HUSKY",
  "location_number": NumberInt(44025),
  "location_phone": "(306) 955-0911",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "BAY 101 3929 - 8 ST. E.",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "SASKATOON",
  "address_province": "Saskatchewan",
  "address_postal": "S7H 5M2",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1999-05-10T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e5538070028f4"),
  "location_id": NumberInt(10311),
  "location_name": "Mac's Store # 44031",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SASK",
  "location_banner": "",
  "location_number": NumberInt(44031),
  "location_phone": "(306) 955-5666",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "708 CENTRAL AVE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "SASKATOON",
  "address_province": "Saskatchewan",
  "address_postal": "S7N 2G5",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2000-07-16T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e5538070028f6"),
  "location_id": NumberInt(10312),
  "location_name": "Mac's Store # 44032",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SASK",
  "location_banner": "",
  "location_number": NumberInt(44032),
  "location_phone": "(306) 585-0272",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "2116 GRANT ROAD",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "REGINA",
  "address_province": "Saskatchewan",
  "address_postal": "S4S 5C8",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1999-06-29T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e5538070028f8"),
  "location_id": NumberInt(10313),
  "location_name": "Mac's Store # 44034",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SASK",
  "location_banner": "PETROCAN",
  "location_number": NumberInt(44034),
  "location_phone": "(306) 242-5515",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "103 RUTH STREET",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "SASKATOON",
  "address_province": "Saskatchewan",
  "address_postal": "S7J 0K7",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1999-05-20T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e5538070028fa"),
  "location_id": NumberInt(10314),
  "location_name": "Mac's Store # 44036",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SASK",
  "location_banner": "",
  "location_number": NumberInt(44036),
  "location_phone": "(306) 343-8388",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "9, 1010 TAYLOR STREET EAST",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "SASKATOON",
  "address_province": "Saskatchewan",
  "address_postal": "S7H 1W4",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1998-07-28T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e5538070028fc"),
  "location_id": NumberInt(10315),
  "location_name": "Mac's Store # 44037",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SASK",
  "location_banner": "",
  "location_number": NumberInt(44037),
  "location_phone": "(306) 347-7866",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "2108 ALBERT STREET",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "REGINA",
  "address_province": "Saskatchewan",
  "address_postal": "S4P 2T9",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1999-09-02T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e5538070028fe"),
  "location_id": NumberInt(10316),
  "location_name": "Mac's Store # 44044",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SASK",
  "location_banner": "",
  "location_number": NumberInt(44044),
  "location_phone": "(306) 384-6211",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "3730 DIEFENBAKER DRIVE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "SASKATOON",
  "address_province": "Saskatchewan",
  "address_postal": "S7L 6R9",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1998-12-17T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e553807002900"),
  "location_id": NumberInt(10317),
  "location_name": "Mac's Store # 44045",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SASK",
  "location_banner": "",
  "location_number": NumberInt(44045),
  "location_phone": "(306) 249-2777",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "431 KENDERDINE ROAD",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "SASKATOON",
  "address_province": "Saskatchewan",
  "address_postal": "S7N 3S1",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2001-02-11T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e553807002902"),
  "location_id": NumberInt(10318),
  "location_name": "Mac's Store # 44046",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SASK",
  "location_banner": "",
  "location_number": NumberInt(44046),
  "location_phone": "(306) 668-6822",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "430 RUSSELL ROAD",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "SASKATOON",
  "address_province": "Saskatchewan",
  "address_postal": "S7K 6K9",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1998-11-04T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e553807002904"),
  "location_id": NumberInt(10319),
  "location_name": "Mac's Store # 44049",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SASK",
  "location_banner": "",
  "location_number": NumberInt(44049),
  "location_phone": "(306) 586-4044",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "1101K KRAMER BOULEVARD",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "REGINA",
  "address_province": "Saskatchewan",
  "address_postal": "S4S 5W4",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2003-11-29T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e553807002906"),
  "location_id": NumberInt(10320),
  "location_name": "Mac's Store # 44050",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SASK",
  "location_banner": "",
  "location_number": NumberInt(44050),
  "location_phone": "(306) 949-2113",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "2760 Montague Street",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "REGINA",
  "address_province": "Saskatchewan",
  "address_postal": "S4S 0J9",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2006-04-04T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e553807002908"),
  "location_id": NumberInt(10321),
  "location_name": "Mac's Store # 44051",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SASK",
  "location_banner": "",
  "location_number": NumberInt(44051),
  "location_phone": "(306) 692-3680",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "1202 - Main Street North",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "MOOSE JAW",
  "address_province": "Saskatchewan",
  "address_postal": "S6H 3L1",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2007-06-12T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e55380700290a"),
  "location_id": NumberInt(10322),
  "location_name": "Mac's Store # 44052",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SASK",
  "location_banner": "",
  "location_number": NumberInt(44052),
  "location_phone": "(306) 242-2477",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "# 1 Campus Drive",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "SASKATOON",
  "address_province": "Saskatchewan",
  "address_postal": "S7N 5A3",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2011-01-03T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e55380700290c"),
  "location_id": NumberInt(10323),
  "location_name": "Mac's Store # 44053",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SASK",
  "location_banner": "SHELL",
  "location_number": NumberInt(44053),
  "location_phone": "(306) 752-2358",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "210 Saskatchewan Avenue West",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "MELFORT",
  "address_province": "Saskatchewan",
  "address_postal": "S0E 1A0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2011-06-22T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e55380700290e"),
  "location_id": NumberInt(10324),
  "location_name": "Mac's Store # 44054",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SASK",
  "location_banner": "SHELL",
  "location_number": NumberInt(44054),
  "location_phone": "(306) 842-2946",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "60 Government Road S.",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Weyburn",
  "address_province": "Saskatchewan",
  "address_postal": "S4H 2A3",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2011-06-20T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510a4df03d5e553807002910"),
  "location_id": NumberInt(10325),
  "location_name": "Mac's Store # 44055",
  "company_id": NumberInt(10002),
  "location_type": NumberInt(4),
  "location_region": "SASK",
  "location_banner": "SHELL",
  "location_number": NumberInt(44055),
  "location_phone": "(306) 782-0815",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "140 Smith Street E",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "YORKTON",
  "address_province": "Saskatchewan",
  "address_postal": "S3N 3Z7",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("2011-06-28T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510b26ee9c76840a6400019c"),
  "address_city": "Ho Chi Minh",
  "address_country": {
    "address_id": NumberInt(75),
    "address_country": "Viet Nam"
  },
  "address_line_1": "122 Hoàng Hoa Thám",
  "address_line_2": "",
  "address_line_3": "",
  "address_postal": "TP HCM",
  "address_province": "",
  "address_unit": "",
  "close_date": null,
  "company_id": NumberInt(10000),
  "location_banner": "",
  "location_fax": "",
  "location_id": NumberInt(10326),
  "location_name": "Anvy Inc. VN",
  "location_number": NumberInt(2),
  "location_phone": "(84) 0902436760",
  "location_region": "",
  "location_type": NumberInt(2),
  "open_date": ISODate("2012-10-31T17:00:00.0Z"),
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000afe"),
  "location_id": NumberInt(10327),
  "location_name": "Fas Gas Northside Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40001),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "5926 - 54th Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Red Deer",
  "address_province": "Alberta",
  "address_postal": "T4N 4M6",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000b01"),
  "location_id": NumberInt(10328),
  "location_name": "Fas Gas West End Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40002),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 6091, 5107, 50th Street",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Innisfail",
  "address_province": "Alberta",
  "address_postal": "T4G 1S7",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000b0a"),
  "location_id": NumberInt(10331),
  "location_name": "Fas Gas Westview Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40005),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "4503 - 47th Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Rocky Mountain House",
  "address_province": "Alberta",
  "address_postal": "T4T 1C5",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000b0d"),
  "location_id": NumberInt(10332),
  "location_name": "Fas Gas Heartland Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40006),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "6002 - 50th Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Stettler",
  "address_province": "Alberta",
  "address_postal": "T0C 2L2",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000b10"),
  "location_id": NumberInt(10333),
  "location_name": "Drumheller Fas Gas Plus",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40007),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 2188",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Drumheller",
  "address_province": "Alberta",
  "address_postal": "T0J 0Y0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000b13"),
  "location_id": NumberInt(10334),
  "location_name": "Fas Gas Westpark Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40008),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "4305 - 55th Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Red Deer",
  "address_province": "Alberta",
  "address_postal": "T4N 4N7",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000b16"),
  "location_id": NumberInt(10335),
  "location_name": "Fas Gas Battle River Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40009),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "5302 - 53rd Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Ponoka",
  "address_province": "Alberta",
  "address_postal": "T4J 1H7",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000b19"),
  "location_id": NumberInt(10336),
  "location_name": "Fas Gas Junction Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGO",
  "location_number": NumberInt(40010),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 29 - Site 600 - R R 6",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Saskatoon",
  "address_province": "Saskatchewan",
  "address_postal": "S7K 3J9",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000b1f"),
  "location_id": NumberInt(10338),
  "location_name": "Fas Gas Didsbury Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40012),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 1702",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Didsbury",
  "address_province": "Alberta",
  "address_postal": "T0M 0W0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000b22"),
  "location_id": NumberInt(10339),
  "location_name": "Fas Gas Black Gold Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40014),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "4811 - 50th St",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Leduc",
  "address_province": "Alberta",
  "address_postal": "T9E 6W5",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000b28"),
  "location_id": NumberInt(10341),
  "location_name": "Fas Gas Kingsway Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40016),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "201 King Street",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Spruce Grove",
  "address_province": "Alberta",
  "address_postal": "T7X 2Y1",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000b2b"),
  "location_id": NumberInt(10342),
  "location_name": "Fas Gas City Centre Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40017),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "4904 - 49th St",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Wetaskiwin",
  "address_province": "Alberta",
  "address_postal": "T9A 1H3",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000b2e"),
  "location_id": NumberInt(10343),
  "location_name": "Clyde Corner",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40019),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 5569",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Westlock",
  "address_province": "Alberta",
  "address_postal": "T7P 2P6",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000b31"),
  "location_id": NumberInt(10344),
  "location_name": "Fas Gas Main Street Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40020),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "128 Main St",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Airdrie",
  "address_province": "Alberta",
  "address_postal": "T4B 0P8",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000b34"),
  "location_id": NumberInt(10345),
  "location_name": "Fas Gas Mount Pleasant Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40021),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "5807 - 48th Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Camrose",
  "address_province": "Alberta",
  "address_postal": "T4V 0J9",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000b37"),
  "location_id": NumberInt(10346),
  "location_name": "Moosomin Fas Gas Plus",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40022),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 1229",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Moosomin",
  "address_province": "Saskatchewan",
  "address_postal": "S0G 3N0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000b3a"),
  "location_id": NumberInt(10347),
  "location_name": "Fas Gas Parkland Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50023),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "5107 - 48th St",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Stony Plain",
  "address_province": "Alberta",
  "address_postal": "T7Z 1X7",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000b40"),
  "location_id": NumberInt(10349),
  "location_name": "Fas Gas Pembina Valley Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40025),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 6128",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Drayton Valley",
  "address_province": "Alberta",
  "address_postal": "T7A 1R6",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000b43"),
  "location_id": NumberInt(10350),
  "location_name": "Fas Gas Taber Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40026),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "5014 - 47th Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Taber",
  "address_province": "Alberta",
  "address_postal": "T1G 1T9",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000b46"),
  "location_id": NumberInt(10351),
  "location_name": "Fas Gas Broadway",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40028),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "1821 Broadway Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Saskatoon",
  "address_province": "Saskatchewan",
  "address_postal": "S7H 2B6",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000b49"),
  "location_id": NumberInt(10352),
  "location_name": "Hudson's Hope Gas Bar",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50032),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 60",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Hudson's Hope",
  "address_province": "British Columbia",
  "address_postal": "V0G 1V0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000b4c"),
  "location_id": NumberInt(10353),
  "location_name": "Fas Gas Brandon",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40035),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "1209 Richmond Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Brandon",
  "address_province": "Manitoba",
  "address_postal": "R7A 1M5",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000b4f"),
  "location_id": NumberInt(10354),
  "location_name": "Fas Gas 118th Ave Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50036),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "15411 - 118th Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Edmonton",
  "address_province": "Alberta",
  "address_postal": "T5V 1C2",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000b52"),
  "location_id": NumberInt(10355),
  "location_name": "Fas Gas Steinbach Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40037),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "#60 pth 52 west",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Steinbach",
  "address_province": "Manitoba",
  "address_postal": "R5G 1X7",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000b55"),
  "location_id": NumberInt(10356),
  "location_name": "Fas Gas Millwoods Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40039),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "2831 - 66th St",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Edmonton",
  "address_province": "Alberta",
  "address_postal": "T6K 4C8",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000b58"),
  "location_id": NumberInt(10357),
  "location_name": "Fas Gas Southside Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40044),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "3202 - 49th Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Red Deer",
  "address_province": "Alberta",
  "address_postal": "T4N 6R5",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000b5b"),
  "location_id": NumberInt(10358),
  "location_name": "Fas Gas Highwood Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40045),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "219 Centre St S",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "High River",
  "address_province": "Alberta",
  "address_postal": "T1V 1M3",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000b5e"),
  "location_id": NumberInt(10359),
  "location_name": "Fas Gas Lakeview Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40046),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "4405 - 50th St",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Sylvan Lake",
  "address_province": "Alberta",
  "address_postal": "T4S 1J9",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000b61"),
  "location_id": NumberInt(10360),
  "location_name": "Fas Gas Sheep River Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40047),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "125 Elizabeth St",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Okotoks",
  "address_province": "Alberta",
  "address_postal": "T0L 1T3",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000b64"),
  "location_id": NumberInt(10361),
  "location_name": "Fas Gas Demmitt",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40048),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 29",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Demmitt",
  "address_province": "Alberta",
  "address_postal": "T0H 1C0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000b67"),
  "location_id": NumberInt(10362),
  "location_name": "Fas Gas Calmar Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40050),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 1200",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Calmar",
  "address_province": "Alberta",
  "address_postal": "T0C 0V0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000b6a"),
  "location_id": NumberInt(10363),
  "location_name": "Fas Gas Canal Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40051),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 1918",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Brooks",
  "address_province": "Alberta",
  "address_postal": "T1R 1C6",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000b6d"),
  "location_id": NumberInt(10364),
  "location_name": "Fas Gas Lakeland Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40052),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "4609 - 50th Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Bonnyville",
  "address_province": "Alberta",
  "address_postal": "T9N 1A5",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000b70"),
  "location_id": NumberInt(10365),
  "location_name": "Fas Gas Yellowhead Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40053),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "4210 - 44th St",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Lloydminster",
  "address_province": "Saskatchewan",
  "address_postal": "S9V 1Z1",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000b73"),
  "location_id": NumberInt(10366),
  "location_name": "Fas Gas Lethbridge",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40055),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "3 - 4103 - 4th Ave S",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Lethbridge",
  "address_province": "Alberta",
  "address_postal": "T1J 4B3",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000b76"),
  "location_id": NumberInt(10367),
  "location_name": "Fas Gas West Central Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40057),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 6868",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Edson",
  "address_province": "Alberta",
  "address_postal": "T7E 1V2",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000b79"),
  "location_id": NumberInt(10368),
  "location_name": "Fas Gas Red Earth Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40058),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 99, Hwy 88",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Red Earth Creek",
  "address_province": "Alberta",
  "address_postal": "T0G 1X0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000b7c"),
  "location_id": NumberInt(10369),
  "location_name": "Fas Gas Wainwright Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50059),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "1046 - 14th Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Wainwright",
  "address_province": "Alberta",
  "address_postal": "T9W 1J8",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000b7f"),
  "location_id": NumberInt(10370),
  "location_name": "Fas Gas Prairie Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40062),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "9702 - 100th St",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Grande Prairie",
  "address_province": "Alberta",
  "address_postal": "T8V 2L3",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000b82"),
  "location_id": NumberInt(10371),
  "location_name": "Fas Gas Slave Lake Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40063),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "700 Main St SW",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Slave Lake",
  "address_province": "Alberta",
  "address_postal": "T0G 2A0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000b85"),
  "location_id": NumberInt(10372),
  "location_name": "Fas Gas Penhold Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40064),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 810",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Penhold",
  "address_province": "Alberta",
  "address_postal": "T0M 1R0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000b88"),
  "location_id": NumberInt(10373),
  "location_name": "Fas Gas Oil Sands Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50065),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "10102 Franklin Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Ft. McMurray",
  "address_province": "Alberta",
  "address_postal": "T9H 2K9",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000b8b"),
  "location_id": NumberInt(10374),
  "location_name": "Fas Gas Parkway Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGO",
  "location_number": NumberInt(40067),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "1345 Switzer Dr",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Hinton",
  "address_province": "Alberta",
  "address_postal": "T7V 2B5",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000b8e"),
  "location_id": NumberInt(10375),
  "location_name": "Fas Gas High Street Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40069),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "874 High St W",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Moose Jaw",
  "address_province": "Saskatchewan",
  "address_postal": "S6H 1T9",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000b91"),
  "location_id": NumberInt(10376),
  "location_name": "Fas Gas Plus Stafford Drive Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50072),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "431 Stafford Dr N",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Lethbridge",
  "address_province": "Alberta",
  "address_postal": "T1H 2A7",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000b94"),
  "location_id": NumberInt(10377),
  "location_name": "Fas Gas Estevan Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40073),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "1240 - 6th St",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Estevan",
  "address_province": "Saskatchewan",
  "address_postal": "S4A 1B1",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000b97"),
  "location_id": NumberInt(10378),
  "location_name": "Fas Gas Tisdale",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGO",
  "location_number": NumberInt(40075),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 1716",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Tisdale",
  "address_province": "Saskatchewan",
  "address_postal": "S0E 1T0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000b9a"),
  "location_id": NumberInt(10379),
  "location_name": "Fas Gas Barrhead Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40077),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 4155",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Barrhead",
  "address_province": "Alberta",
  "address_postal": "T7N 1A2",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000b9d"),
  "location_id": NumberInt(10380),
  "location_name": "Fas Gas Circle Drive Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40078),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "1 - 415 Circle Dr E",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Saskatoon",
  "address_province": "Saskatchewan",
  "address_postal": "S7K 1W5",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000ba0"),
  "location_id": NumberInt(10381),
  "location_name": "Fas Gas Railway Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40081),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "391 - Railway Ave E",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "North Battleford",
  "address_province": "Saskatchewan",
  "address_postal": "S9A 3C8",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000ba3"),
  "location_id": NumberInt(10382),
  "location_name": "Fas Gas Burnt Lake Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50082),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "101 Burnt Lake Trail",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Red Deer County",
  "address_province": "Alberta",
  "address_postal": "T4S 2L4",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000ba6"),
  "location_id": NumberInt(10383),
  "location_name": "Fas Gas Refinery Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40083),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 368",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Bowden",
  "address_province": "Alberta",
  "address_postal": "T0M 0K0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000ba9"),
  "location_id": NumberInt(10384),
  "location_name": "Fas Gas Ste Rose Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGO",
  "location_number": NumberInt(50084),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 820",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Ste Rose du Lac",
  "address_province": "Manitoba",
  "address_postal": "R0L 1S0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000bac"),
  "location_id": NumberInt(10385),
  "location_name": "Fas Gas Albert Street Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40089),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "2565 - 7th Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Regina",
  "address_province": "Saskatchewan",
  "address_postal": "S4R 1W3",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000baf"),
  "location_id": NumberInt(10386),
  "location_name": "Fas Gas Devon Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40090),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "3rd St. Lawrence Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Devon",
  "address_province": "Alberta",
  "address_postal": "T9G 1H1",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000bb2"),
  "location_id": NumberInt(10387),
  "location_name": "Fas Gas Blackfalds Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40093),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 1540",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Blackfalds",
  "address_province": "Alberta",
  "address_postal": "T0M 0J0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000bb5"),
  "location_id": NumberInt(10388),
  "location_name": "Fas Gas Grand Centre Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40094),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "4602 - 50th St",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Cold Lake",
  "address_province": "Alberta",
  "address_postal": "T9M 1S6",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000bb8"),
  "location_id": NumberInt(10389),
  "location_name": "Fas Gas Yorkton Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40096),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "150 Broadway St W",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Yorkton",
  "address_province": "Saskatchewan",
  "address_postal": "S3N 0M4",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000bbb"),
  "location_id": NumberInt(10390),
  "location_name": "Winkler Fas Gas",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGO",
  "location_number": NumberInt(40097),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "103 - 1st St",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Winkler",
  "address_province": "Manitoba",
  "address_postal": "R6W 3M1",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000bbe"),
  "location_id": NumberInt(10391),
  "location_name": "Fas Gas Trans Canada Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40100),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "1020 T C H",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Golden",
  "address_province": "British Columbia",
  "address_postal": "V0A 1H1",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000bc1"),
  "location_id": NumberInt(10392),
  "location_name": "Fas Gas Strathmore Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40101),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "340 - 3rd Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Strathmore",
  "address_province": "Alberta",
  "address_postal": "T1P 1B4",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000bc4"),
  "location_id": NumberInt(10393),
  "location_name": "Fas Gas Dryden Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50103),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "-",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Dryden",
  "address_province": "Ontario",
  "address_postal": "P8N 2Y8",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000bc7"),
  "location_id": NumberInt(10394),
  "location_name": "Fas Gas Beaverlodge",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGO",
  "location_number": NumberInt(50104),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 1107",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Beaverlodge",
  "address_province": "Alberta",
  "address_postal": "T0H 0C0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000bca"),
  "location_id": NumberInt(10395),
  "location_name": "Fas Gas Biggar",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGO",
  "location_number": NumberInt(40105),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 452",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Biggar",
  "address_province": "Saskatchewan",
  "address_postal": "S0K 0M0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000bcd"),
  "location_id": NumberInt(10396),
  "location_name": "Chetwynd Fas Gas",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40109),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 269",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Chetwynd",
  "address_province": "British Columbia",
  "address_postal": "VOC 1J0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000bd0"),
  "location_id": NumberInt(10397),
  "location_name": "Fas Gas Ashcroft",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGO",
  "location_number": NumberInt(40111),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 280",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Ashcroft",
  "address_province": "British Columbia",
  "address_postal": "VOK 1A0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000bd3"),
  "location_id": NumberInt(10398),
  "location_name": "Athabasca Fas Gas",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40112),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "4711 - 50th St",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Athabasca",
  "address_province": "Alberta",
  "address_postal": "T9S 1A3",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000bd6"),
  "location_id": NumberInt(10399),
  "location_name": "Fas Gas Pincher Creek Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40113),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 2153",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Pincher Creek",
  "address_province": "Alberta",
  "address_postal": "T0K 1W0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000bd9"),
  "location_id": NumberInt(10400),
  "location_name": "Fas Gas Ft. Nelson",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40116),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 988",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Ft. Nelson",
  "address_province": "British Columbia",
  "address_postal": "V0C 1R0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000bdc"),
  "location_id": NumberInt(10401),
  "location_name": "Fas Gas Hanna",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGO",
  "location_number": NumberInt(40119),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 1510",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Hanna",
  "address_province": "Alberta",
  "address_postal": "T0J 1P0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000bdf"),
  "location_id": NumberInt(10402),
  "location_name": "Fas Gas Centennial Corner",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40120),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "2711 Westsyde Rd",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Kamloops",
  "address_province": "British Columbia",
  "address_postal": "V2B 7E1",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000be2"),
  "location_id": NumberInt(10403),
  "location_name": "Fas Gas Canmore Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40123),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "510 Bow Valley Tr",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Canmore",
  "address_province": "Alberta",
  "address_postal": "T1W 1N9",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000be5"),
  "location_id": NumberInt(10404),
  "location_name": "Fas Gas Millet Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40128),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 337",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Millet",
  "address_province": "Alberta",
  "address_postal": "T0C 1Z0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000be8"),
  "location_id": NumberInt(10405),
  "location_name": "Fas Gas Ponoka",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGO",
  "location_number": NumberInt(50131),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "4508 - 39th Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Ponoka",
  "address_province": "Alberta",
  "address_postal": "T4J 1B5",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000beb"),
  "location_id": NumberInt(10406),
  "location_name": "Fas Gas Smoky Lake Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40132),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 1008",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Smoky Lake",
  "address_province": "Alberta",
  "address_postal": "T0A 3C0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000bee"),
  "location_id": NumberInt(10407),
  "location_name": "Fas Gas Parkland Village",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40134),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "34 - 53222 - R R 272",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Spruce Grove",
  "address_province": "Alberta",
  "address_postal": "T7X 3N4",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000bf1"),
  "location_id": NumberInt(10408),
  "location_name": "Fas Gas Van Horne Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40138),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "323 Van Horne St",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Cranbrook",
  "address_province": "British Columbia",
  "address_postal": "V1C 1Z6",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000bf4"),
  "location_id": NumberInt(10409),
  "location_name": "Fas Gas Walleye Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40139),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 208",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Nipawin",
  "address_province": "Saskatchewan",
  "address_postal": "S0E 1E0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000bf7"),
  "location_id": NumberInt(10410),
  "location_name": "Fas Gas Kootenay Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40140),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "1920 Kootenay St N",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Cranbrook",
  "address_province": "British Columbia",
  "address_postal": "V1C 3N6",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000bfa"),
  "location_id": NumberInt(10411),
  "location_name": "Fas Gas 32nd Street West Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50142),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "265 - 32nd St W",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Prince Albert",
  "address_province": "Saskatchewan",
  "address_postal": "S6V 5Z2",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000bfd"),
  "location_id": NumberInt(10412),
  "location_name": "Fas Gas Carry Plaza Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40143),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Unit H - 3215 Dunmore Rd SE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Medicine Hat",
  "address_province": "Alberta",
  "address_postal": "T1B 2H2",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000c00"),
  "location_id": NumberInt(10413),
  "location_name": "Fas Gas Calgary Trail South Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50147),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "3006 Calgary Tr SB",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Edmonton",
  "address_province": "Alberta",
  "address_postal": "T5J 5J5",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000c03"),
  "location_id": NumberInt(10414),
  "location_name": "Fas Gas Willow Park Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40148),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "9925 Fairmount Dr SE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Calgary",
  "address_province": "Alberta",
  "address_postal": "T2J 0S2",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000c06"),
  "location_id": NumberInt(10415),
  "location_name": "Fas Gas 9th Street Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40150),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 657",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Meadow Lake",
  "address_province": "Saskatchewan",
  "address_postal": "S9X 1Y5",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000c09"),
  "location_id": NumberInt(10416),
  "location_name": "Fas Gas Kim's Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGO",
  "location_number": NumberInt(50151),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 303",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "St. Walburg",
  "address_province": "Saskatchewan",
  "address_postal": "S0M 2T0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000c0c"),
  "location_id": NumberInt(10417),
  "location_name": "Fas Gas Sundre Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40153),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 1839",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Sundre",
  "address_province": "Alberta",
  "address_postal": "T0M 1X0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000c0f"),
  "location_id": NumberInt(10418),
  "location_name": "Fas Gas High Country Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50157),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 951",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Black Diamond",
  "address_province": "Alberta",
  "address_postal": "T0L 0H0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000c12"),
  "location_id": NumberInt(10419),
  "location_name": "Fas Gas Gravelbourg",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGO",
  "location_number": NumberInt(50159),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "PO Box 10",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Gravelbourg",
  "address_province": "Saskatchewan",
  "address_postal": "S0H 1X0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000c15"),
  "location_id": NumberInt(10420),
  "location_name": "Warburg Fas Gas",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGO",
  "location_number": NumberInt(50160),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 27",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Warburg",
  "address_province": "Alberta",
  "address_postal": "T0C 2T0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000c18"),
  "location_id": NumberInt(10421),
  "location_name": "Fas Gas Crossroads Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGO",
  "location_number": NumberInt(40162),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 667",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Forestburg",
  "address_province": "Alberta",
  "address_postal": "T0B 1N0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000c1b"),
  "location_id": NumberInt(10422),
  "location_name": "Squirrely's Gas Bar",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGO",
  "location_number": NumberInt(50164),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 757",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Lac La Biche",
  "address_province": "Alberta",
  "address_postal": "T0A 2C0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000c1e"),
  "location_id": NumberInt(10423),
  "location_name": "Fas Gas Swan River Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40165),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 629",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Swan River",
  "address_province": "Manitoba",
  "address_postal": "R0L 1Z0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000c21"),
  "location_id": NumberInt(10424),
  "location_name": "Fas Gas Raymond Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40166),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 677",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Raymond",
  "address_province": "Alberta",
  "address_postal": "T0K 2S0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000c24"),
  "location_id": NumberInt(10425),
  "location_name": "Two Hills Fas Gas",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGO",
  "location_number": NumberInt(50168),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 539",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Two Hills",
  "address_province": "Alberta",
  "address_postal": "T0B 4K0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000c27"),
  "location_id": NumberInt(10426),
  "location_name": "Fas Gas Riversdale Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGO",
  "location_number": NumberInt(40169),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "300 Ave H S",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Saskatoon",
  "address_province": "Saskatchewan",
  "address_postal": "S7M 1W3",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000c2a"),
  "location_id": NumberInt(10427),
  "location_name": "Fas Gas Grande Cache Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40171),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 209",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Grande Cache",
  "address_province": "Alberta",
  "address_postal": "T0E 0Y0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000c2d"),
  "location_id": NumberInt(10428),
  "location_name": "Fas Gas Queensway Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGO",
  "location_number": NumberInt(40173),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "1977 Queensway St",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Prince George",
  "address_province": "British Columbia",
  "address_postal": "V2L 1M1",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000c30"),
  "location_id": NumberInt(10429),
  "location_name": "McLennan Fas Gas",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGO",
  "location_number": NumberInt(50174),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 180",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "McLennan",
  "address_province": "Alberta",
  "address_postal": "T0H 2L0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000c33"),
  "location_id": NumberInt(10430),
  "location_name": "Fas Gas Kimberley Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40177),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "545 Wallinger Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Kimberley",
  "address_province": "British Columbia",
  "address_postal": "V1A 1Z8",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000c36"),
  "location_id": NumberInt(10431),
  "location_name": "Elkford Mini-Mart",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGO",
  "location_number": NumberInt(40178),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 1299",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Elkford",
  "address_province": "British Columbia",
  "address_postal": "V0B 1H0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000c39"),
  "location_id": NumberInt(10432),
  "location_name": "Fas Gas Frank Slide Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40182),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 300",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Blairmore",
  "address_province": "Alberta",
  "address_postal": "T0K 0E0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000c3c"),
  "location_id": NumberInt(10433),
  "location_name": "Carman Fas Gas",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40184),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 2120",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Carman",
  "address_province": "Manitoba",
  "address_postal": "R0G 0J0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000c3f"),
  "location_id": NumberInt(10434),
  "location_name": "Fas Gas The Pas Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40187),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 658",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "The Pas",
  "address_province": "Manitoba",
  "address_postal": "R9A 1K7",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000c42"),
  "location_id": NumberInt(10435),
  "location_name": "Fas Gas Missississippi Jack's",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50190),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "90 Granada Blvd",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Sherwood Park",
  "address_province": "Alberta",
  "address_postal": "T8A 5J2",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000c45"),
  "location_id": NumberInt(10436),
  "location_name": "Fas Gas Keremeos Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40191),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "3163 Hwy 3",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Keremeos",
  "address_province": "British Columbia",
  "address_postal": "V0X 1N1",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000c48"),
  "location_id": NumberInt(10437),
  "location_name": "Fas Gas Brentwood Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40192),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "54 Brentwood Blvd",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Sherwood Park",
  "address_province": "Alberta",
  "address_postal": "T8A 2H6",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000c4b"),
  "location_id": NumberInt(10438),
  "location_name": "Fas Gas Grande Prairie Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40195),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "10506 - 100th Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Grande Prairie",
  "address_province": "Alberta",
  "address_postal": "T8V OV9",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000c4e"),
  "location_id": NumberInt(10439),
  "location_name": "Fas Gas Northside Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40196),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "5640 - 50th Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Lloydminster",
  "address_province": "Alberta",
  "address_postal": "T9V 0X5",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000c51"),
  "location_id": NumberInt(10440),
  "location_name": "Fas Gas Ft. St. John Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40201),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "10812 Alaska Rd",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Fort St. John",
  "address_province": "British Columbia",
  "address_postal": "V1J 5T5",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000c54"),
  "location_id": NumberInt(10441),
  "location_name": "Fas Gas Portage Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40203),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "1819 Saskatchewan Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Portage La Prairie",
  "address_province": "Manitoba",
  "address_postal": "R1N 0N9",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000c57"),
  "location_id": NumberInt(10442),
  "location_name": "Fas Gas Plus Swift Current",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40204),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "455 - North Service Rd E",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Swift Current",
  "address_province": "Saskatchewan",
  "address_postal": "S9H 3T7",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000c5a"),
  "location_id": NumberInt(10443),
  "location_name": "Fas Gas Onanole Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50205),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "PO Box 520",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Onanole",
  "address_province": "Manitoba",
  "address_postal": "R0J 1N0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000c5d"),
  "location_id": NumberInt(10444),
  "location_name": "Fas Gas Redwater Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50206),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "4808 - 48th St",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Redwater",
  "address_province": "Alberta",
  "address_postal": "T0A 2W0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000c60"),
  "location_id": NumberInt(10445),
  "location_name": "Fas Gas Selkirk Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGO",
  "location_number": NumberInt(40208),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "12 Main St",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Selkirk",
  "address_province": "Manitoba",
  "address_postal": "R1A 1P4",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000c63"),
  "location_id": NumberInt(10446),
  "location_name": "Fas Gas Neepawa Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40209),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 487",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Neepawa",
  "address_province": "Manitoba",
  "address_postal": "R0J 1H0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000c66"),
  "location_id": NumberInt(10447),
  "location_name": "Mac's Convenience Store # 2714",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50210),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "1, 10511 - 84 Avenue",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Grande Prairie",
  "address_province": "Alberta",
  "address_postal": "T8V 7G4",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000c69"),
  "location_id": NumberInt(10448),
  "location_name": "Fas Gas Southway Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50211),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "17 Gasoline Alley East",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Red Deer County",
  "address_province": "Alberta",
  "address_postal": "T4E 1B3",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000c6c"),
  "location_id": NumberInt(10449),
  "location_name": "Fas Gas Thompson Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40214),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "55 Cree Rd",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Thompson",
  "address_province": "Manitoba",
  "address_postal": "R8N 0B9",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000c6f"),
  "location_id": NumberInt(10450),
  "location_name": "Dauphin Fas Gas Plus",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40217),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "904 Main St S",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Dauphin",
  "address_province": "Manitoba",
  "address_postal": "R7N 1M2",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000c72"),
  "location_id": NumberInt(10451),
  "location_name": "Fas Gas Highway 15 Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40219),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "10102 - 88th Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Ft. Saskatchewan",
  "address_province": "Alberta",
  "address_postal": "T8L 4J9",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000c75"),
  "location_id": NumberInt(10452),
  "location_name": "Forest Grove Fas Gas",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40220),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "6592 - Hwy 97A",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Enderby",
  "address_province": "British Columbia",
  "address_postal": "V0E 1V3",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000c78"),
  "location_id": NumberInt(10453),
  "location_name": "Fas Gas Mayerthorpe Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGO",
  "location_number": NumberInt(40224),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 990",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Mayerthorpe",
  "address_province": "Alberta",
  "address_postal": "T0E 1N0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000c7b"),
  "location_id": NumberInt(10454),
  "location_name": "Haines Junction",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGO",
  "location_number": NumberInt(50225),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 5542",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Haines Junction",
  "address_province": "Yukon",
  "address_postal": "Y0B 1L0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000c7e"),
  "location_id": NumberInt(10455),
  "location_name": "Airport Chalet Fas Gas",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGO",
  "location_number": NumberInt(40226),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "2 Burns Rd",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Whitehorse",
  "address_province": "Yukon",
  "address_postal": "Y1A 4Z3",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000c81"),
  "location_id": NumberInt(10456),
  "location_name": "Fas Gas Kopper King",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50228),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "91888 B Alaska Hwy",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Whitehorse",
  "address_province": "Yukon",
  "address_postal": "Y1A 5B7",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000c84"),
  "location_id": NumberInt(10457),
  "location_name": "1202 Motor Inn",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGO",
  "location_number": NumberInt(50231),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Mile 1202 - Alaska Hwy",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Beaver Creek",
  "address_province": "Yukon",
  "address_postal": "Y0B 1A0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000c87"),
  "location_id": NumberInt(10458),
  "location_name": "Talbot Arm Motel",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGO",
  "location_number": NumberInt(50232),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "General Delivery",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Destruction Bay",
  "address_province": "Yukon",
  "address_postal": "Y0B 1H0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000c8a"),
  "location_id": NumberInt(10459),
  "location_name": "Surrey Green Market",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50235),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "7999 King George Highway",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Surrey",
  "address_province": "British Columbia",
  "address_postal": "V3W 5B3",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000c8d"),
  "location_id": NumberInt(10460),
  "location_name": "Fas Gas Cardston Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40240),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "PO Box 1749",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Cardston",
  "address_province": "Alberta",
  "address_postal": "T0K 0K0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000c90"),
  "location_id": NumberInt(10461),
  "location_name": "Westpoint Fas Gas Grande Prairie",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40249),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "101-8314 Westpointe Drive",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Grande Prairie",
  "address_province": "Alberta",
  "address_postal": "T8W 2R2",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000c93"),
  "location_id": NumberInt(10462),
  "location_name": "Fas Gas Plus Dawson Creek",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40251),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "1304 Alaska Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Dawson Creek",
  "address_province": "British Columbia",
  "address_postal": "V1G 1Z3",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000c96"),
  "location_id": NumberInt(10463),
  "location_name": "Vegreville Fas Gas",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40252),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "6813 - Hwy 16A",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Vegreville",
  "address_province": "Alberta",
  "address_postal": "T9C 0A3",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000c99"),
  "location_id": NumberInt(10464),
  "location_name": "Delta Fas Gas Plus",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50254),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "11614 - 96 Avenue",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Delta",
  "address_province": "British Columbia",
  "address_postal": "V4C 3W7",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000c9c"),
  "location_id": NumberInt(10465),
  "location_name": "Rimbey Fas Gas",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGO",
  "location_number": NumberInt(50255),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 995",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Rimbey",
  "address_province": "Alberta",
  "address_postal": "T0C 2J0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000c9f"),
  "location_id": NumberInt(10466),
  "location_name": "Northern Lights Truck Stop 2005",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50257),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 392",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Ardmore",
  "address_province": "Alberta",
  "address_postal": "T0A 0B0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000ca2"),
  "location_id": NumberInt(10467),
  "location_name": "Pharmacy Fas Gas",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50259),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "747 Pharmacy Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Toronto",
  "address_province": "Ontario",
  "address_postal": "M1L 3J7",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000ca5"),
  "location_id": NumberInt(10468),
  "location_name": "Warfield Fas Gas Plus",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50260),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "800 Schofield Highway",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Trail",
  "address_province": "British Columbia",
  "address_postal": "V1R 2G9",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000ca8"),
  "location_id": NumberInt(10469),
  "location_name": "Convenience Plus",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50261),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "PO Box 2157",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Maple Creek",
  "address_province": "Saskatchewan",
  "address_postal": "S0N 1N0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000cab"),
  "location_id": NumberInt(10470),
  "location_name": "Fas Gas Valleyview",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50088),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 1176",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Valleyview",
  "address_province": "Alberta",
  "address_postal": "T0H 3N0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000cae"),
  "location_id": NumberInt(10471),
  "location_name": "Fas Gas Quesnel",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40270),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "33A 155 Malcom Drive",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Quesnel",
  "address_province": "British Columbia",
  "address_postal": "V2J 3K2",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000cb1"),
  "location_id": NumberInt(10472),
  "location_name": "Fas Gas Namao",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40271),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "9618-160 Avenue",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Edmonton",
  "address_province": "Alberta",
  "address_postal": "T5Z 3S6",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000cb4"),
  "location_id": NumberInt(10473),
  "location_name": "Fas Gas Red Deer North",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40272),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "#100 6720 - 52nd Avenue",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Red Deer",
  "address_province": "Alberta",
  "address_postal": "T4N 4K9",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000cb7"),
  "location_id": NumberInt(10474),
  "location_name": "Fas Gas Nanaimo",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40273),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "1501 Estevan Road",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Nanaimo",
  "address_province": "British Columbia",
  "address_postal": "V9S 5L6",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000cba"),
  "location_id": NumberInt(10475),
  "location_name": "Fas Gas East Hill",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40274),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "3020 - 22nd Street",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Red Deer",
  "address_province": "Alberta",
  "address_postal": "T4R 3J5",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000cbd"),
  "location_id": NumberInt(10476),
  "location_name": "Fas Gas Mission",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40275),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "#144 - 32555 London Avenue",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Mission",
  "address_province": "British Columbia",
  "address_postal": "V2V 6M7",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000cc0"),
  "location_id": NumberInt(10477),
  "location_name": "Fas Gas Sardis",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40276),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "6014 Vedder Road",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Chilliwack",
  "address_province": "British Columbia",
  "address_postal": "V2R 5M4",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000cc3"),
  "location_id": NumberInt(10478),
  "location_name": "Edmonton Fas Gas Plus",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50305),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "7520 - 104 St NW",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Edmonton",
  "address_province": "Alberta",
  "address_postal": "T6E 6J4",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd053d5e556015000cc6"),
  "location_id": NumberInt(10479),
  "location_name": "Spruce Grove Fas Gas Plus",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50306),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "104 South Avenue",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Spruce Grove",
  "address_province": "Alberta",
  "address_postal": "T7X 3A3",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd063d5e556015000cc9"),
  "location_id": NumberInt(10480),
  "location_name": "Sylvan Lake Fas Gas Plus",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50312),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "#130-49 Hinshaw Drive",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Sylvan Lake",
  "address_province": "Alberta",
  "address_postal": "T4S 0K5",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd063d5e556015000ccc"),
  "location_id": NumberInt(10481),
  "location_name": "McKnight Gas & Wash",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50314),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "4808 - 12th St NE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Calgary",
  "address_province": "Alberta",
  "address_postal": "T2E 4R4",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd063d5e556015000ccf"),
  "location_id": NumberInt(10482),
  "location_name": "Ogden Fas Gas Plus",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50317),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "7404 Ogden Rd SE",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Calgary",
  "address_province": "Alberta",
  "address_postal": "T2C 1B8",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd063d5e556015000cd2"),
  "location_id": NumberInt(10483),
  "location_name": "Ft. Assiniboine Fas Gas Plus",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50322),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 179",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Ft. Assiniboine",
  "address_province": "Alberta",
  "address_postal": "T0G 1A0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd063d5e556015000cd5"),
  "location_id": NumberInt(10484),
  "location_name": "O'Pur Convenience Stoppe",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50329),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 329",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Nampa",
  "address_province": "Alberta",
  "address_postal": "T0H 2R0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd063d5e556015000cd8"),
  "location_id": NumberInt(10485),
  "location_name": "Canyon Fas Gas Plus",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50330),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "PO Box 40",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Boston Bar",
  "address_province": "British Columbia",
  "address_postal": "V0K 1C0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd063d5e556015000cdb"),
  "location_id": NumberInt(10486),
  "location_name": "Claresholm Fas Gas Plus",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50331),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 1455",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Claresholm",
  "address_province": "Alberta",
  "address_postal": "T0L-0T0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd063d5e556015000cde"),
  "location_id": NumberInt(10487),
  "location_name": "Coverdale Convenience",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50336),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "1017 Coverdale Road",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Riverview",
  "address_province": "New Brunswick",
  "address_postal": "E1B 5G1",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd063d5e556015000ce1"),
  "location_id": NumberInt(10488),
  "location_name": "Gudmundson Farm Equipment Ltd",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50338),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 24",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Lundar",
  "address_province": "Manitoba",
  "address_postal": "ROC 1YO",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd063d5e556015000ce4"),
  "location_id": NumberInt(10489),
  "location_name": "Notre Dame Express",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50350),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "3823 Rt 115",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Notre Dame",
  "address_province": "New Brunswick",
  "address_postal": "E4V 2E7",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd063d5e556015000ce7"),
  "location_id": NumberInt(10490),
  "location_name": "Livingstone Market",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50353),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "31313 Livingstone Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Abbotsford",
  "address_province": "British Columbia",
  "address_postal": "V2T 4T2",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd063d5e556015000cea"),
  "location_id": NumberInt(10491),
  "location_name": "Tags Food & Gas",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50368),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "PO Box 2018",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Tumbler Ridge",
  "address_province": "British Columbia",
  "address_postal": "V0C 2W0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd063d5e556015000ced"),
  "location_id": NumberInt(10492),
  "location_name": "Downtown Fas Gas",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50369),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "P.O. Box 6539",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Peace River",
  "address_province": "Alberta",
  "address_postal": "T8S 1S1",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd063d5e556015000cf0"),
  "location_id": NumberInt(10493),
  "location_name": "Dugald Fas Gas Plus",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50370),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "691 Dugald Road",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Dugald",
  "address_province": "Manitoba",
  "address_postal": "ROE OKO",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd063d5e556015000cf3"),
  "location_id": NumberInt(10494),
  "location_name": "Delburne Fas Gas Plus",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50375),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 364",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Delburne",
  "address_province": "Alberta",
  "address_postal": "T0M 0V0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd063d5e556015000cf6"),
  "location_id": NumberInt(10495),
  "location_name": "Gladue Holdings Inc.",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50376),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 1877",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Ft. St. James",
  "address_province": "British Columbia",
  "address_postal": "V0J 1P0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd063d5e556015000cf9"),
  "location_id": NumberInt(10496),
  "location_name": "Hankin Fuel Ltd",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50377),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "PO Box 96",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "New Glasgow",
  "address_province": "Nova Scotia",
  "address_postal": "B2H 5E1",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd063d5e556015000cfc"),
  "location_id": NumberInt(10497),
  "location_name": "Wojo's Gasbar & Confectionary",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50378),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 196",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Churchbridge",
  "address_province": "Saskatchewan",
  "address_postal": "SOA OMO",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd063d5e556015000cff"),
  "location_id": NumberInt(10498),
  "location_name": "Buck Lake Service & Foods",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50381),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 547",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Buck Lake",
  "address_province": "Alberta",
  "address_postal": "T0C 0T0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd063d5e556015000d02"),
  "location_id": NumberInt(10499),
  "location_name": "Tseshaht Market",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50384),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "7581 Pacific Rim Highway",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Port Alberni",
  "address_province": "British Columbia",
  "address_postal": "V9Y 8Y5",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd063d5e556015000d05"),
  "location_id": NumberInt(10500),
  "location_name": "Provost Car & Truck Wash Ltd.",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50387),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 398",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Provost",
  "address_province": "Alberta",
  "address_postal": "T0B 3S0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd063d5e556015000d08"),
  "location_id": NumberInt(10501),
  "location_name": "Lakeland Village Reddi-Mart",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50389),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "990 Lakeland Village Blvd",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Sherwood Park",
  "address_province": "Alberta",
  "address_postal": "T8H 1M1",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd063d5e556015000d0b"),
  "location_id": NumberInt(10502),
  "location_name": "Fas Gas Reddi Mart",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50392),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "10103 181 Street",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Edmonton",
  "address_province": "Alberta",
  "address_postal": "T5S 1N2",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd063d5e556015000d0e"),
  "location_id": NumberInt(10503),
  "location_name": "Fas Gas Plus 50th Ave",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50394),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "7110 Gaetz Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Red Deer",
  "address_province": "Alberta",
  "address_postal": "T4N 4E4",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd063d5e556015000d11"),
  "location_id": NumberInt(10504),
  "location_name": "Gateway Gas Bar and C-Store",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50397),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 434",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Riverton",
  "address_province": "Manitoba",
  "address_postal": "R0C 2Ro",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd063d5e556015000d14"),
  "location_id": NumberInt(10505),
  "location_name": "Abels Corner Convenience",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50404),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "2065 Rt 2",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Fortune Briidge",
  "address_province": "Prince Edward Island",
  "address_postal": "C0A 2B0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd063d5e556015000d17"),
  "location_id": NumberInt(10506),
  "location_name": "Queensbrough Gas and Convenience",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50409),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "1101 Ewen Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "New Westminster",
  "address_province": "British Columbia",
  "address_postal": "V3M 5E4",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd063d5e556015000d1a"),
  "location_id": NumberInt(10507),
  "location_name": "Fas Gas Gibbons Service",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(40411),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 1440",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Gibbons",
  "address_province": "Alberta",
  "address_postal": "T0A 1N0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd063d5e556015000d1d"),
  "location_id": NumberInt(10508),
  "location_name": "This N That C-Store & Eatery",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50423),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 670",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Carnduff",
  "address_province": "Saskatchewan",
  "address_postal": "S0C 0S0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd063d5e556015000d23"),
  "location_id": NumberInt(10510),
  "location_name": "Manning Fas Gas Plus",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50466),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 307",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Manning",
  "address_province": "Alberta",
  "address_postal": "T0H 1M1",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd063d5e556015000d26"),
  "location_id": NumberInt(10511),
  "location_name": "Jade Mountain Fas Gas Plus",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50471),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Site A - Comp 1 - R R 2",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Chase",
  "address_province": "British Columbia",
  "address_postal": "V0E 1M0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd063d5e556015000d29"),
  "location_id": NumberInt(10512),
  "location_name": "Clairmont Red Robin",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50473),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 49",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Clairmont",
  "address_province": "Alberta",
  "address_postal": "T0H 0W0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd063d5e556015000d2c"),
  "location_id": NumberInt(10513),
  "location_name": "Fas Gas Plus 76th Street",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50474),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "5101 - 76th St",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Red Deer",
  "address_province": "Alberta",
  "address_postal": "T4P 2J4",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd063d5e556015000d2f"),
  "location_id": NumberInt(10514),
  "location_name": "Bumps Pit Stop",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50486),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "Box 48",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Longview",
  "address_province": "Alberta",
  "address_postal": "T0L 1H0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd063d5e556015000d32"),
  "location_id": NumberInt(10515),
  "location_name": "Humpty's Express Fas Gas Plus",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50488),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "153 Leva Avenue",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Red Deer County",
  "address_province": "Alberta",
  "address_postal": "T4E 1B9",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd063d5e556015000d3b"),
  "location_id": NumberInt(10518),
  "location_name": "Riverside Fas Gas Plus",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50522),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "14935- 108th Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Surrey",
  "address_province": "British Columbia",
  "address_postal": "V3R 1W3",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd063d5e556015000d47"),
  "location_id": NumberInt(10522),
  "location_name": "Plaza 44 Fas Gas Plus",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50556),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "102- 4402 - 52nd Ave",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Lloydminster",
  "address_province": "Alberta",
  "address_postal": "T9V 0Y9",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd063d5e556015000d4a"),
  "location_id": NumberInt(10523),
  "location_name": "62nd Gas and Snack Ltd",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50580),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "6221 King George Highway",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Surrey",
  "address_province": "British Columbia",
  "address_postal": "V3X1G1",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd063d5e556015000d50"),
  "location_id": NumberInt(10525),
  "location_name": "Easy In & Out Convenience",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50584),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "475 Main Street West",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Hamilton",
  "address_province": "Ontario",
  "address_postal": "L8P 1K8",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd063d5e556015000d59"),
  "location_id": NumberInt(10528),
  "location_name": "Saanich Fas Gas Plus #588",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50588),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "5488 Patricia Bay Highway",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Saanich",
  "address_province": "British Columbia",
  "address_postal": "V8Y 1T1",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
  "close_date": null,
  "status": NumberInt(0)
});
db.getCollection("tb_location").insert({
  "_id": ObjectId("510cbd063d5e556015000d62"),
  "location_id": NumberInt(10531),
  "location_name": "Red Rooster Fas Gas Plus",
  "company_id": NumberInt(10007),
  "location_type": NumberInt(4),
  "location_region": "",
  "location_banner": "FGP",
  "location_number": NumberInt(50753),
  "location_phone": "",
  "location_fax": "",
  "address_unit": "",
  "address_line_1": "PO Box 45,",
  "address_line_2": "",
  "address_line_3": "",
  "address_city": "Westholme",
  "address_province": "British Columbia",
  "address_postal": "V0R 3C0",
  "address_country": {
    "address_id": NumberInt(15),
    "address_country": "Canada"
  },
  "open_date": ISODate("1969-12-31T17:00:00.0Z"),
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
db.getCollection("tb_material").insert({
  "_id": ObjectId("50b2ce509c7684f30500008b"),
  "description": "",
  "material_description": "",
  "material_id": NumberInt(14),
  "material_name": "Laminated Matte Vinyl"
});
db.getCollection("tb_material").insert({
  "_id": ObjectId("5111c7379c7684860e00009b"),
  "material_id": NumberInt(20),
  "material_name": "Clear Adhesive Vinyl",
  "description": ""
});
db.getCollection("tb_material").insert({
  "_id": ObjectId("5111cfa49c7684486300002c"),
  "material_id": NumberInt(21),
  "material_name": "Window Perforated Vinyl",
  "description": ""
});
db.getCollection("tb_material").insert({
  "_id": ObjectId("5111d31e9c7684f51a0000f4"),
  "material_id": NumberInt(22),
  "material_name": "LED Lightbox",
  "description": ""
});
db.getCollection("tb_material").insert({
  "_id": ObjectId("5111d4ac9c7684d6100000bd"),
  "material_id": NumberInt(23),
  "material_name": "Laminated Gloss Vinyl",
  "description": ""
});

/** tb_module records **/
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
  "module_order": NumberInt(8),
  "module_pid": NumberInt(1),
  "module_root": "admin",
  "module_rules": [
    
  ],
  "module_text": "Location",
  "module_time": ISODate("2013-02-01T02:30:36.0Z"),
  "module_type": NumberInt(0)
});
db.getCollection("tb_module").insert({
  "_id": ObjectId("50a9a9419c76845806000004"),
  "module_category": NumberInt(0),
  "module_description": "",
  "module_dir": "contact",
  "module_id": NumberInt(5),
  "module_index": "index.php",
  "module_key": "contact\/contact",
  "module_locked": NumberInt(0),
  "module_menu": "manage_contact",
  "module_order": NumberInt(1),
  "module_pid": NumberInt(3),
  "module_root": "admin",
  "module_rules": [
    
  ],
  "module_text": "Contact",
  "module_time": ISODate("2013-02-01T01:57:01.0Z"),
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
  "module_order": NumberInt(9),
  "module_pid": NumberInt(1),
  "module_root": "admin",
  "module_rules": [
    
  ],
  "module_text": "Company",
  "module_time": ISODate("2013-02-01T02:28:30.0Z"),
  "module_type": NumberInt(0)
});
db.getCollection("tb_module").insert({
  "_id": ObjectId("50c6e4499c76846606000024"),
  "module_category": NumberInt(0),
  "module_description": "",
  "module_dir": "roles",
  "module_id": NumberInt(22),
  "module_index": "index.php",
  "module_key": "company\/function-for-company",
  "module_locked": NumberInt(0),
  "module_menu": "module_rule",
  "module_order": NumberInt(0),
  "module_pid": NumberInt(1),
  "module_root": "admin",
  "module_rules": [
    
  ],
  "module_text": "Function for company",
  "module_time": ISODate("2013-02-01T01:57:27.0Z"),
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
  "module_category": NumberInt(0),
  "module_description": "",
  "module_dir": "area",
  "module_id": NumberInt(27),
  "module_index": "index.php",
  "module_key": "company\/areas",
  "module_locked": NumberInt(0),
  "module_menu": "areas",
  "module_order": NumberInt(7),
  "module_pid": NumberInt(1),
  "module_root": "admin",
  "module_rules": [
    
  ],
  "module_text": "Areas",
  "module_time": ISODate("2013-02-01T02:30:57.0Z"),
  "module_type": NumberInt(0)
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
db.getCollection("tb_module").insert({
  "_id": ObjectId("50a9a9219c76842f0600007d"),
  "module_category": NumberInt(0),
  "module_description": "",
  "module_dir": "user",
  "module_id": NumberInt(3),
  "module_index": "index.php",
  "module_key": "contact",
  "module_locked": NumberInt(0),
  "module_menu": "",
  "module_order": NumberInt(0),
  "module_pid": NumberInt(0),
  "module_root": "admin",
  "module_rules": [
    
  ],
  "module_text": "Contact",
  "module_time": ISODate("2013-02-01T01:56:31.0Z"),
  "module_type": NumberInt(0)
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
db.getCollection("tb_product").insert({
  "_id": ObjectId("511238949c7684fe0200003f"),
  "product_id": NumberInt(65),
  "product_sku": "MCS-SGN-F_Froster",
  "short_description": "F-Froster Sign",
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
  "image_file": "F_Froster.png",
  "image_desc": "Image for current product",
  "saved_dir": "resources\/MCS\/products\/65\/",
  "map_content": [
    
  ],
  "material": [
    {
      "id": NumberInt(4),
      "name": "Dibond",
      "color": "Silver",
      "width": NumberInt(40),
      "length": NumberInt(42),
      "thick": 0.3,
      "uthick": "cm",
      "usize": "in",
      "price": NumberInt(724),
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
  "company_id": NumberInt(10002),
  "location_id": NumberInt(0),
  "tag": [
    
  ],
  "product_note": "",
  "user_name": "admin",
  "user_type": NumberInt(0),
  "file_hd": "",
  "date_created": ISODate("2013-02-06T11:03:48.0Z")
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
db.getCollection("tb_product_images").insert({
  "_id": ObjectId("510b68699c76840a640002ce"),
  "area_id": NumberInt(0),
  "company_id": NumberInt(10004),
  "date_created": ISODate("2013-02-01T07:02:01.0Z"),
  "hot_spot": NumberInt(0),
  "image_code": "Standard",
  "image_height": NumberInt(65),
  "image_size": NumberInt(19805),
  "image_type": NumberInt(0),
  "image_width": NumberInt(150),
  "location_area": "",
  "location_id": NumberInt(0),
  "low_res_image": "BM Wrap.png",
  "map_content": [
    
  ],
  "map_images": [
    
  ],
  "product_id": NumberInt(48),
  "product_image": "BM Wrap.png",
  "product_images_id": NumberInt(8),
  "saved_dir": "resources\/VHT\/products\/48\/",
  "status": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0)
});
db.getCollection("tb_product_images").insert({
  "_id": ObjectId("510b691d9c7684e607000095"),
  "area_id": NumberInt(0),
  "company_id": NumberInt(10004),
  "date_created": ISODate("2013-02-01T07:05:01.0Z"),
  "hot_spot": NumberInt(0),
  "image_code": "Pacific",
  "image_height": NumberInt(65),
  "image_size": NumberInt(19223),
  "image_type": NumberInt(0),
  "image_width": NumberInt(150),
  "location_area": "",
  "location_id": NumberInt(0),
  "low_res_image": "BM Pacific.png",
  "map_content": [
    
  ],
  "map_images": [
    
  ],
  "product_id": NumberInt(48),
  "product_image": "BM Pacific.png",
  "product_images_id": NumberInt(10),
  "saved_dir": "resources\/VHT\/products\/48\/",
  "status": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0)
});
db.getCollection("tb_product_images").insert({
  "_id": ObjectId("510b686c9c7684bd0b000053"),
  "area_id": NumberInt(0),
  "company_id": NumberInt(10004),
  "date_created": ISODate("2013-02-01T07:02:04.0Z"),
  "hot_spot": NumberInt(0),
  "image_code": "AY-AE-25N",
  "image_height": NumberInt(72),
  "image_size": NumberInt(18190),
  "image_type": NumberInt(0),
  "image_width": NumberInt(150),
  "location_area": "",
  "location_id": NumberInt(0),
  "low_res_image": "BM Wrap-AY-AE-25N.png",
  "map_content": [
    
  ],
  "map_images": [
    
  ],
  "product_id": NumberInt(48),
  "product_image": "BM Wrap-AY-AE-25N.png",
  "product_images_id": NumberInt(9),
  "saved_dir": "resources\/VHT\/products\/48\/",
  "status": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0)
});
db.getCollection("tb_product_images").insert({
  "_id": ObjectId("510b6c3e9c7684626b0001a3"),
  "area_id": NumberInt(0),
  "company_id": NumberInt(10004),
  "date_created": ISODate("2013-02-01T07:18:22.0Z"),
  "hot_spot": NumberInt(0),
  "image_code": "Prairie",
  "image_height": NumberInt(86),
  "image_size": NumberInt(24172),
  "image_type": NumberInt(0),
  "image_width": NumberInt(150),
  "location_area": "",
  "location_id": NumberInt(0),
  "low_res_image": "BM Wrap-Prairie.png",
  "map_content": [
    
  ],
  "map_images": [
    
  ],
  "product_id": NumberInt(48),
  "product_image": "BM Wrap-Prairie.png",
  "product_images_id": NumberInt(11),
  "saved_dir": "resources\/VHT\/products\/48\/",
  "status": NumberInt(0),
  "user_name": "admin",
  "user_type": NumberInt(0)
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
db.getCollection("tb_shipping").insert({
  "_id": ObjectId("510b95d49c76843615000013"),
  "company_id": NumberInt(10004),
  "create_by": "admin",
  "create_time": ISODate("2013-02-01T10:15:48.0Z"),
  "date_shipping": ISODate("2013-01-31T17:00:00.0Z"),
  "location_address": "#2 - 7819 50 Avenue<br>Red Deer Alberta T4N 1L1 ",
  "location_from": NumberInt(0),
  "location_id": NumberInt(10015),
  "location_name": "Red Deer",
  "ship_status": NumberInt(1),
  "shipper": "Purolator",
  "shipping_detail": [
    {
      "order_id": NumberInt(9),
      "order_item_id": NumberInt(9),
      "product_id": NumberInt(42),
      "allocation_id": NumberInt(6),
      "product_code": "VHT-Logo-OE",
      "width": 22,
      "height": 9,
      "unit": "cm",
      "quantity": NumberInt(5),
      "price": 32,
      "amount": 160,
      "graphic_file": "resources\/VHT\/products\/42\/OE_logo.jpg",
      "material_id": NumberInt(2),
      "material_name": "Sintra",
      "material_color": "White",
      "material_thickness_value": 0.3,
      "material_thickness_unit": "cm"
    },
    {
      "order_id": NumberInt(7),
      "order_item_id": NumberInt(7),
      "product_id": NumberInt(41),
      "allocation_id": NumberInt(7),
      "product_code": "VHT-Logo-VH",
      "width": 24,
      "height": 16,
      "unit": "in",
      "quantity": NumberInt(1),
      "price": 32,
      "amount": 32,
      "graphic_file": "resources\/VHT\/products\/41\/200_VH_logo.jpg",
      "material_id": NumberInt(2),
      "material_name": "Sintra",
      "material_color": "White",
      "material_thickness_value": 0.3,
      "material_thickness_unit": "cm"
    },
    {
      "order_id": NumberInt(15),
      "order_item_id": NumberInt(15),
      "product_id": NumberInt(44),
      "allocation_id": NumberInt(2),
      "product_code": "VHT-Logo-FT",
      "width": 12,
      "height": 12,
      "unit": "cm",
      "quantity": NumberInt(4),
      "price": 32,
      "amount": 128,
      "graphic_file": "resources\/VHT\/products\/44\/FT_logo.jpg",
      "material_id": NumberInt(2),
      "material_name": "Sintra",
      "material_color": "White",
      "material_thickness_value": 0.3,
      "material_thickness_unit": "cm"
    },
    {
      "order_id": NumberInt(11),
      "order_item_id": NumberInt(11),
      "product_id": NumberInt(42),
      "allocation_id": NumberInt(3),
      "product_code": "VHT-Logo-OE",
      "width": 22,
      "height": 9,
      "unit": "cm",
      "quantity": NumberInt(3),
      "price": 32,
      "amount": 96,
      "graphic_file": "resources\/VHT\/products\/42\/OE_logo.jpg",
      "material_id": NumberInt(2),
      "material_name": "Sintra",
      "material_color": "White",
      "material_thickness_value": 0.3,
      "material_thickness_unit": "cm"
    },
    {
      "order_id": NumberInt(10),
      "order_item_id": NumberInt(10),
      "product_id": NumberInt(42),
      "allocation_id": NumberInt(4),
      "product_code": "VHT-Logo-OE",
      "width": 22,
      "height": 9,
      "unit": "cm",
      "quantity": NumberInt(5),
      "price": 32,
      "amount": 160,
      "graphic_file": "resources\/VHT\/products\/42\/OE_logo.jpg",
      "material_id": NumberInt(2),
      "material_name": "Sintra",
      "material_color": "White",
      "material_thickness_value": 0.3,
      "material_thickness_unit": "cm"
    },
    {
      "order_id": NumberInt(9),
      "order_item_id": NumberInt(9),
      "product_id": NumberInt(42),
      "allocation_id": NumberInt(5),
      "product_code": "VHT-Logo-OE",
      "width": 22,
      "height": 9,
      "unit": "cm",
      "quantity": NumberInt(5),
      "price": 32,
      "amount": 160,
      "graphic_file": "resources\/VHT\/products\/42\/OE_logo.jpg",
      "material_id": NumberInt(2),
      "material_name": "Sintra",
      "material_color": "White",
      "material_thickness_value": 0.3,
      "material_thickness_unit": "cm"
    }
  ],
  "shipping_id": NumberInt(1),
  "tracking_number": "602261158854",
  "tracking_url": "https:\/\/eshiponline.purolator.com\/ShipOnline\/Public\/Track\/TrackingDetails.aspx?pin=602261158854"
});

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
db.getCollection("tb_tag").insert({
  "_id": ObjectId("510b70639c7684aa64000348"),
  "tag_id": NumberInt(13),
  "tag_name": "Bannerstand",
  "tag_status": NumberInt(0),
  "tag_order": NumberInt(13),
  "location_id": NumberInt(0),
  "company_id": NumberInt(10004),
  "user_name": "admin",
  "date_created": ISODate("2013-02-01T07:35:47.0Z")
});
db.getCollection("tb_tag").insert({
  "_id": ObjectId("510b791f9c7684393a0006c2"),
  "tag_id": NumberInt(14),
  "tag_name": "Mural",
  "tag_status": NumberInt(0),
  "tag_order": NumberInt(14),
  "location_id": NumberInt(0),
  "company_id": NumberInt(10004),
  "user_name": "admin",
  "date_created": ISODate("2013-02-01T08:13:02.0Z")
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
  "user_lastlog": ISODate("2013-02-06T10:42:28.0Z"),
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
  "user_lastlog": ISODate("2013-02-06T01:59:25.0Z"),
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
  "user_lastlog": ISODate("2013-02-06T01:56:41.0Z"),
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
