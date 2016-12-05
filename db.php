<?php
// db.php for fredbooks website

class DB{
  public static function CreateConnection() {
    $connection = new mysqli('fredonia-207.ctq8nkxhifvb.us-west-2.rds.amazonaws.com',
     'lee',
      'UHD113r',
       'final_lee01');
    if($connection->connect_error) {
      echo "Connection error: " . $connection->connect_error;
    }
    return $connection;
  }

  public static function CreateUser($username, $pw, $first, $last, $email, $phone) {
    $connection = DB::CreateConnection();
    $sql = $connection->prepare("
    INSERT INTO User (username, pw, firstName, lastName, email, phone) VALUES (?, ?, ?, ?, ?, ?)
    ");
    $sql->bind_param("ssssss", $username, $pw, $first, $last, $email, $phone);
    $sql->execute();
    $connection->close();
  }

  public static function CreateBook($title, $author, $isbn, $price, $userId, $image) {
    $connection = DB::CreateConnection();
    $sql = $connection->prepare("
      INSERT INTO Book(title, author, ISBN, price, user_id, image) VALUES(?, ?, ?, ?, ?, ?)
    ");
    $sql->bind_param("ssssib", $title, $author, $isbn, $price, $userId, $image);
    $sql->execute();
    $connection->close();
  }

  public static function GetBookId($title, $author, $isbn, $price, $userId) {
    $connection = DB::CreateConnection();
    $sql = $connection->prepare("
      SELECT id FROM Book WHERE title = ? &&
                                author = ? &&
                                ISBN = ? &&
                                price = ? &&
                                user_id = ?
    ");
    $sql->bind_param("ssssi", $title, $author, $isbn, $price, $userId);
    $sql->execute();
    $sql->bind_result($foundBookId);
    $sql->fetch();
    return $foundBookId;
    $connection->close();
  }

  public static function CreateBookStatus($bookId, $purchased, $condition) {
    $connection = DB::CreateConnection();
    $sql = $connection->prepare("
      INSERT INTO Book_Status (`condition`, purchased, book_id) VALUES (?, ?, ?)
    ");
    $sql->bind_param("ssi", $condition, $purchased, $bookId);
    $sql->execute();
    $connection->close();
  }

  public static function CreateUsage($bookId, $major, $course, $instructor) {
    $connection = DB::CreateConnection();
    $sql = $connection->prepare("
      INSERT INTO `Usage` (book_id, major, course, instructor) VALUES (?, ?, ?, ?)
    ");
    $sql->bind_param("isss", $bookId, $major, $course, $instructor);
    $sql->execute();
    $connection->close();
  }

  public static function UserIdByUsernameAndPassword($username, $password) {
    $connection = DB::CreateConnection();
    $sql = $connection->prepare("
      SELECT id FROM User WHERE username = ? && pw = ?
    ");
    if(!$sql->bind_param("ss", $username, $password)) {
      die("bind error");
    }
    $sql->execute();
    $sql->bind_result($userId);
    $sql->fetch();
    return $userId;
    $connection->close();
  }

  public static function GetAllBooks() {
    $connection = DB::CreateConnection();
    $sql = $connection->query("
    SELECT Book.id, Book.title, Book.author, Book.ISBN, Book.price, Book.image, Book.user_id,
	         Book_Status.purchased, Book_Status.`condition`,
           `Usage`.major, `Usage`.course, `Usage`.instructor
    FROM Book, Book_Status, `Usage`
    WHERE Book.id=Book_Status.book_id && Book.id=`Usage`.book_id
    ORDER BY Book.id
    ");
    $books =[];
    while($row = $sql->fetch_assoc()) {
      $books[] = $row;
    }
    return $books;
    $connection->close();
  }

  public static function GetInfoByBookId($bookId) {
    $connection = DB::CreateConnection();
    $sql = $connection->prepare("
      SELECT Book.title, Book.author, Book.ISBN, Book.price, Book.image,
      Book_Status.purchased, Book_Status.`condition`,
      `Usage`.major, `Usage`.course, `Usage`.instructor
      FROM Book, Book_Status, `Usage`
      WHERE Book.id = ? && Book_Status.book_id = ? && `Usage`.book_id = ?
    ");
    $sql->bind_param("iii", $bookId, $bookId, $bookId);
    $sql->execute();
    $sql->bind_result($title, $author, $isbn, $price, $image, $purchased, $condition,
                      $major, $course, $instructor);
    $sql->fetch();
    if($title) {
      $book = [];
      $book['title'] = $title;
      $book['author'] = $author;
      $book['isbn'] = $isbn;
      $book['price'] = $price;
      $book['image'] = $image;
      $book['purchased'] = $purchased;
      $book['condition'] = $condition;
      $book['major'] = $major;
      $book['course'] = $course;
      $book['instructor'] = $instructor;
      return $book;
    }
    $connection->close();
  }

  public static function DeleteBookByBookId($bookId) {
    $connection = DB::CreateConnection();
    $sql = $connection->prepare("
      DELETE FROM Book WHERE id=?;
    ");
    $sql->bind_param("i", $bookId);
    $sql->execute();
    $sql = $connection->prepare("
      DELETE FROM Book_Status WHERE Book_Status.book_id = ?;
    ");
    $sql->bind_param("i", $bookId);
    $sql->execute();
    $sql = $connection->prepare("
      DELETE FROM `Usage` WHERE `Usage`.book_id=?;
    ");
    $sql->bind_param("i", $bookId);
    $sql->execute();
    $connection->close();
  }

  public static function UpdateBookByBookId($title, $author, $isbn, $price,
                                            $condition, $purchased, $major, $course,
                                            $instructor, $bookId) {
    $connection = DB::CreateConnection();
    $sql = $connection->prepare("
      UPDATE Book SET title=?, author=?, isbn=?, price=? WHERE id=?;
    ");
    $sql->bind_param("ssssi", $title, $author, $isbn, $price, $bookId);
    $sql->execute();
    $sql = $connection->prepare("
      UPDATE Book_Status SET `condition`=?, purchased = ? WHERE Book_Status.book_id = ?;
    ");
    $sql->bind_param("ssi", $condition, $purchased, $bookId);
    $sql->execute();
    $sql = $connection->prepare("
      UPDATE `Usage` SET major=?, course=?, instructor=? WHERE `Usage`.book_id=?;
    ");
    $sql->bind_param("sssi", $major, $course, $instructor, $bookId);
    $sql->execute();
    $connection->close();
  }

  public static function SearchBookIdByTitle($title) {
    $connection = DB::CreateConnection();
    $title = $title . '%';
    $sql = $connection->prepare("
      SELECT id FROM Book WHERE title LIKE ?;
    ");
    $sql->bind_param("s", $title);
    $sql->execute();
    $sql->bind_result($id);
    $sql->fetch();
    $connection->close();
    return $id;
  }

}
 ?>
