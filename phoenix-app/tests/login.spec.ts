import { test, expect } from '@playwright/test';

test.describe('Login Page', () => {
  test('should display the login page correctly', async ({ page }) => {
    await page.goto('/login');

    await expect(page).toHaveTitle(/Login/);

    const heading = page.getByRole('heading', { name: 'Login' });
    await expect(heading).toBeVisible();

    const emailInput = page.getByPlaceholder('Email');
    await expect(emailInput).toBeVisible();

    const passwordInput = page.getByPlaceholder('Password');
    await expect(passwordInput).toBeVisible();

    const loginButton = page.getByRole('button', { name: 'Log In' });
    await expect(loginButton).toBeVisible();
  });
});
