import { test, expect } from '@playwright/test';

test('has title', async ({ page }) => {
  await page.goto('http://127.0.0.1:8000/');

  // Expect a title "to contain" a substring.
  await expect(page).toHaveTitle(/Home/);
});

// đăng nhập tk user
test('Successfully logged in as user', async ({ page }) => {
  // Điều hướng đến trang đăng nhập user
  await page.goto('http://127.0.0.1:8000/auth/login');

  // Nhập thông tin đăng nhập và nhấn nút đăng nhập
  await page.fill('input[name=email]', 'lethuy.sota@gmail.com');
  await page.fill('input[name=password]', '12345678');
  // 
  const loginButton = await page.getByRole('button', { name: 'Login', exact: true });
  await loginButton.click();

  await page.waitForTimeout(2000);
  // Kiểm tra xem đã chuyển hướng đến trang mong muốn hay chưa
  const currentUrl = page.url();
  expect(currentUrl).toBe('http://127.0.0.1:8000/');
});



// Đăng nhập thất bại tk user
test('Login failed', async ({ page }) => {
  // Điều hướng đến trang đăng nhập user
  await page.goto('http://127.0.0.1:8000/auth/login');

  // Nhập thông tin đăng nhập và nhấn nút đăng nhập
  await page.fill('input[name=email]', 'lethuy23.sota@gmail.com');
  await page.fill('input[name=password]', '345678');
  // 
  const loginButton = await page.getByRole('button', { name: 'Login', exact: true });
  await loginButton.click();

  await page.waitForTimeout(2000);
 
});



//   bỏ trống tất cả
test('Leave all blank', async ({ page }) => {
 // Điều hướng đến trang đăng nhập user
 await page.goto('http://127.0.0.1:8000/auth/login');

 // Để trống không nhập thông tin đăng nhập và nhấn nút đăng nhập
 await page.fill('input[name=email]', '');
 await page.fill('input[name=password]', '');
 // 
 const loginButton = await page.getByRole('button', { name: 'Login', exact: true });
 await loginButton.click();
// 
 await page.waitForTimeout(2000);
});



//  Để trống email 
test('Leave email blank', async ({ page }) => {
  // Điều hướng đến trang đăng nhập user
  await page.goto('http://127.0.01:8000/auth/login');
 
  // Để trống không nhập thông tin đăng nhập và nhấn nút đăng nhập
  await page.fill('input[name=email]', '');
  await page.fill('input[name=password]', '12345678');
  // 
  const loginButton = await page.getByRole('button', { name: 'Login', exact: true });
  await loginButton.click();
 // 
  await page.waitForTimeout(2000);
 });


 //  Để trống pass 
test('Leave pass blank', async ({ page }) => {
  // Điều hướng đến trang đăng nhập user
  await page.goto('http://127.0.0.1:8000/auth/login');
 
  // Để trống không nhập thông tin đăng nhập và nhấn nút đăng nhập
  await page.fill('input[name=email]', 'lethuy.sota@gmail.com');
  await page.fill('input[name=password]', '');
  // 
  const loginButton = await page.getByRole('button', { name: 'Login', exact: true });
  await loginButton.click();
 // 
  await page.waitForTimeout(2000);
 });

 //  Nhập nhiều quá 255 kí tự, đúng pasword
test('Email longer than 255 characters', async ({ page }) => {
  // Điều hướng đến trang đăng nhập user
  await page.goto('http://127.0.0.1:8000/auth/login');
 
  // Để trống không nhập thông tin đăng nhập và nhấn nút đăng nhập
  await page.fill('input[name=email]', 'lethuy.sota@gmail.comdddddddddddddddddddddddddddddfffffffffffffffffffhhhhhhhhhhhhhhhhhhhjjjjjjjjjjjjjjjjjjjtttttttttttttttttttkkkkkkkkkkkkkkkkkkkyyyyyyyyyyyyyyyyyyyjjjjjjllllllllllllllllllljjjjjjjjjjjjjkkkkkkkkkkkkkkkkkkkuiiiiiiiiiiiiiiiiiiooooooooooooooooooo');
  await page.fill('input[name=password]', '12345678');
  // 
  const loginButton = await page.getByRole('button', { name: 'Login', exact: true });
  await loginButton.click();
 // 
  await page.waitForTimeout(2000);
 });



 //  Nhập <8 kí tự trong password, email nhập đúng
 test('Pass less than 8 characters', async ({ page }) => {
  // Điều hướng đến trang đăng nhập user
  await page.goto('http://127.0.0.1:8000/auth/login');
 
  // Để trống không nhập thông tin đăng nhập và nhấn nút đăng nhập
  await page.fill('input[name=email]', 'lethuy.sota@gmail.com');
  await page.fill('input[name=password]', '123456');
  // 
  const loginButton = await page.getByRole('button', { name: 'Login', exact: true });
  await loginButton.click();
 // 
  await page.waitForTimeout(2000);
 });



// Nhập email bỏ "@"
test('Enter email without @ character ', async ({ page }) => {
 // Điều hướng đến trang đăng nhập user
 await page.goto('http://127.0.0.1:8000/auth/login');

 // Để trống không nhập thông tin đăng nhập và nhấn nút đăng nhập
 await page.fill('input[name=email]', 'lethuy.sotagmail.com');
 await page.fill('input[name=password]', '12345678');
 // 
 const loginButton = await page.getByRole('button', { name: 'Login', exact: true });
 await loginButton.click();
// 
 await page.waitForTimeout(2000);
});


// Nhập email bỏ ".com"
test('Enter email without .com character ', async ({ page }) => {
  // Điều hướng đến trang đăng nhập user
  await page.goto('http://127.0.0.1:8000/auth/login');
 
  // Để trống không nhập thông tin đăng nhập và nhấn nút đăng nhập
  await page.fill('input[name=email]', 'lethuy.sota@gmail');
  await page.fill('input[name=password]', '12345678');
  // 
  const loginButton = await page.getByRole('button', { name: 'Login', exact: true });
  await loginButton.click();
 // 
  await page.waitForTimeout(2000);
 });



 


