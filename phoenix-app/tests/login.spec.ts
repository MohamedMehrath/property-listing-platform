import { test, expect } from '@playwright/test';

test.describe('Login Page', () => {
  test('should display the login page correctly', async ({ page }) => {
    await page.goto('/login');

    await expect(page).toHaveTitle(/Login/);

    const heading = page.locator('h1', { hasText: 'Login' });
    await expect(heading).toBeVisible();

    const emailInput = page.locator('input[type="email"]');
    await expect(emailInput).toBeVisible();

    const passwordInput = page.locator('input[type="password"]');
    await expect(passwordInput).toBeVisible();

    const loginButton = page.locator('button', { hasText: 'Log In' });
    await expect(loginButton).toBeVisible();
  });
});
