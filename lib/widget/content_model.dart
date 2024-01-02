class UnboardingContent{
  String image;
  String title;
  String description;

  UnboardingContent({required this.image, required this.description, required this.title});
}

List<UnboardingContent> contents = [
  UnboardingContent(
    image: "images/screen1.png",
    description: 'Pick your food from our menu\n            More than 35 times',
    title: 'Select from Our\n     Best Menu'),
  UnboardingContent(
    image: "images/screen2.png",
    description: 'You can pay cash on delivery and\n       Card payment is available',
    title: 'Easy and Online Payment'
  ),
  UnboardingContent(
    image: "images/screen3.png",
    description: 'Deliver your food at your\nDoorstep',
    title: 'Quick Delivery at Your Doorstep'
  ),
];