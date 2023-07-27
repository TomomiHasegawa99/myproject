<?php 

  // 変数の初期化
  $page_flag = 0;
  $clean = array();
  $error = array();


  // サニタイズ
  if( !empty($_POST) ) {
    foreach( $_POST as $key => $value ) {
      $clean[$key] = htmlspecialchars( $value, ENT_QUOTES);
    }
  }

  if( !empty($clean['btn_confirm']) ) {
    //$_POST['btn_confirm']の値が渡されているか確認

    $error = validation($clean);

    if( empty($error) ) { 
      //エラーがなかったら、確認ページへ
      $page_flag = 1;

      // セッションの書き込み
      session_start();
      $_SESSION['page'] = true;
    }
  }
  elseif( !empty($clean['btn_submit']) ) {
    //$_POST[‘btn_submit’]の値が渡されているか確認
      $page_flag = 2;
  }

  //入力ページや確認ページの表示をスイッチするフラグになる
  //$_POST[‘btn_confirm’]があれば、確認ページへ進む

  //[0]入力
  //[1]確認
  //[2]完了

  function validation($data)
    {
      $error = array();

      // タイトルのバリデーション
      if( empty($data['n_title']) ) {
        $error[] = "「タイトル」は必ず入力してください。";
      } 

      return $error;
    }
?>

<!DOCTYPE >
<html lang="ja">

<head>
  <meta charset="utf-8">
  <title>新規登録</title>
    
  <style rel="stylesheet" type="text/css">
    body {
      padding: 20px;
      text-align: center;
    }

    h1 {
      margin-bottom: 20px;
      padding: 20px 0;
      color: #209eff;
      font-size: 122%;
      border-top: 1px solid #999;
      border-bottom: 1px solid #999;
    }

    input[type=text] {
      padding: 5px 10px;
      font-size: 86%;
      border: none;
      border-radius: 3px;
      background: #ddf0ff;
    }

    /* ボタン系 */
    input[name=btn_confirm],
    input[name=btn_submit],
    input[name=btn_back],
    input[name=btn_li],
    input[name=btn_continue] {
      margin: 10px 10px 0 ;
      padding: 5px 20px;
      font-size: 100%;
      color: #fff;
      cursor: pointer;
      border: none;
      border-radius: 3px;
      background: #4eaaf1;
      transition: 0.2s;
    }

    input[name=btn_confirm]:hover,
    input[name=btn_submit]:hover{
      background-color: #4ebbf2;
    }

    input[name=btn_li]{
      background-color: #009966;
    }

    input[name=btn_li]:hover {
      background-color: #00b377;
    }

    input[name=btn_back] {
      background: #999;
      transition: 0.2s;
    }

    input[name=btn_back]:hover {
      color: #000;
      background: #ccc;
    }
    
    input[name=btn_continue] {
      color: #000;
      background: #fff;
      border: 1px solid #999;
    }

    input[name=btn_continue]:hover {
      color: #fff;
      background: #4eaaf1;
      border: 1px solid #4eaaf1;
    }

    .element_wrap {
      margin:0 100px 10px;
      padding: 10px 0;
      border-bottom: 1px solid #ccc;
      text-align: left;
    }

    label {
      display: inline-block;
      text-align: right;
      margin-right: 15px;
      margin-bottom: 10px;
      font-weight: bold;
      width: 120px;
    }

    div.element_wrap label{
      margin: 0 25px 10px 270px;
    }

    .element_wrap p {
      display: inline-block;
      margin:  0;
      text-align: left;
      max-width: 300px;
    }


    div.input_new{
      display: inline-block;
      text-align: center;
    }

    div.btn_1{
      display: block;
      text-align: center;
    }

    div.i_new{
      margin-right: 5px;
      padding-right: 50px;
    }

    input#i_date{
      margin: 5px 37px 5px 0;
      padding: 5px 20px 5px 15px;
      width: 155px;
    }

    textarea[name=n_biko]{
      margin: 5px 0px -5px 0px;
      width: 195px;
      height: 50px;
      resize: vertical;
    }

    div.k_new{
      margin: 0 10%;
      padding: 0px 40px 0px 40px;
    }

    .error_list {
      padding: 10px 30px;
      color: #ff2e5a;
      font-size: 86%;
      text-align: left;
      border: 1px solid #ff2e5a;
      border-radius: 5px;
    }

  </style>

</head>
<body>

    <h1>新規登録</h1>

    <!-- 確認ページ内容 -->
