'use client';

import type { Metadata } from 'next'

export const metadata: Metadata = {
  title: 'Login',
}

export default function LoginPage() {
  return (
    <main className="flex min-h-screen flex-col items-center justify-center p-24">
      <h1 className="text-4xl font-bold mb-8">Login</h1>
      <form className="flex flex-col gap-4">
        <div className="flex flex-col">
          <label htmlFor="email" className="mb-1">Email</label>
          <input
            id="email"
            name="email"
            type="email"
            placeholder="Email"
            className="p-2 border border-gray-300 rounded"
            required
          />
        </div>
        <div className="flex flex-col">
          <label htmlFor="password" className="mb-1">Password</label>
          <input
            id="password"
            name="password"
            type="password"
            placeholder="Password"
            className="p-2 border border-gray-300 rounded"
            required
          />
        </div>
        <button type="submit" className="p-2 bg-blue-500 text-white rounded">
          Log In
        </button>
      </form>
    </main>
  )
}
