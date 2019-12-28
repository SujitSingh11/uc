-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2019 at 10:38 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uc_quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `uc_batch`
--

CREATE TABLE `uc_batch` (
  `batch_id` int(11) NOT NULL,
  `user_id` int(100) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `uc_batch_team`
--

CREATE TABLE `uc_batch_team` (
  `batch_team_id` int(11) NOT NULL,
  `batch_id` int(100) NOT NULL,
  `team_id` int(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uc_batch_team`
--

INSERT INTO `uc_batch_team` (`batch_team_id`, `batch_id`, `team_id`, `time`) VALUES
(1, 1, 1, '2019-12-26 09:36:35');

-- --------------------------------------------------------

--
-- Table structure for table `uc_question`
--

CREATE TABLE `uc_question` (
  `question_id` int(11) NOT NULL,
  `question_type` tinyint(5) NOT NULL,
  `question_mark` tinyint(10) NOT NULL,
  `question` text NOT NULL,
  `option_1` varchar(1000) NOT NULL,
  `option_2` varchar(1000) NOT NULL,
  `option_3` varchar(1000) NOT NULL,
  `option_4` varchar(1000) NOT NULL,
  `correct_option` tinyint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uc_question`
--

INSERT INTO `uc_question` (`question_id`, `question_type`, `question_mark`, `question`, `option_1`, `option_2`, `option_3`, `option_4`, `correct_option`) VALUES
(7, 1, 1, '<pre style=''display:inline;''>Which of the following is a linear data structure?\r\n</pre>', 'Tree', 'Graph', 'Linked List', 'All of the above', 3),
(8, 1, 1, '<pre style=''display:inline;''>Which of the following is primarily used to \r\ndescribe Stack?\r\n</pre>', 'FIFO', 'LIFO', 'LILO', 'None of the above', 2),
(9, 1, 1, '<pre style=''display:inline;''>Which of the following is not an \r\nexample of a Queue?\r\n</pre>', 'Circular queue', 'Priority queue', 'Doubly ended queue', 'Backward queue.', 4),
(10, 1, 1, '<pre style=''display:inline;'' >Which of the following is not part of a\r\nDoubly linked list</pre>', 'Tail node', 'Previous pointer', 'Head node', 'Next pointer', 2),
(11, 1, 1, '<pre style=''display:inline;''>Which of these is not a\r\nway to traverse a tree</pre>', 'Preorder', 'Postorder', 'Outorder', 'Inorder', 3),
(12, 1, 1, '<pre style=''display:inline;''>Which of the following are part of a tree?</pre>', 'Terminal node', 'Root node', 'Leaf node', 'All of the above', 4),
(13, 1, 1, '<pre style=''display:inline;''>Which of the following is not a \r\nway to sort an array</pre>', 'Merge sort', 'Deletion sort', 'Insertion sort', 'Quick sort', 2),
(14, 1, 1, '<pre style=''display:inline;''>Which of the following inheritance \r\ntype is not available in Java using just classes?\r\n</pre>', 'Multilevel inheritance', 'Simple inheritance', 'Multiple inheritance', 'Hierarchical inheritance', 3),
(15, 1, 1, '<pre style=''display:inline;''>Which of the following is an application of Stacks?</pre>', 'Expression evaluation', 'Parenthesis checking', 'Function call', 'All of the above', 4),
(16, 2, 1, '<pre style=''display:inline;''>What is the output of the following C snippet?<code>int main()\r\n{\r\n    int i;\r\n    for (i = 0; i<5; i++)\r\n    {\r\n        int i;\r\n        i = 10;\r\n        printf("%d ", i) ;\r\n    }\r\n    return 0;\r\n}\r\n</code></pre>', 'Compile time error', '10', '10 10 10 10', '0 1 2 3 4', 3),
(26, 2, 1, '<pre style=''display:inline;''>Which of the following programming languages is the oldest?\r\n</pre>', 'C++', 'JAVA', 'Python', 'C', 4),
(27, 2, 1, '<pre style=''display:inline;''>Which of the following is not a compound assignment operator?</pre>', '%=', '+=', '==', '>>=', 3),
(28, 2, 1, '<pre style=''display:inline;''>Which of the following is not a unary operator?</pre>', '++', '-', '&&', 'sizeof()', 3),
(29, 2, 1, '<pre style=''display:inline;''>Assume that the size of an integer is 4 bytes. Predict the output of the following?\r\nint fun()\r\n{\r\n    puts(" Hello");\r\n    return 10;\r\n}\r\nint main()\r\n{\r\n    printf("%d", sizeof(fun()));\r\n    return 0;\r\n}\r\n</pre>', 'Hello 4', '4', '4 Hello', 'Compiler error', 2),
(30, 2, 1, '<pre style=''display:inline;''>Which of the following statement is correct for switch controlling expression?</pre>', 'Only int can be used as â€œswitchâ€ control expression.', 'Char and int both can be used as â€œswitchâ€ control expression.', 'All data types can be used as â€œswitchâ€ control expression.', 'â€œSwitchâ€ control expression can be empty.', 2),
(31, 2, 2, '<pre style=''display:inline;''>What is the output for the following C code?\n#define square(x) (x * x)\n  \nint main()\n{\n    int x, y = 1;\n    x = square(y + 1);\n    printf("%d\\n", x);\n    return 0;\n}\n</pre>', '4', 'Compiler error', '3', 'Garbage Value', 3),
(32, 2, 1, '<pre style=''display:inline;''>What is the output of the following C++ code?\nusing namespace std;\nint main()\n{\n    cout << sizeof(''x'');\n    cout << sizeof(char); 	\n    return 0;\n}\n</pre>', 'x1', '11', '12', 'Compiler error', 2),
(33, 2, 2, '<pre style=''display:inline;''>Find the output of the following C++ code?\nusing namespace std; \n  \nint main() \n{ \n    int i; \n    i = 1 + (1,4,5,6,3); \n    cout << i; \n    return 0; \n}\n</pre>', '2', '1', 'Compiler error', '4', 4),
(34, 2, 1, '<pre style=''display:inline;''>What is the output of the following C++ code?\nusing namespace std;\n  \nint main()\n{\n    int a = 0, b;\n    b = (a = 50) + 10;\n    cout << a << " " << b;\n    return 0;\n}\n</pre>', '50 50', '0 0', '50 60', 'Compiler error', 3),
(35, 2, 1, '<pre style=''display:inline;''>Find the output of the following C code?\r\nint main()\r\n{\r\n    char c = ''A'';\r\n    printf("%d\\n", c);\r\n    return 0;\r\n}\r\n</pre>', 'A', '65', '10', 'Compiler error', 2),
(36, 1, 2, '<pre style=''display:inline;''>A binary tree is represented using an array where the left child is given by \n2*(root node) + 1 and the right child is given by 2*(root node) + 2. \nWhat is the root node for 5?\n</pre>', '2', '3', '1', 'None of the above', 1),
(37, 4, 2, '<pre style=''display:inline;''>What is the output of the following Python snippet?\nfor i in range(4,6):\n    print(i, end=â€ â€œ)\n</pre>', '4 5', '4 5 6', '5 6', '1 2 3 4 5', 1),
(38, 4, 2, '<pre style=''display:inline;''>What is the output of the following Python snippet?\r\ni = 1\r\nwhile True: \r\n	if i%3 == 0: \r\n		break\r\n	print(i, end=â€ â€œ) \r\n	i + = 1\r\n</pre>', '1 2', 'Compiler error', '1 2 3', '3', 2),
(39, 3, 2, '<pre style=''display:inline;''>What is the output of the following Java code?\r\npublic class Main\r\n{\r\n	public static void main(String[] args) {\r\n	    int i = 5;\r\n	    if (i = 4)\r\n		    System.out.print(i);\r\n		System.out.println(i);\r\n	}\r\n}\r\n</pre>', '4 5', '5 5 ', '5 4', 'Compile error', 4),
(40, 3, 1, '<pre style=''display:inline;''>What is the output of the following Java code?\npublic class Main\n{\n	public static void main(String[] args) {\n	    int []a = {1, 2, 3, 4, 5};\n	    System.out.println(a[5]);\n	}\n}\n</pre>', '4', '5', 'InvalidInputException', 'ArrayIndexOutOfBoundsException', 4),
(41, 2, 1, '<pre style=''display:inline;''>What are examples of polymorphism?\r\n</pre>', 'Method Overriding', 'Abstraction', 'Encapsulation', 'None of the above', 1),
(42, 5, 1, '<pre style=''display:inline;''>Which of the following can be implemented using recursion?</pre>', 'Factorial of a number', 'nth Fibonacci number', 'Length of a string', 'All of the above', 4),
(43, 1, 1, '<pre style=''display:inline;''>Process of removing an element from a stack is called?\r\n</pre>', 'Push', 'Pop', 'Evaluate', 'Insert', 2),
(44, 5, 2, '<pre style=''display:inline;''>What is the number of elements in an adjacency matrix of a graph with 5 vertices?</pre>', '5', '30', '25', '20', 3),
(45, 5, 1, '<pre style=''display:inline;''>Which of the following searching technique needs the array to be formatted a \r\ncertain way?\r\n</pre>', 'Linear search', 'Binary search', 'None of the above', 'Bubble search', 4),
(46, 1, 1, '<pre style=''display:inline;''>What data structure is used for Depth-first search for graphs?</pre>', 'Queue', 'Tree', 'Stack', 'Graph', 3),
(47, 1, 1, '<pre style=''display:inline;''>What does stack overflow refer to?\r\n</pre>', 'Pushing elements to a full-stack', 'Accessing elements from an undefined stack', 'The website on the internet', 'Popping elements from an empty stack', 1),
(48, 5, 1, '<pre style=''display:inline;''>Which of the following cannot be used for looping?</pre>', 'for', 'while', 'goto', 'None of the above', 4),
(49, 4, 1, '<pre style=''display:inline;''>Which of the following is not part of selection statements in Python?</pre>', 'else if', 'else', 'elif', 'if', 1),
(50, 4, 1, '<pre style=''display:inline;''>Which of these keywords are used to define a function in Python?</pre>', 'function', 'method', 'define', 'def', 4),
(51, 2, 1, '<pre style=''display:inline;''>Which of these is used to print the last element of the following string? </pre>', 'a[0]', 'a[-1]', 'a[5]', 'None of the above', 2),
(52, 2, 1, '<pre style=''display:inline;''>What is the output of the following C++ program?\r\nusing namespace std;\r\nint main(){\r\n    int x = 2;\r\n    int y = 5;\r\n    int z = x|y;\r\n    cout<<z;\r\n}\r\n</pre>', '7', '10', '3', 'Compile error', 1),
(53, 5, 1, '<pre style=''display:inline;''>What is the best time complexity for search in a Hash table?</pre>', 'O(n)', 'O(1)', 'O(log n)', 'O(n2)', 2),
(54, 5, 1, '<pre style=''display:inline;''>What are the first two elements of the Fibonacci series?\r\n</pre>', '0 1', '1 1', '1 2', 'None of the above', 1),
(55, 5, 1, '<pre style=''display:inline;''>While implementing Bubble sort, which element gets sorted first?</pre>', 'First element', 'Last element', 'All of them', 'None of them', 2),
(56, 5, 1, '<pre style=''display:inline;''>While implementing Selection sort, which element gets sorted first?\r\n</pre>', 'First element', 'Last element', 'All of them', 'None of them', 1),
(57, 4, 1, '<pre style=''display:inline;''>What is the output of the following Python code?\r\nx = 8.4\r\ny = 2\r\nz = x//y;\r\nprint(z)\r\n</pre>', '4.2', '4', '4.0', 'Compile error', 3),
(58, 2, 1, '<pre style=''display:inline;''>What is the output of the following C++ program?\r\nusing namespace std;\r\nint main(){\r\n    float z = 13/5;\r\n    cout<<z;\r\n    return 0;\r\n}\r\n</pre>', '2.6', '2', '2.0', 'None of the above', 2),
(59, 3, 1, '<pre style=''display:inline;''>What is the output of the following Java code?\r\npublic class Main\r\n{\r\n	public static void main(String[] args) { \r\n        String s1 = new String("UC"); \r\n        String s2 = new String("UC"); \r\n        if (s1 == s2)  \r\n            System.out.println("Equal"); \r\n        else\r\n            System.out.println("Not equal"); \r\n    } \r\n}\r\n</pre>', 'Not Equal', 'Equal', 'Compile error', 'Cannot be determined', 1),
(60, 2, 1, '<pre style=''display:inline;''>How many times will Technovanza be printed in the above program?\r\nint main()\r\n{\r\n    int i = 1024;\r\n    for (; i; i >>= 1)\r\n        printf("Technovanza");\r\n    return 0;\r\n}\r\n</pre>', '10', '11', 'Infinity', 'Compile error', 2),
(61, 2, 1, '<pre style=''display:inline;''>What is the output of the following C code?\r\nint main()\r\n{\r\n    int i = 0;\r\n    switch (i)\r\n    {\r\n        case ''0'': printf("Ultimate");\r\n                break;\r\n        case ''1'': printf("Coder");\r\n                break;\r\n        default: printf("Technovanza");\r\n    }\r\n    return 0;\r\n}\r\n</pre>', 'Ultimate', 'Coder', 'Technovanza', 'Compile error', 3),
(62, 2, 2, '<pre style=''display:inline;''>Which of the following printf() statements get compiled?\r\n(i)   printf("%d",8);\r\n(ii)  printf("%d",090);\r\n(iii) printf("%d",00200);\r\n(iv)  printf("%d",0007000);\r\n</pre>', 'Only (i) will compile', 'Only (i) and (ii) will compile', 'All of them will compile', 'Only (i), (iii) and (iv) will compile', 4),
(63, 2, 2, '<pre style=''display:inline;''>Let x be an integer that can be 0 or 1. What statement is the following \r\nequivalent to?\r\nif (x==0)\r\n    x=1;\r\nelse\r\n    x=0;\r\n</pre>', 'x = 1 + x', 'x = 1 - x', 'x = x - 1', 'x = 1 % x', 2),
(64, 1, 2, '<pre style=''display:inline;''>A program attempts to generate as many permutations as possible \r\nof the string, ''abcd'' by pushing the characters a, b, c, d \r\nin the same order onto a stack, but it may pop off the top character at any time. \r\nWhich one of the following strings CANNOT be generated using this program?\r\n</pre>', 'abcd', 'dcba', 'cbad', 'cabd', 4),
(65, 2, 2, '<pre style=''display:inline;''>Pick the best statement for the following program snippet?\r\nint main()\r\n{\r\n int var;  /*Suppose address of var is 2000 */\r\n \r\n void *ptr = &var;\r\n *ptr = 5;\r\n printf("var=%d and *ptr=%d",var,*ptr);\r\n              \r\n return 0;\r\n}\r\n</pre>', 'It will print â€œvar=5 and *ptr=2000â€', 'It will print â€œvar=5 and *ptr=5â€', 'It will print â€œvar=5 and *ptr=XYZâ€, where XYZ is some random address', 'Compile error', 4),
(66, 2, 1, '<pre style=''display:inline;''>In the context of C data types, which of the following are valid datatypes?</pre>', 'unsigned long long int', 'long long double', 'unsigned long double', 'All of the above', 1),
(67, 2, 2, '<pre style=''display:inline;''>Assuming that the size of an integer is 4 bytes and size of a pointer is 8 bytes.\r\nWhat is the output of the following?\r\nint main()\r\n{\r\n    printf("%lu ", sizeof(int ));\r\n    printf("%lu ", sizeof(int *));\r\n    printf("%lu ", sizeof(int **));\r\n}\r\n</pre>', '4 4 4', '8 8 8', '4 4 8', '4 8 8', 4),
(68, 1, 1, '<pre style=''display:inline;''>Which of the following is true about linked list representation of stacks?</pre>', 'In push operation, if new nodes are inserted at the beginning of the linked list. Then in pop, nodes', 'In push operation, if new nodes are inserted at the end of the linked list. Then in pop, nodes must ', 'Both of the above', 'None of the above', 4),
(69, 5, 1, '<pre style=''display:inline;''>Consider the pseudocode that uses a stack. What is the input for \r\nthe string â€œHelloâ€?\r\ndeclare a stack of characters\r\nwhile ( there are more characters in the word to read )\r\n{\r\n   read a character\r\n   push the character on the stack\r\n}\r\nwhile ( the stack is not empty )\r\n{\r\n   pop a character off the stack\r\n   write the character to the screen\r\n}\r\n</pre>', 'Hello', 'olleH', 'dlroWolleH', 'HelloWorld', 2),
(70, 1, 1, '<pre style=''display:inline;''>How many stacks are needed to implement a queue?\r\n</pre>', '1', '2', '3', '4', 2),
(71, 5, 2, '<pre style=''display:inline;''>Which of the following sorting algorithms can be used to sort a random linked list\r\nin minimum time?\r\n</pre>', 'Selection sort', 'Quick sort', 'Merge sort', 'Heap sort', 3),
(72, 5, 2, '<pre style=''display:inline;''>A program reads 500 integers in the range of 0 to 100. What is the best way to\r\nstore the frequencies?</pre>', 'An array of 50 elements', 'An array of 101 elements', 'An array of 500 elements', 'None of the above', 2),
(73, 5, 1, '<pre style=''display:inline;''>What is the worst-case time for searching a given element in a linked list?\r\n</pre>', 'n/2', 'logn', '1', 'n', 4),
(74, 3, 2, '<pre style=''display:inline;''>What is the output of the following Java code?\r\nclass Base {\r\n    public static void show() {\r\n       System.out.println("Base::show() called");\r\n    }\r\n}\r\nclass Derived extends Base {\r\n    public static void show() {\r\n       System.out.println("Derived::show() called");\r\n    }\r\n}\r\nclass Main {\r\n    public static void main(String[] args) {\r\n        Base b = new Derived();\r\n        b.show();\r\n    }\r\n}\r\n</pre>', 'Derived::show() called', 'Base::show() called', 'Compile error', 'Runtime error', 2),
(75, 3, 1, '<pre style=''display:inline;''>Which of the following is true about inheritance in Java?\r\ni. Private members are final\r\nii. Protected members are final\r\niii. Protected members are accessible within a package\r\niv. We cannot override private methods\r\n</pre>', 'Only (i) and (ii)', '(i), (iii) and (iv)', '(ii), (iii) and (iv)', '(i), (ii) and (iii)', 2),
(76, 3, 1, '<pre style=''display:inline;''>What is the output of the following Java code?\r\npublic class Main {\r\n    public static void main(String args[]) {\r\n       int arr[] = {10, 20, 30, 40, 50};\r\n       for(int i=0; i < arr.length; i++)\r\n       {\r\n             System.out.print(arr[i] + " ");          	\r\n       }\r\n    }\r\n}\r\n</pre>', 'Compile error', '10 20 30 40', '10 20 30 40 50', 'Runtime error', 3),
(77, 3, 1, '<pre style=''display:inline;''>What is the output of the following Java program?\r\npublic class Main {\r\n    public static void main(String args[]) {\r\n       int t;\r\n       System.out.print(t);   \r\n    }\r\n}\r\n</pre>', '0', 'Garbage value', 'Compile error', 'Runtime error', 3),
(78, 3, 1, '<pre style=''display:inline;''>Which of the following statements is true?\r\ni.  Constants are declared using â€˜staticâ€™ keyword\r\nii. A class can only inherit one class\r\n</pre>', 'Only (i) is True', 'Only (ii) is True', 'Both are True', 'Both are False', 2),
(79, 3, 1, '<pre style=''display:inline;''>What is the output of the following Java code?\r\npublic class Main { \r\n    public static void main(String args[]) { \r\n       String x = null; \r\n       giveMeAString(x); \r\n       System.out.println(x); \r\n    } \r\n    static void giveMeAString(String y) \r\n    { \r\n       y = "Technovanza"; \r\n    } \r\n}\r\n</pre>', 'Technovanza', 'null', 'Compile error', 'Exception', 2),
(80, 3, 1, '<pre style=''display:inline;''>In Java, when we implement an interface method, it must be declared as?\r\n</pre>', 'Friend', 'Protected', 'Private', 'Public', 4),
(81, 3, 2, '<pre style=''display:inline;''>Predict the output?\r\nclass Main {\r\n    public static void main(String args[]) {  \r\n             System.out.println(fun());\r\n    }  \r\n    static int fun(int x = 0)\r\n    {\r\n      return x;\r\n    }\r\n}\r\n</pre>', '0', 'Garbage Value', 'Compile Error', 'Runtime Error', 3),
(82, 5, 2, '<pre style=''display:inline;''>Which of the following is not a stable sorting algorithm in its typical \r\nimplementation?\r\n</pre>', 'Insertion sort', 'Merge sort', 'Bubble sort', 'Quicksort', 4),
(83, 5, 1, '<pre style=''display:inline;''>What is the best time complexity of Bubble sort?\r\n</pre>', 'N^2', 'N log N', 'N', '1', 3),
(84, 2, 1, '<pre style=''display:inline;''>What is the output of the following C code?\r\nint fun(int n){\r\n    if (n == 4)\r\n       return n;\r\n    else return 2*fun(n+1);\r\n}\r\nint main(){\r\n   printf("%d ", fun(2));\r\n   return 0;\r\n}\r\n</pre>', '4', '8', '16', '24', 3),
(85, 2, 2, '<pre style=''display:inline;''>What is the output of the following C++ code?\r\nusing namespace std;\r\nint fun(int x, int y){\r\n    if (x == 0)\r\n       return y;\r\n    return fun(x-1, x + y);\r\n}\r\nint main(){\r\n   cout<<fun(4, 3);\r\n   return 0;\r\n}\r\n</pre>', '9', '10', '12', '13', 4),
(86, 2, 1, '<pre style=''display:inline;''>How do you initialise an array in C?</pre>', 'int arr[3] = (1, 2, 3);', 'int arr(3) = {1, 2, 3};', 'int arr[3] = {1, 2, 3};', 'int arr(3) = (1, 2, 3);', 3),
(87, 2, 1, '<pre style=''display:inline;''>Assume that the size of an integer and a pointer is 4 bytes. What is the output?\r\n#define R 10\r\n#define C 20\r\nint main()\r\n{\r\n   int (*p)[R][C];\r\n   printf("%d",  sizeof(*p));\r\n   getchar();\r\n   return 0;\r\n}\r\n</pre>', '200', '4', '800', '80', 3),
(88, 5, 1, '<pre style=''display:inline;''>In what notation is this expression â€˜6 3 2 4 + â€“ *â€™ written?\r\n</pre>', 'Prefix', 'Infix', 'Postorder', 'Postfix', 4),
(89, 5, 1, '<pre style=''display:inline;''>Which data structure allows for insertion and deletion at both ends?</pre>', 'Circular queue', 'Deque', 'Stack', 'Simple queue', 3),
(90, 5, 1, '<pre style=''display:inline;''>What is the name of the following matrix?\r\n1   0   0\r\n0   1   0\r\n0   0   1\r\n</pre>', 'Sparse matrix', 'Adjacency matrix', 'Identity matrix', 'None of the above', 3),
(91, 2, 1, '<pre style=''display:inline;''>What is the output of the following C code?\r\nint fun(int arr[]) {\r\n   arr = arr+1; \r\n   printf("%d ", arr[0]);\r\n}\r\nint main(void) {\r\n   int arr[2] = {10, 20};\r\n   fun(arr);\r\n   printf("%d", arr[0]);\r\n   return 0;\r\n}\r\n</pre>', '10 20', '20 20', '20 10', 'Compile Error', 3),
(92, 2, 2, '<pre style=''display:inline;''>Can you write a program in C++ without using the main() function?\r\n</pre>', 'Yes', 'No', 'Can''t Say', '------------', 1),
(93, 2, 2, '<pre style=''display:inline;''>What is the output of the following C++ program?\r\nusing namespace std;\r\nclass Test{\r\n    static int x;\r\npublic:\r\n    Test() { x++; }\r\n    static int getX() {return x;}\r\n};\r\nint Test::x = 0;\r\nint main(){\r\n    cout << Test::getX() << " ";\r\n    Test t[5];\r\n    cout << Test::getX();\r\n}\r\n</pre>', '0 0', '0 5', '5 5', 'Compile Error', 2),
(94, 2, 2, '<pre style=''display:inline;''>Predict the output of following C++ program\r\nusing namespace std;\r\nclass Empty {};\r\nint main()\r\n{\r\n  cout << sizeof(Empty);\r\n  return 0;\r\n}\r\n</pre>', 'A non-zero value', '0', 'Compile Error', 'Runtime Error', 1),
(95, 4, 2, '<pre style=''display:inline;''>What will be the output of the following statement?\r\nprint (type(type(int)))\r\n</pre>', 'Type â€˜intâ€™', 'Type â€˜typeâ€™', '0', 'Compile Error', 2),
(96, 4, 1, '<pre style=''display:inline;''>What is the output of the following Python code?\r\nx = 5\r\ny = 3\r\nz = 0\r\nif x>y:\r\n    z = x\r\n    z = y\r\nprint(z)\r\n</pre>', '5', '0', '3', 'Compile error', 3),
(97, 4, 1, '<pre style=''display:inline;''>What is the output of the following Python program?\r\ni = 0\r\nwhile i < 3:\r\n    print (i)\r\n    i++\r\n    print (i+1)\r\n</pre>', '0 2 1 3 2 4', '0 1 2 3 4 5', '0', 'Compile error', 4),
(98, 4, 1, '<pre style=''display:inline;''>What will be the value of the following expression?\r\n3*1**3\r\n</pre>', '0', '27', '9', 'Cannot be determined', 2),
(99, 1, 1, '<pre style=''display:inline;''>Which of the following is not a data structure?\n</pre>', 'Array', 'Stack', 'Queue', 'None of the above', 4),
(100, 5, 1, '<pre style=''display:inline;''>If the average time complexity of an algorithm is O(1), then it is a ______?</pre>', 'Slow algorithm', 'Average algorithm', 'Fast algorithm', 'Cannot be decided', 3),
(101, 1, 1, '<pre style=''display:inline;''>What is the indegree of the root node of a tree?\r\n</pre>', '0', '2', '1', 'Canâ€™t say', 1),
(102, 2, 1, '<pre style=''display:inline;''>In C, what is appended to the end of the string?\r\n</pre>', '\\n', '\\\\', '\\0', '\\o', 3),
(103, 1, 1, '<pre style=''display:inline;''>When does the top value of a stack change?\r\n</pre>', 'While checking overflow', 'Before deletion', 'Before insertion', 'After insertion', 4),
(104, 2, 2, '<pre style=''display:inline;''>What is the output of the following C++ program?\r\nusing namespace std;\r\nclass A{\r\n    public:\r\n    virtual void show(){\r\n        cout<<"Hello";\r\n    }\r\n};\r\nint main()\r\n{\r\n    cout<<sizeof(A)<<endl;\r\n    return 0;\r\n}\r\n</pre>', '4', '0', '8', 'Compile error', 3),
(105, 4, 2, '<pre style=''display:inline;''>dictionary1 = {''GFG'' : 1, \r\n			''Google'' : 2, \r\n			''GFG'' : 3\r\n			} \r\nprint(dictionary1[''GFG'']); \r\n</pre>', 'Compilation error due to duplicate keys', 'Runtime time error due to duplicate keys', '3', '1', 3);

-- --------------------------------------------------------

--
-- Table structure for table `uc_quiz_attempt`
--

CREATE TABLE `uc_quiz_attempt` (
  `attempt_id` int(11) NOT NULL,
  `result_id` int(100) NOT NULL,
  `question_id` int(100) NOT NULL,
  `answer` tinyint(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `uc_quiz_result`
--

CREATE TABLE `uc_quiz_result` (
  `result_id` int(11) NOT NULL,
  `batch_id` int(100) NOT NULL,
  `team_id` int(100) NOT NULL,
  `attempted` int(100) NOT NULL,
  `not_attempted` int(100) NOT NULL,
  `right` int(100) NOT NULL,
  `wrong` int(100) NOT NULL,
  `marks_obtained` int(100) NOT NULL,
  `total_marks` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `uc_team`
--

CREATE TABLE `uc_team` (
  `team_id` int(100) NOT NULL,
  `team_name` varchar(100) NOT NULL,
  `teammate_1` varchar(100) NOT NULL,
  `teammate_2` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uc_team`
--

INSERT INTO `uc_team` (`team_id`, `team_name`, `teammate_1`, `teammate_2`) VALUES
(1, 'Ultimate Coder', 'Aaron', 'Sujit');

-- --------------------------------------------------------

--
-- Table structure for table `uc_user`
--

CREATE TABLE `uc_user` (
  `user_id` tinyint(4) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uc_user`
--

INSERT INTO `uc_user` (`user_id`, `username`, `password`, `f_name`, `l_name`) VALUES
(1, 'Sujit_Singh', 'uc_2019', 'Sujit', 'Singh'),
(2, 'Ace', 'ultimatesnap', 'Aaron', 'Pereira');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `uc_batch`
--
ALTER TABLE `uc_batch`
  ADD PRIMARY KEY (`batch_id`);

--
-- Indexes for table `uc_batch_team`
--
ALTER TABLE `uc_batch_team`
  ADD PRIMARY KEY (`batch_team_id`);

--
-- Indexes for table `uc_question`
--
ALTER TABLE `uc_question`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `uc_quiz_attempt`
--
ALTER TABLE `uc_quiz_attempt`
  ADD PRIMARY KEY (`attempt_id`);

--
-- Indexes for table `uc_quiz_result`
--
ALTER TABLE `uc_quiz_result`
  ADD PRIMARY KEY (`result_id`);

--
-- Indexes for table `uc_team`
--
ALTER TABLE `uc_team`
  ADD PRIMARY KEY (`team_id`);

--
-- Indexes for table `uc_user`
--
ALTER TABLE `uc_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `uc_batch`
--
ALTER TABLE `uc_batch`
  MODIFY `batch_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `uc_batch_team`
--
ALTER TABLE `uc_batch_team`
  MODIFY `batch_team_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `uc_question`
--
ALTER TABLE `uc_question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;
--
-- AUTO_INCREMENT for table `uc_quiz_attempt`
--
ALTER TABLE `uc_quiz_attempt`
  MODIFY `attempt_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `uc_quiz_result`
--
ALTER TABLE `uc_quiz_result`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `uc_team`
--
ALTER TABLE `uc_team`
  MODIFY `team_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `uc_user`
--
ALTER TABLE `uc_user`
  MODIFY `user_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
