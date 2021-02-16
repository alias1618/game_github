<tr>
  <td text-align="center">帳號</td>
  <td><?php 
  session_start();
  echo $_SESSION["manager_account"]; 
  ?></td>
</tr>
  <li class="nav-item">
    <a class="nav-link" href="backend.php">管理頁面</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="">下單管理</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="backend_add_wallet.php">加值管理</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="backend_withdraw.php">提領管理</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="backend_interchange.php">互轉管理</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="admin.php">登入</a>
    </li>
  <li class="nav-item">
    <a class="nav-link" href="backend_logout.php">登出</a>
  </li>