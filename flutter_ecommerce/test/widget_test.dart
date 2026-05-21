import 'package:flutter_test/flutter_test.dart';
import 'package:flutter_ecommerce/main.dart';

void main() {
  testWidgets('App loads', (WidgetTester tester) async {
    await tester.pumpWidget(const MyApp12());

    expect(find.text('Network'), findsOneWidget);
  });
}