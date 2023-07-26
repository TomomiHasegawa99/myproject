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

      // 名称のバリデーション
      if( empty($data['n_name']) ) {
        $error[] = "「名称」は必ず入力してください。";
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
      margin: 0 100px 10px;
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
      margin: 0;
      text-align: left;
      max-width: 300px;
    }

    .input_new{
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

    select[name=n_number]{
      margin: 5px 92px 5px 0;
      padding: 5px 20px 5px 32px;
      width: 100px;
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
      <label>名称</label>
      <p><?php echo $clean['n_name']; ?></p>
    </div>
    <div class="element_wrap">
      <label>購入日</label>
      <p><?php echo $clean['buy_d']; ?></p>
    </div>
    <div class="element_wrap">
      <label>個数</label>
      <p>
        <?php if( $_POST['n_number'] === "1" ){ echo '1'; }
        elseif( $_POST['n_number'] === "2" ){ echo '2'; }
        elseif( $_POST['n_number'] === "3" ){ echo '3'; }
        elseif( $_POST['n_number'] === "4" ){ echo '4'; }
        elseif( $_POST['n_number'] === "5" ){ echo '5'; }
        elseif( $_POST['n_number'] === "6" ){ echo '6'; }
        elseif( $_POST['n_number'] === "7" ){ echo '7'; }
        elseif( $_POST['n_number'] === "8" ){ echo '8'; }
        elseif( $_POST['n_number'] === "9" ){ echo '9'; }
        elseif( $_POST['n_number'] === "10" ){ echo '10'; }
        elseif( $_POST['n_number'] === "11" ){ echo '11'; }
        elseif( $_POST['n_number'] === "12" ){ echo '12'; } 
        else{ echo '0'; } ?>
      </p>
    </div>
    <div class="element_wrap">
      <label>賞味・消費期限</label>
      <p><?php echo $clean['kigen_d']; ?></p>
    </div>
    <div class="element_wrap">
      <label>備考欄</label>
      <p><?php echo nl2br($clean['n_biko']); ?></p>
    </div>
    <br>
    <!-- 入力値の受け渡し -->
    <input type="submit" name="btn_back" value="戻る">
    <input type="submit" name="btn_submit" value="登録">
    <input type="hidden" name="n_name" value="<?php echo $_POST['n_name']; ?>">
    <input type="hidden" name="buy_d" value="<?php echo $_POST['buy_d']; ?>">
    <input type="hidden" name="n_number" value="<?php echo $_POST['n_number']; ?>">
    <input type="hidden" name="kigen_d" value="<?php echo $_POST['kigen_d']; ?>">
    <input type="hidden" name="n_biko" value="<?php echo $_POST['n_biko']; ?>">
   </div>
  </form>

  <!-- 完了ページの内容-->
<?php elseif( $page_flag === 2 ): ?>

  <br>
  <p>登録が完了しました。</p>

  <br>
  <div>
    <!-- 食材リストに戻る -->
    <input type="button" name="btn_li" onclick="location.href='list.html?ListS=2'" value="◀ 食材リスト">
    <!-- 続けて新規登録を行なう -->
    <input type="button" name="btn_continue" onclick="location.href='index3.php'" value="続けて登録する">
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
          <label>名称</label> <!-- new_name -->
          <input type="text" id="i_tx" name="n_name" required minlength="1" maxlength="100" value="<?php if( !empty($clean['n_name']) ){ echo $clean['n_name']; } ?>">
        </div>
        <div>
          <label>購入日</label> <!-- buy_date -->
          
          <!-- インプット版 -->
            <input type="date" id="i_date" name="buy_d" min="1945-01-01" max="2050-12-31" value="<?php  if( !empty($_POST['buy_d']) ){ echo $_POST['buy_d']; } ?>">
        </div>
        <div>
          <label>個数</label> <!-- new_number -->
          <select name="n_number">
            <option value="">--</option>
            <option value="1" <?php if( !empty($_POST['n_number']) && $_POST['n_number'] === "1" ){ echo 'selected'; } ?>>1</option>
            <option value="2" <?php if( !empty($_POST['n_number']) && $_POST['n_number'] === "2" ){ echo 'selected'; } ?>>2</option>
            <option value="3" <?php if( !empty($_POST['n_number']) && $_POST['n_number'] === "3" ){ echo 'selected'; } ?>>3</option>
            <option value="4"  <?php if( !empty($_POST['n_number']) && $_POST['n_number'] === "4" ){ echo 'selected'; } ?>>4</option>
            <option value="5" <?php if( !empty($_POST['n_number']) && $_POST['n_number'] === "5" ){ echo 'selected'; } ?>>5</option>
            <option value="6" <?php if( !empty($_POST['n_number']) && $_POST['n_number'] === "6" ){ echo 'selected'; } ?>>6</option>
            <option value="7" <?php if( !empty($_POST['n_number']) && $_POST['n_number'] === "7" ){ echo 'selected'; } ?>>7</option>
            <option value="8" <?php if( !empty($_POST['n_number']) && $_POST['n_number'] === "8" ){ echo 'selected'; } ?>>8</option>
            <option value="9" <?php if( !empty($_POST['n_number']) && $_POST['n_number'] === "9" ){ echo 'selected'; } ?>>9</option>
            <option value="10" <?php if( !empty($_POST['n_number']) && $_POST['n_number'] === "10" ){ echo 'selected'; } ?>>10</option>
            <option value="10" <?php if( !empty($_POST['n_number']) && $_POST['n_number'] === "11" ){ echo 'selected'; } ?>>11</option>
            <option value="10" <?php if( !empty($_POST['n_number']) && $_POST['n_number'] === "12" ){ echo 'selected'; } ?>>12</option>
          </select>
        </div>
        <div>
          <label>賞味・消費期限</label> <!-- kigen_date -->
          <!-- インプット版 -->
            <input type="date" id="i_date" name="kigen_d" min="1945-01-01" max="2060-12-31" value="<?php if( !empty($_POST['kigen_d']) ){ echo $_POST['kigen_d']; } ?>">
        </div>
        <div>
          <label>備考欄</label> <!-- new_biko -->
          <textarea name="n_biko" maxlength="100" value="<?php if( !empty($clean['n_biko']) ){ echo $clean['n_biko']; } ?>"></textarea>
        </div>
        </div>
        <br>
        <!-- 本リストに戻る -->
        <div class="btn_1">
        <!--  <input type="button" name="btn_li" onclick="location.href='list.html?ListS=2'" value="◀ 食材リスト"> -->
          <input type="button" name="btn_li" onclick="location.href='list2.php'" value="◀ 食材リスト">
        <!-- 確認ページに移行する -->
          <input type="submit" name="btn_confirm" value="入力を確認する">
        </div>
      </div>
    </form>
    <a href="index.html">戻る</a><BR>
<?php endif; ?>

</body>
</html>