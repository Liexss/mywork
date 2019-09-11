#include<stdio.h>
#include<iostream>
#include<cstring>
#include<algorithm>
#include<math.h>
using namespace std;
typedef long long ll;
const int Max = 2;
const int mod = 998244353;
const int n = 2;
long long bn[10000000];
struct Matrix
{
	ll a[Max][Max];
	Matrix operator * (Matrix b)
	{
		Matrix c;
		memset(c.a, 0, sizeof(c.a));
		for (int i = 0; i < n; i++)
		{
			for (int j = 0; j < n; j++)
			{
				for (int k = 0; k < n; k++)
				{
					c.a[i][j] += (a[i][k] * b.a[k][j]) % mod;
					c.a[i][j] %= mod;
				}
			}
		}
		return c;
	}
};

Matrix fastm(Matrix aa, ll nn)
{
	Matrix res;
	/*	for (int i = 0; i < 2 * n; i++)
		{
			for (int j = 0; j < 2 * n; j++)
			{
				printf("%d ", aa.a[i][j]);
			}
			puts("");
		}*/
	for (int i = 0; i < n; i++)
	{
		for (int j = 0; j < n; j++)
			res.a[i][j] = 0;
	}
	for (int i = 0; i < n; i++)
		res.a[i][i] = 1;
	while (nn)
	{
		if (nn & 1)
		{
			res = res * aa;
		}
		nn >>= 1;
		aa = aa * aa;
	}
	return res;
}
int main(void) {
	Matrix A;
	A.a[0][0] = 3;
	A.a[0][1] = 1;
	A.a[1][0] = 2;
	A.a[1][1] = 0;
	Matrix B;
	B.a[0][0] = 1;
	B.a[0][1] = 0;
	B.a[1][0] = 0;
	B.a[1][1] = 0;
	//long long nn = 10001;
	//long long m = (B * fastm(A, nn - 1)).a[0][0];
	//long long ans = m;
	//ax[0] = A;
	//printf("                                         ans:%lld\n", ans);
	//for (int i = 0; i < 1000000; i++) {
	//	nn = nn ^ (m*m);
	//	Matrix gg = B * fastm(A, nn - 1);
	//	printf("%lld********\n", gg.a[0][0]);
	//	m = gg.a[0][0];
	//	ans ^= m;
	//	printf("%d                                         ans:%lld\n",i, ans);
	//	bn[i] = ans;
	//	if (bn[i] == bn[i - 2]) break;
	//}
	long long q, N;
	scanf("%lld%lld", &q, &N);
	if (N == 0) {
		printf("0\n");
		return 0;
	}
	if (N == 1) {
		if (q == 1) printf("1\n");
		else printf("0\n");
		return 0;
	}
	long long cnt = (B * fastm(A, N - 1)).a[0][0];
	long long anns = cnt;
	Matrix uu;
	//printf("%d %lld\n", 1, anns);
	for (int i = 1; i <= q - 1; i++) {
		N = N ^ (cnt*cnt);
		uu = B * fastm(A, N - 1);
		cnt = uu.a[0][0];
		anns ^= cnt;
		bn[i] = anns;
		if (i >= 3 && bn[i] == bn[i - 2]) {
			if ((q - 1 - i) % 2 == 0) {
				printf("%lld\n", bn[i]);
			}
			else {
				printf("%lld\n", bn[i - 1]);
			}
			return 0;
		}
		//printf("%d %lld\n",i+1, anns);
	}
	printf("%lld\n", anns);
}