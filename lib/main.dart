import 'package:flutter/material.dart';
import 'package:flutter_stripe/flutter_stripe.dart';
import 'package:project_2/pages/onboard.dart';
import 'package:project_2/widget/app_constant.dart';
import 'admin/admin_login.dart';
import 'admin/home_admin.dart';
import 'pages/home.dart';

void main() {
  Stripe.publishableKey = publishableKey;

  runApp(MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  // This widget is the root of your application.
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Flutter Demo',
      debugShowCheckedModeBanner: false,
      theme: ThemeData(
        colorScheme: ColorScheme.fromSeed(seedColor: Colors.deepPurple),
        useMaterial3: true,
      ),
      home: AdminLogin(),
    );
  }
}
