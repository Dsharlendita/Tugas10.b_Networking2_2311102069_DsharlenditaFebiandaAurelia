import 'dart:convert';

import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;

import 'Product.dart';

void main() => runApp(const MyApp12());

class MyApp12 extends StatefulWidget {

  const MyApp12({super.key});

  @override
  State<MyApp12> createState() => _MyAppState();
}

class _MyAppState extends State<MyApp12> {

  late Future<List<Product>> products;

  Future<List<Product>> fetchProduct() async {

    final res = await http.get(
      Uri.parse('http://192.168.1.115:8000/api/product')
    );

    if (res.statusCode == 200) {

      var data = jsonDecode(res.body);

      var parsed = data['list']
          .cast<Map<String, dynamic>>();

      return parsed
          .map<Product>((json) => Product.fromJson(json))
          .toList();

    } else {

      throw Exception('Failed');
    }
  }

  @override
  void initState() {
    super.initState();

    products = fetchProduct();
  }

  @override
  Widget build(BuildContext context) {

    return MaterialApp(

      title: 'Networking',

      theme: ThemeData(
        primarySwatch: Colors.blue,
      ),

      debugShowCheckedModeBanner: false,

      home: Scaffold(

        body: SafeArea(

          child: FutureBuilder<List<Product>>(

            future: products,

            builder: (context, snapshot) {

              if (snapshot.hasData) {

                if (snapshot.data!.isEmpty) {

                  return const Center(
                    child: Text(
                      'Tidak ada data',
                      style: TextStyle(
                        color: Colors.teal,
                        fontSize: 28,
                      ),
                    ),
                  );
                }

                return ListView.builder(

                  itemCount: snapshot.data!.length,

                  itemBuilder: (context, index) {

                    return Card(

                      child: InkWell(

                        child: Container(

                          padding: const EdgeInsets.only(
                            left: 20,
                            top: 15,
                            bottom: 15,
                          ),

                          margin: const EdgeInsets.only(
                            bottom: 10,
                            left: 10,
                            right: 10,
                            top: 10,
                          ),

                          decoration: BoxDecoration(

                            gradient: LinearGradient(
                              colors: [
                                Colors.blue.shade400,
                                Colors.purple.shade400,
                              ],
                            ),

                            borderRadius: BorderRadius.circular(15),
                          ),

                          child: Column(

                            crossAxisAlignment:
                                CrossAxisAlignment.start,

                            children: [

                              Text(

                                snapshot.data![index].name,

                                style: const TextStyle(
                                  color: Colors.white,
                                  fontSize: 28,
                                  fontWeight: FontWeight.bold,
                                ),
                              ),

                              const SizedBox(height: 10),

                              Text(

                                "Rp ${snapshot.data![index].price}",

                                style: const TextStyle(
                                  color: Colors.white70,
                                  fontSize: 22,
                                ),
                              ),
                            ],
                          ),
                        ),
                      ),
                    );
                  },
                );

              } else {

                return const Center(
                  child: CircularProgressIndicator(),
                );
              }
            },
          ),
        ),
      ),
    );
  }
}