<?php if( $page_flag === 1 ): ?>
  

  <form method="post" action="">
   <div class="k_new">
    <div class="element_wrap">
      <label>タイトル</label>
      <p><?php echo $clean['n_title']; ?></p>
    </div>
    <div class="element_wrap">
      <label>著者</label>
      <p><?php echo $clean['n_author']; ?></p>
    </div>
    <div class="element_wrap">
      <label>購入日</label>
      <p><?php echo $clean['buy_d']; ?></p>
    </div>
    <div class="element_wrap">
      <label>出版社</label>
      <p><?php echo $clean['n_shupan']; ?></p>
    </div>
    <div class="element_wrap">
      <label>次回発売日</label>
      <p><?php echo $clean['jikai_d']; ?></p>
    </div>
    <div class="element_wrap">
      <label>備考欄</label>
      <p><?php echo nl2br($clean['n_biko']); ?></p>
    </div>
    <br>
    <!-- 入力値の受け渡し -->
    <input type="submit" name="btn_back" value="戻る">
    <input type="submit" name="btn_submit" value="登録">
    <input type="hidden" name="n_title" value="<?php echo $_POST['n_title']; ?>">
    <input type="hidden" name="n_author" value="<?php echo $_POST['n_author']; ?>">
    <input type="hidden" name="buy_d" value="<?php echo $_POST['buy_d']; ?>">
    <input type="hidden" name="n_shupan" value="<?php echo $_POST['n_shupan']; ?>">
    <input type="hidden" name="jikai_d" value="<?php echo $_POST['jikai_d']; ?>">
    <input type="hidden" name="n_biko" value="<?php echo $_POST['n_biko']; ?>">
  </form>

  <!-- 完了ページの内容-->
<?php elseif( $page_flag === 2 ): ?>

  <br>
  <p>登録が完了しました。</p>

  <br>
  <div>
    <!-- 本リストに戻る -->
    <input type="button" name="btn_li" onclick="location.href='list.html?ListS=1'" value="◀ 本リスト">
    <!-- 続けて新規登録を行なう -->
    <input type="button" name="btn_continue" onclick="location.href='li_index2.php'" value="続けて登録する">
  </div>

  <!-- 入力ページの内容 -->
<?php else: ?>

  <?php if( !empty($error) ): ?>
    <ul class="error_list">
    <?php foreach( $error as $value ): ?>
      <li><?php echo $value; ?></li>
    <?php endforeach; ?>
    </ul>
  <?php endif; ?>
    
    <form method="post" action="" >
      <div class="input_new">
        <div class="i_new">
          <br>
        <div>
          <label>タイトル</label> <!-- new_title -->
          <input type="text" id="i_tx" name="n_title" required minlength="1" maxlength="100" value="<?php if( !empty($clean['n_title']) ){ echo $clean['n_title']; } ?>">
        </div>
        <div>
          <label>著者</label> <!-- new_author -->
          <input type="text" id="i_tx" name="n_author"  maxlength="100" value="<?php if( !empty($clean['n_author']) ){ echo $clean['n_author']; } ?>">
        </div>
        <div>
          <label>購入日</label> <!-- buy_date -->
          
          <!-- インプット版 -->
            <input type="date" id="i_date" name="buy_d" min="1945-01-01" max="2050-12-31" value="<?php  if( !empty($_POST['buy_d']) ){ echo $_POST['buy_d']; } ?>">
        </div>
        <div>
          <label>出版社</label> <!-- new_shupan -->
          <input type="text" id="i_tx" name="n_shupan"  maxlength="100" value="<?php if( !empty($clean['n_shupan']) ){ echo $clean['n_shupan']; } ?>">
        </div>
        <div>
          <label>次回発売日</label> <!-- jikai_date -->
          <!-- インプット版 -->
            <input type="date" id="i_date" name="jikai_d" min="1945-01-01" max="2060-12-31" value="<?php if( !empty($_POST['jikai_d']) ){ echo $_POST['jikai_d']; } ?>">

        </div>
        <div>
          <label>備考欄</label> <!-- new_biko -->
          <textarea name="n_biko" maxlength="100" value="<?php if( !empty($clean['n_biko']) ){ echo $clean['n_biko']; } ?>"></textarea>
        </div>
        </div>
        <br>
        <!-- 本リストに戻る -->
        <div class="btn_1">
          <input type="button" name="btn_li" onclick="location.href='list.html?ListS=1'" value="◀ 本リスト">
        <!-- 確認ページに移行する -->
          <input type="submit" name="btn_confirm" value="入力を確認する">
        </div>
      </div>
    </form>

<?php endif; ?>

</body>
</html>
